package com.eke.projectx.projectx;

import android.animation.Animator;
import android.animation.AnimatorListenerAdapter;
import android.annotation.TargetApi;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Region;
import android.os.StrictMode;
import androidx.annotation.NonNull;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import android.app.LoaderManager.LoaderCallbacks;

import android.content.CursorLoader;
import android.content.Loader;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;

import android.os.Build;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.text.TextUtils;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.inputmethod.EditorInfo;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.google.gson.Gson;

import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import javax.net.ssl.HttpsURLConnection;

import static android.Manifest.permission.READ_CONTACTS;

/**
 * A login screen that offers login via email/password.
 */
public class Login extends AppCompatActivity implements LoaderCallbacks<Cursor> {
    //TODO:Utána járni a Nagy Tibor által ajánlot JWT-nek
    //egyszer ebbe fogjuk lekérdezni a felhasználók adatát
    public static User user = null;
    //ebbe töljük a api által küldött válaszokat
    String downloadedjsonstring;
    //Egyenlőre ebbe tesszük a tokent
    public static TokenHelper token = null;
    /**
     * Id to identity READ_CONTACTS permission request.
     */
    private static final int REQUEST_READ_CONTACTS = 0;


    /**
     * Keep track of the login task to ensure we can cancel it if requested.
     */
    private UserLoginTask mAuthTask = null;
    private UserRegTask mRegTask = null;

    // UI references.
    private AutoCompleteTextView mEmailView;
    private EditText mPasswordView;
    private View mProgressView;
    private View mLoginFormView;
    private HttpsURLConnection conn = null;
    //Ezzel alakitjuk át a letöltött információt binárisból string
    private String readStream(InputStream is) {
        try {
            ByteArrayOutputStream bo = new ByteArrayOutputStream();
            int i = is.read();
            while(i != -1) {
                bo.write(i);
                i = is.read();
            }
            return bo.toString();
        } catch (IOException e) {
            return "";
        }
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        // Set up the login form.
        mEmailView = (AutoCompleteTextView) findViewById(R.id.email);
        populateAutoComplete();
        mPasswordView = (EditText) findViewById(R.id.password);
        mPasswordView.setOnEditorActionListener(new TextView.OnEditorActionListener() {
            @Override
            public boolean onEditorAction(TextView textView, int id, KeyEvent keyEvent) {
                if (id == EditorInfo.IME_ACTION_DONE || id == EditorInfo.IME_NULL) {
                    attemptLogin();
                    return true;
                }
                return false;
            }
        });

        Button mEmailSignInButton = (Button) findViewById(R.id.email_sign_in_button);
        mEmailSignInButton.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
                attemptLogin();
            }
        });
        Button mEmailRegInButton = (Button) findViewById(R.id.email_reg_button);
        mEmailRegInButton.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
                activateReg();
            }
        });
        Button ExitButton = (Button)findViewById(R.id.exit_button);
        ExitButton.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
                System.exit(0);
            }
        });


        mProgressView = findViewById(R.id.login_progress);
    }
//Ha rákattint a regisztrációra ez behozza a többi gombot
    private void activateReg() {
        Button button = (Button) findViewById(R.id.email_sign_in_button);
        Button button2 = (Button) findViewById(R.id.email_reg_button);
        Button reg = (Button) findViewById(R.id.email_real_reg_button);
        EditText real = (EditText)findViewById(R.id.realName);
        EditText login = (EditText) findViewById(R.id.loginName);
        reg.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
                attemptReg();
            }
        });
        button.setVisibility(View.GONE);
        button2.setVisibility(View.GONE);
        real.setVisibility(View.VISIBLE);
        login.setVisibility(View.VISIBLE);
        reg.setVisibility(View.VISIBLE);
    }
