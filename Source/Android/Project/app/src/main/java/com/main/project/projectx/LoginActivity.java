package com.main.project.projectx;

import android.animation.Animator;
import android.animation.AnimatorListenerAdapter;
import android.annotation.TargetApi;
import android.app.LoaderManager.LoaderCallbacks;
import android.content.Context;
import android.content.CursorLoader;
import android.content.Intent;
import android.content.Loader;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.provider.ContactsContract;
import android.support.annotation.NonNull;
import android.support.design.widget.Snackbar;
import android.support.design.widget.TextInputLayout;
import android.support.v7.app.AppCompatActivity;
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
import com.google.gson.JsonObject;

import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import javax.net.ssl.HttpsURLConnection;

import static android.Manifest.permission.READ_CONTACTS;

/**
 * A login screen that offers login via email/password.
 */
public class LoginActivity extends AppCompatActivity implements LoaderCallbacks<Cursor> {

    /**
     * Id to identity READ_CONTACTS permission request.
     */
    private static final int REQUEST_READ_CONTACTS = 0;

    /**
     * A dummy authentication store containing known user names and passwords.
     * TODO: remove after connecting to a real authentication system.
     */
    private static final String[] DUMMY_CREDENTIALS = new String[]{
            "foo@example.com:hello", "bar@example.com:world"
    };
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
    private  TextView mUserNameView;
    private TextView mRealNameView;
    private TextInputLayout mUserInputLayout;
    private TextInputLayout mRealInputLayout;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        // Set up the login form.
        mEmailView = (AutoCompleteTextView) findViewById(R.id.email);
        populateAutoComplete();
        mPasswordView = (EditText) findViewById(R.id.password);
        mUserNameView = (TextView)findViewById(R.id.username);
        mRealNameView = (TextView) findViewById(R.id.realname);
        mUserInputLayout = (TextInputLayout) findViewById(R.id.userILay);
        mRealInputLayout = (TextInputLayout) findViewById(R.id.RealILay);

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

