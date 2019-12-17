package com.main.project.projectx;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Color;
import android.os.Bundle;
import android.support.constraint.ConstraintLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.FrameLayout;
import android.widget.ImageButton;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.flexbox.FlexboxLayout;
import com.google.gson.Gson;
import com.mikhaellopez.circularimageview.CircularImageView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.InputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import javax.net.ssl.HttpsURLConnection;


public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    int duration;
    public static List<Topic> TopicList;
    Context context;
    FlexboxLayout topics;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Hiba küldése ", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
        topics = (FlexboxLayout)findViewById(R.id.topic_flexbox);
        context = getApplicationContext();
        Runnable r = new Runnable() {
            @Override
            public void run() {
                feltoltTopics();
            }
        };
        Thread t = new Thread(r);

        t.start();
        try{
            t.join();
        }catch (Exception e){

        }
        final float scale = getResources().getDisplayMetrics().density;
        int pixels =  (int) (95 * scale +0.5f);
        int pixelsmargin = (int) (10 * scale + 0.5f);
        for (Topic item:TopicList) {
            LinearLayout linearLayout = new LinearLayout(this);
            linearLayout.setOrientation(LinearLayout.VERTICAL);
            ConstraintLayout.LayoutParams lparams = new ConstraintLayout.LayoutParams(ConstraintLayout.LayoutParams.WRAP_CONTENT, ConstraintLayout.LayoutParams.WRAP_CONTENT);
            lparams.setMargins(pixelsmargin, pixelsmargin, pixelsmargin, pixelsmargin);

            linearLayout.setLayoutParams(lparams);
            linearLayout.setVisibility(View.VISIBLE);
            FrameLayout frame = new FrameLayout(this);
            LinearLayout.LayoutParams lparams2 = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.WRAP_CONTENT, LinearLayout.LayoutParams.WRAP_CONTENT);
            frame.setLayoutParams(lparams2);
            ImageButton button = new ImageButton(this);
            if(item.name == null){
                item.name = "nem null";
            }


               button.setTag(item.id);


            button.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    Intent intent = new Intent(MainActivity.this,tananyagok.class);
                    if(v.getTag() != null) {

                        intent.putExtra("topicid", v.getTag().toString());
                        intent.putExtra("topicname", GetTopicNameById(Integer.parseInt(v.getTag().toString())));
                    }

                    startActivity(intent);

                    GombReakcio(v.getTag().toString());
                }
            });
            button.setBackgroundColor(Color.TRANSPARENT);
            button.setVisibility(View.VISIBLE);
            button.setLayoutParams(new FrameLayout.LayoutParams(pixels,pixels));
            CircularImageView kep = new CircularImageView(this);

            kep.setImageResource(R.drawable.matek);
            kep.setBorderColor(getResources().getColor(R.color.fooldal_button_border_color));
            kep.setBorderWidth((int) (4 * scale + 0.5f));

            kep.addShadow();

            kep.setShadowRadius(15);
            kep.setShadowColor(0xaa000000);

            kep.setShadowGravity(CircularImageView.ShadowGravity.CENTER);
            kep.setLayoutParams(new FrameLayout.LayoutParams(pixels,pixels));
            TextView titleView = new TextView(this);
            titleView.setText(item.name);
            titleView.setTextSize(20);
            titleView.setTextColor(getResources().getColor(R.color.fooldal_button_border_color));
            titleView.setGravity(Gravity.CENTER);
            frame.addView(kep,0);
            frame.addView(button,1);
            linearLayout.addView(frame);
            linearLayout.addView(titleView);
            topics.addView(linearLayout);
        }

    }
    private String GetTopicNameById(int id){
        for(Topic item:TopicList){
            if(item.id == id) return item.name;

        }
        return "";
    }
    private  void feltoltTopics(){
        Gson gson= new Gson();
        try {

            URL url = new URL("https://nyusz.eu/afpleva/public/sapi/topics");
            HttpsURLConnection test = (HttpsURLConnection) url.openConnection();
            test.setRequestMethod("GET");
            test.setRequestProperty("Content-Type", "application/json; charset=utf-8");
            test.setRequestProperty("Authorization","Bearer "+getToken().replace('"',' '));

            Log.w("RequestProps: ",test.getRequestProperties().toString());
            test.setDoInput(true);
            InputStream in;
            test.connect();
            if (test.getResponseCode() != 200) {

                in = new BufferedInputStream(test.getErrorStream());

            }
            else{
                in = new BufferedInputStream(test.getInputStream());
            }
            if (test.getResponseCode() != 200) {

                Log.w("Failed ",test.getResponseMessage());

            }
            String downloadedjsonstring =  LoginActivity.readStream(in);
            Log.w("Api answer: ",downloadedjsonstring);
            test.disconnect();

            if(downloadedjsonstring != null){
                JSONObject json = new JSONObject(downloadedjsonstring);
                JSONArray array = json.getJSONArray("payload");
                TopicList = new ArrayList<Topic>();
                for (int i = 0; i < array.length();i++ ){
                    Log.w("JsonArray item"+i,array.getJSONObject(i).toString());
                    TopicList.add(gson.fromJson(array.getJSONObject(i).toString(),Topic.class));
                }
            }


        }catch (Exception e){
            Log.w("Api error: ",e);
        }
    }
    void GombReakcio(String nev){
        Toast.makeText(context, nev, duration).show();
    }

    private String getToken() {
        SharedPreferences prefs = getSharedPreferences("Adatok",Context.MODE_PRIVATE);
        return prefs.getString("token","");
    }
    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_settings) {
            Toast.makeText(context, "Beállítások", duration).show();
        } else if (id == R.id.nav_feladatok) {
            Toast.makeText(context, "Feladatok", duration).show();
        } else if (id == R.id.nav_tananyagok) {
            Toast.makeText(context, "Tananyagok", duration).show();
        } else if (id == R.id.nav_tesztjeim) {
            Toast.makeText(context, "Tesztjeim", duration).show();
        } else if (id == R.id.nav_share) {
            Toast.makeText(context, "Megosztás", duration).show();
        } else if (id == R.id.nav_logout) {

            context.getSharedPreferences("Adatok", 0).edit().clear().commit();
            Intent intent_name = new Intent();
            intent_name.setClass(getApplicationContext(),LoginActivity.class);
            startActivity(intent_name);
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