//Másodjára ha rákattint a regisztrációra akkor végzi a muveletet
    private void attemptReg() {

        EditText real = (EditText)findViewById(R.id.realName);
        EditText login = (EditText) findViewById(R.id.loginName);

        if (mRegTask != null) {
            return;
        }

        // Reset errors.
        mEmailView.setError(null);
        mPasswordView.setError(null);

        // Store values at the time of the login attempt.
        String email = mEmailView.getText().toString();
        String password = mPasswordView.getText().toString();

        boolean cancel = false;
        View focusView = null;

        // Check for a valid password, if the user entered one.
        if (!TextUtils.isEmpty(password) && !isPasswordValid(password)) {
            mPasswordView.setError(getString(R.string.error_invalid_password));
            focusView = mPasswordView;
            cancel = true;
        }
        if (TextUtils.isEmpty(real.getText().toString())) {
            real.setError(getString(R.string.error_field_required));
            focusView = real;
            cancel = true;
        } else if (!ValidRealName(real.getText().toString())) {
            real.setError(getString(R.string.error_invalid_RealName));
            focusView = real;
            cancel = true;
        }
        if (TextUtils.isEmpty(login.getText().toString())) {
            login.setError(getString(R.string.error_field_required));
            focusView = login;
            cancel = true;
        } else if (!ValidLogin(login.getText().toString())) {
            real.setError(getString(R.string.error_incorrect_username));
            focusView = login;
            cancel = true;
        }
        // Check for a valid email address.
        if (TextUtils.isEmpty(email)) {
            mEmailView.setError(getString(R.string.error_field_required));
            focusView = mEmailView;
            cancel = true;
        } else if (!isEmailValid(email)) {
            mEmailView.setError(getString(R.string.error_invalid_email));
            focusView = mEmailView;
            cancel = true;
        }

        if (cancel) {
            // There was an error; don't attempt login and focus the first
            // form field with an error.
            focusView.requestFocus();
        } else {
            // Show a progress spinner, and kick off a background task to
            // perform the user login attempt.
            showProgress(true);
            mRegTask = new UserRegTask(email, password, real.getText().toString(),login.getText().toString());
            mRegTask.execute((Void) null);

        }

    }

    private boolean ValidLogin(String s) {
        if(s.length() > 4) return true;
        else return false;
    }

    private boolean ValidRealName(String editText) {
        if (editText.length() > 5) return true;
        else return false;
    }

    private void populateAutoComplete() {
        if (!mayRequestContacts()) {
            return;
        }

        getLoaderManager().initLoader(0, null, this);
    }

    private boolean mayRequestContacts() {
        if (Build.VERSION.SDK_INT < Build.VERSION_CODES.M) {
            return true;
        }
        if (checkSelfPermission(READ_CONTACTS) == PackageManager.PERMISSION_GRANTED) {
            return true;
        }
        if (shouldShowRequestPermissionRationale(READ_CONTACTS)) {
            Snackbar.make(mEmailView, R.string.permission_rationale, Snackbar.LENGTH_INDEFINITE)
                    .setAction(android.R.string.ok, new View.OnClickListener() {
                        @Override
                        @TargetApi(Build.VERSION_CODES.M)
                        public void onClick(View v) {
                            requestPermissions(new String[]{READ_CONTACTS}, REQUEST_READ_CONTACTS);
                        }
                    });
        } else {
            requestPermissions(new String[]{READ_CONTACTS}, REQUEST_READ_CONTACTS);
        }
        return false;
    }

    /**
     * Callback received when a permissions request has been completed.
     */
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions,
                                           @NonNull int[] grantResults) {
        if (requestCode == REQUEST_READ_CONTACTS) {
            if (grantResults.length == 1 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                populateAutoComplete();
            }
        }
    }


    /**
     * Attempts to sign in or register the account specified by the login form.
     * If there are form errors (invalid email, missing fields, etc.), the
     * errors are presented and no actual login attempt is made.
     */
    private void attemptLogin() {
        if (mAuthTask != null) {
            return;
        }

        // Reset errors.
        mEmailView.setError(null);
        mPasswordView.setError(null);

        // Store values at the time of the login attempt.
        String email = mEmailView.getText().toString();
        String password = mPasswordView.getText().toString();

        boolean cancel = false;
        View focusView = null;

        // Check for a valid password, if the user entered one.
        if (!TextUtils.isEmpty(password) && !isPasswordValid(password)) {
            mPasswordView.setError(getString(R.string.error_invalid_password));
            focusView = mPasswordView;
            cancel = true;
        }

        // Check for a valid email address.
        if (TextUtils.isEmpty(email)) {
            mEmailView.setError(getString(R.string.error_field_required));
            focusView = mEmailView;
            cancel = true;
        } else if (!isEmailValid(email)) {
            mEmailView.setError(getString(R.string.error_invalid_email));
            focusView = mEmailView;
            cancel = true;
        }

        if (cancel) {
            // There was an error; don't attempt login and focus the first
            // form field with an error.
            focusView.requestFocus();
        } else {
            // Show a progress spinner, and kick off a background task to
            // perform the user login attempt.
            showProgress(true);
            mAuthTask = new UserLoginTask(email, password);
            mAuthTask.execute((Void) null);

        }
    }

    private boolean isEmailValid(String email) {
        //TODO: Replace this with your own logic
        return email.contains("@");
    }

    private boolean isPasswordValid(String password) {
        //TODO: Replace this with your own logic
        return password.length() > 4;
    }

    /**
     * Shows the progress UI and hides the login form.
     */
    @TargetApi(Build.VERSION_CODES.HONEYCOMB_MR2)
    private void showProgress(final boolean show) {
        // On Honeycomb MR2 we have the ViewPropertyAnimator APIs, which allow
        // for very easy animations. If available, use these APIs to fade-in
        // the progress spinner.
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.HONEYCOMB_MR2) {
            int shortAnimTime = getResources().getInteger(android.R.integer.config_shortAnimTime);

            mLoginFormView.setVisibility(show ? View.GONE : View.VISIBLE);
            mLoginFormView.animate().setDuration(shortAnimTime).alpha(
                    show ? 0 : 1).setListener(new AnimatorListenerAdapter() {
                @Override
                public void onAnimationEnd(Animator animation) {
                    mLoginFormView.setVisibility(show ? View.GONE : View.VISIBLE);
                }
            });

            mProgressView.setVisibility(show ? View.VISIBLE : View.GONE);
            mProgressView.animate().setDuration(shortAnimTime).alpha(
                    show ? 1 : 0).setListener(new AnimatorListenerAdapter() {
                @Override
                public void onAnimationEnd(Animator animation) {
                    mProgressView.setVisibility(show ? View.VISIBLE : View.GONE);
                }
            });
        } else {
            // The ViewPropertyAnimator APIs are not available, so simply show
            // and hide the relevant UI components.
            mProgressView.setVisibility(show ? View.VISIBLE : View.GONE);
            mLoginFormView.setVisibility(show ? View.GONE : View.VISIBLE);
        }
    }

    @Override
    public Loader<Cursor> onCreateLoader(int i, Bundle bundle) {
        return new CursorLoader(this,
                // Retrieve data rows for the device user's 'profile' contact.
                Uri.withAppendedPath(ContactsContract.Profile.CONTENT_URI,
                        ContactsContract.Contacts.Data.CONTENT_DIRECTORY), ProfileQuery.PROJECTION,

                // Select only email addresses.
                ContactsContract.Contacts.Data.MIMETYPE +
                        " = ?", new String[]{ContactsContract.CommonDataKinds.Email
                .CONTENT_ITEM_TYPE},

                // Show primary email addresses first. Note that there won't be
                // a primary email address if the user hasn't specified one.
                ContactsContract.Contacts.Data.IS_PRIMARY + " DESC");
    }

    @Override
    public void onLoadFinished(Loader<Cursor> cursorLoader, Cursor cursor) {
        List<String> emails = new ArrayList<>();
        cursor.moveToFirst();
        while (!cursor.isAfterLast()) {
            emails.add(cursor.getString(ProfileQuery.ADDRESS));
            cursor.moveToNext();
        }

        addEmailsToAutoComplete(emails);
    }

    @Override
    public void onLoaderReset(Loader<Cursor> cursorLoader) {

    }

    private void addEmailsToAutoComplete(List<String> emailAddressCollection) {
        //Create adapter to tell the AutoCompleteTextView what to show in its dropdown list.
        ArrayAdapter<String> adapter =
                new ArrayAdapter<>(Login.this,
                        android.R.layout.simple_dropdown_item_1line, emailAddressCollection);

        mEmailView.setAdapter(adapter);
    }


    private interface ProfileQuery {
        String[] PROJECTION = {
                ContactsContract.CommonDataKinds.Email.ADDRESS,
                ContactsContract.CommonDataKinds.Email.IS_PRIMARY,
        };

        int ADDRESS = 0;
        int IS_PRIMARY = 1;
    }
    /**
     * Represents an asynchronous login/registration task used to authenticate
     * the user.
     */
    public class UserLoginTask extends AsyncTask<Void, Void, Boolean> {

        private final String mEmail;
        private final String mPassword;


        UserLoginTask(String email, String password) {
            mEmail = email;
            mPassword = password;

        }

        @Override
        //Bejelentkezés
        protected Boolean doInBackground(Void... params) {
            try {
                //Ugyan az nagyjából mint a regisztráció csak máshogy paraméterezzuk a JSON objectet
                URL url = new URL(TokenHelper.LoginApiUrl);
                JSONObject felh = new JSONObject();
                felh.put("email",mEmail);
                felh.put("password",mPassword);

                conn = (HttpsURLConnection) url.openConnection();
                conn.setDoOutput( true );
                conn.setInstanceFollowRedirects( false );

                conn.setRequestMethod("POST");
                conn.setRequestProperty("Content-Type","application/json");
                conn.setRequestProperty( "charset", "utf-8");
                OutputStream os = conn.getOutputStream();
                os.write(felh.toString().getBytes("UTF-8"));
                os.close();
                conn.connect();
                InputStream in = new BufferedInputStream(conn.getInputStream());
                downloadedjsonstring = readStream(in);


            }catch (Exception e){

                e.printStackTrace();
            }
            finally {
                conn.disconnect();
            }

            if(downloadedjsonstring != null){
                Gson gson = new Gson();

                try{
                     token = gson.fromJson(downloadedjsonstring,TokenHelper.class);
                }catch(Exception e){
                    return false;
                }


                 if(token.payload != null)return true;
            }
            return false;

        }

        @Override
        protected void onPostExecute(final Boolean success) {
            mAuthTask = null;
            showProgress(false);

            if (success) {
                finish();
                Intent intent_name = new Intent();
                intent_name.setClass(getApplicationContext(),Main.class);
                startActivity(intent_name);
            } else {
                mPasswordView.setError(getString(R.string.error_incorrect_password));
                mPasswordView.requestFocus();
            }
        }

        @Override
        protected void onCancelled() {
            mAuthTask = null;
            showProgress(false);
        }
    }
    // Ezzel a classal regisztráljuk az uj felhasználókat
    public class UserRegTask extends AsyncTask<Void, Void, Boolean> {

        private final String mEmail;
        private final String mPassword;
        private final String realname;
        private final String loginname;

        UserRegTask(String email, String password, String realname, String loginname) {
            mEmail = email;
            mPassword = password;
            this.realname = realname;
            this.loginname = loginname;

        }
//A háttérben elküldön egy POST method-os kérést a tartalma egy JSON a backend által irt doksi alapján
        @Override
        protected Boolean doInBackground(Void... params) {
            try {

                URL url = new URL(TokenHelper.RegApiUrl);
                //itthozzuk létre és pakolásszuk a JSON-be az infókat
                JSONObject felh = new JSONObject();
                felh.put("loginName",loginname);
                felh.put("realName",realname);
                felh.put("email",mEmail);
                felh.put("password",mPassword);
                //itt állítjuk be a csatlakozást
                conn = (HttpsURLConnection) url.openConnection();
                conn.setDoOutput( true );
                conn.setInstanceFollowRedirects( false );

                conn.setRequestMethod("POST");
                conn.setRequestProperty("Content-Type","application/json");
                conn.setRequestProperty( "charset", "utf-8");
                //Itt irjuk a JSON objectet a kérésbe.
                OutputStream os = conn.getOutputStream();
                os.write(felh.toString().getBytes("UTF-8"));
                os.close();
                //itt küldjük el a kérést
                conn.connect();
                //itt kapunk választ
                InputStream in = new BufferedInputStream(conn.getInputStream());
                downloadedjsonstring = readStream(in);


            }catch (Exception e){

                e.printStackTrace();
            }
            finally {
                conn.disconnect();
            }

            if(downloadedjsonstring != null){
                Gson gson = new Gson();

                try{
                    //egyenlőre egy static változóba tesszük bele a tokent
                    token = gson.fromJson(downloadedjsonstring,TokenHelper.class);
                }catch(Exception e){
                    return false;
                }


                if(token.payload != null)return true;
            }
            return false;



        }

        @Override
        //Ha sikeres volt a regisztráció folyamat
        protected void onPostExecute(final Boolean success) {
            mRegTask = null;
            showProgress(false);

            if (success) {
                finish();
                Intent intent_name = new Intent();
                intent_name.setClass(getApplicationContext(),Main.class);
                startActivity(intent_name);
            } else {
                mPasswordView.setError(getString(R.string.error_incorrect_password));
                mPasswordView.requestFocus();
            }
        }

        @Override
        protected void onCancelled() {
            mRegTask = null;
            showProgress(false);
        }
    }
}