        final Button mEmailSignInButton = (Button) findViewById(R.id.email_sign_in_button);
        mEmailSignInButton.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View view) {
               if(mEmailSignInButton.getText().toString() == "Bejelentkezés") attemptLogin();
               else{
                   mUserInputLayout.setVisibility(View.GONE);
                   mRealInputLayout.setVisibility(View.GONE);
                   mEmailSignInButton.setText("Bejelentkezés");
               }
            }
        });
        Button kilep = (Button)findViewById(R.id.exitbutton);

        kilep.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
                System.exit(0);
            }
        });
        Button reg = (Button)findViewById(R.id.regbutton);

        reg.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                if(mUserInputLayout.getVisibility() == View.GONE){
                    mUserInputLayout.setVisibility(View.VISIBLE);
                    mRealInputLayout.setVisibility(View.VISIBLE);
                    mEmailSignInButton.setText("Vissza");
                }else{
                    Attemptreg();
                }
            }
        });

        mLoginFormView = findViewById(R.id.login_form);
        mProgressView = findViewById(R.id.login_progress);
    }

    private void Attemptreg() {
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
            mRegTask = new UserRegTask(mEmailView.getText().toString(), mPasswordView.getText().toString(),mRealNameView.getText().toString(),mUserNameView.getText().toString());
            mRegTask.execute((Void) null);
        }
    }

    public static String readStream(InputStream is) {
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
            mAuthTask = new UserLoginTask(mEmailView.getText().toString(), mPasswordView.getText().toString());
            mAuthTask.execute((Void) null);
        }
    }
    private void ChangeView(){

    }

    protected static final Pattern VALID_EMAIL_ADDRESS_REGEX =
            Pattern.compile("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,6}$", Pattern.CASE_INSENSITIVE);

    protected static boolean isEmailValid(String email) {
        Matcher matcher = VALID_EMAIL_ADDRESS_REGEX.matcher(email);
        return matcher.find();
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
                new ArrayAdapter<>(LoginActivity.this,
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
        protected Boolean doInBackground(Void... params) {
            Gson gson = new Gson();
            try {

                JSONObject felh = new JSONObject();
                felh.put("email",mEmail);
                felh.put("password",mPassword);
                URL url = new URL("https://nyusz.eu/afpleva/public/api/login");
                HttpsURLConnection test = (HttpsURLConnection) url.openConnection();
                test.setRequestMethod("POST");
                test.setRequestProperty("Content-Type", "application/json; charset=utf-8");
                test.setDoOutput(true);
                test.setDoInput(true);
                OutputStream os = test.getOutputStream();
                os.write(felh.toString().getBytes("UTF-8"));
                os.close();
                test.connect();
                InputStream in = new BufferedInputStream(test.getInputStream());
                String downloadedjsonstring = readStream(in);
                Log.w("Api answer: ",downloadedjsonstring);
                test.disconnect();

                if(downloadedjsonstring != null){
                    JsonObject json = gson.fromJson(downloadedjsonstring,JsonObject.class);
                    if(json.get("payload").getAsJsonObject().get("token") != null){
                        SharedPreferences prefs;
                        SharedPreferences.Editor edit;
                        prefs= getSharedPreferences("Adatok",Context.MODE_PRIVATE);
                        edit=prefs.edit();
                        try {
                            String saveToken = json.get("payload").getAsJsonObject().get("token").toString();
                            edit.putString("token",saveToken);
                            Log.i("Login",saveToken);
                            edit.commit();
                        }
                        catch (Exception e)
                        {
                            e.printStackTrace();
                        }
                        return true;
                    }
                }

            }catch (Exception e){
                Log.w("Api error: ",e);
            }


            // TODO: register the new account here.
            return false;
        }

        @Override
        protected void onPostExecute(final Boolean success) {
            mAuthTask = null;
            showProgress(false);

            if (success) {
                finish();
                Intent intent_name = new Intent();
                intent_name.setClass(getApplicationContext(),MainActivity.class);
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
    public class UserRegTask extends AsyncTask<Void, Void, Boolean> {

        private final String mEmail;
        private final String mPassword;
        private final String realname;
        private final String loginname;

        UserRegTask(String email, String password,  String loginname, String realname) {
            mEmail = email;
            mPassword = password;
            this.realname = realname;
            this.loginname = loginname;

        }
        //A háttérben elküldön egy POST method-os kérést a tartalma egy JSON a backend által irt doksi alapján
        @Override
        protected Boolean doInBackground(Void... params) {
            Gson gson = new Gson();
            try {

                JSONObject felh = new JSONObject();
                felh.put("loginName",loginname );
                felh.put("realName", realname);
                felh.put("email", mEmail);
                felh.put("password", mPassword);
                Log.w("json: ",felh.toString());
                URL url = new URL("https://nyusz.eu/afpleva/public/api/register");
                HttpsURLConnection test = (HttpsURLConnection) url.openConnection();
                test.setDoInput(true);
                test.setDoOutput(true);
                test.setRequestMethod("POST");
                test.setRequestProperty("Content-Type", "application/json;");
                test.setInstanceFollowRedirects( true );
                OutputStream os = test.getOutputStream();
                os.write(felh.toString().getBytes("UTF-8"));
                os.flush();
                os.close();
                if (test.getResponseCode() != 200) {

                    Log.w("Failed ",test.getResponseMessage());

                }
                test.connect();
                InputStream in = new BufferedInputStream(test.getInputStream());
                String downloadedjsonstring = readStream(in);
                Log.w("Api answer: ",downloadedjsonstring);
                test.disconnect();

                if(downloadedjsonstring != null){
                    JsonObject json = gson.fromJson(downloadedjsonstring,JsonObject.class);
                    if(json.get("payload").getAsJsonObject().get("token") != null){
                        SharedPreferences prefs;
                        SharedPreferences.Editor edit;
                        prefs= getSharedPreferences("Adatok",Context.MODE_PRIVATE);
                        edit=prefs.edit();
                        try {
                            String saveToken = json.get("payload").getAsJsonObject().get("token").toString();
                            edit.putString("token",saveToken);
                            Log.i("Login",saveToken);
                            edit.commit();
                        }
                        catch (Exception e)
                        {
                            e.printStackTrace();
                        }
                        return true;
                    }
                }

            } catch (Exception e) {
                Log.w("Api error: ", e);
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
                intent_name.setClass(getApplicationContext(),MainActivity.class);
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

