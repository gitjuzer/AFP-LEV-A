package com.main.project.projectx;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
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
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;


public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    ImageButton Matek_Button;
    ImageButton Irodalom_Button;
    ImageButton Nyelvtan_Button;
    ImageButton Fizika_Button;
    ImageButton Tori_Button;
    ImageButton Info_Button;
    ImageButton Kemia_Button;
    ImageButton Biologia_Button;
    ImageButton Rajz_Button;
    Context context;
    int duration;
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
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });
         Matek_Button = (ImageButton) findViewById(R.id.btn_matek);
         Irodalom_Button = (ImageButton) findViewById(R.id.btn_irodalom);;
         Nyelvtan_Button = (ImageButton) findViewById(R.id.btn_nyelvtan);;
         Fizika_Button = (ImageButton) findViewById(R.id.btn_fizika);;
         Tori_Button = (ImageButton) findViewById(R.id.btn_tori);;
         Info_Button = (ImageButton) findViewById(R.id.btn_informatika);;
         Kemia_Button = (ImageButton) findViewById(R.id.btn_kemia);;
         Biologia_Button = (ImageButton) findViewById(R.id.btn_biologia);;
         Rajz_Button = (ImageButton) findViewById(R.id.btn_rajz);
         context = getApplicationContext();
         duration = Toast.LENGTH_SHORT;
         Matek_Button.setOnClickListener(new View.OnClickListener(){
             @Override
             public  void onClick(View view){
                 Toast.makeText(context, "Matek gomb megnyomva", duration).show();
             }
         });
        Irodalom_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Irodalom gomb megnyomva", duration).show();
            }
        });
        Nyelvtan_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Nyelvtan gomb megnyomva", duration).show();
            }
        });
        Fizika_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Fizika gomb megnyomva", duration).show();
            }
        });
        Tori_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Tori gomb megnyomva", duration).show();
            }
        });
        Info_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Info gomb megnyomva", duration).show();
            }
        });
        Kemia_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Kemia gomb megnyomva", duration).show();
            }
        });
        Biologia_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Biologia gomb megnyomva", duration).show();
            }
        });
        Rajz_Button.setOnClickListener(new View.OnClickListener(){
            @Override
            public  void onClick(View view){
                Toast.makeText(context, "Rajz gomb megnyomva", duration).show();
            }
        });

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
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
            Toast.makeText(context, "Kijelentkezés", duration).show();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
