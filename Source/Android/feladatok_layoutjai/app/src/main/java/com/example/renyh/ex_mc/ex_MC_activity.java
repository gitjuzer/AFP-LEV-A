package com.example.renyh.ex_mc;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.method.ScrollingMovementMethod;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.VolleyError;
import com.android.volley.Response;
import com.android.volley.Request;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;
import org.json.JSONException;

public class ex_MC_activity extends AppCompatActivity {
    private Button btn1;
    private Button btn2;
    private Button btn3;
    private Button btn4;
    private Button button;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ex__mc_activity);

        String kerdes ="A DB-ből jön a kérdés ide";
        String valasz1="1. java válasz";
        String valasz2="2. java válasz";
        String valasz3="3. java válasz";
        String valasz4="4. java válasz";
        String tantargy="[java] tantárgy";
        String feladatszam="5. java feladat";

        TextView tvkerdes = findViewById(R.id.tv_kerdes);
        TextView tvtantargy = findViewById(R.id.tv_tantargy);
        TextView tvfeladat = findViewById(R.id.tv_feladatszam);
        btn1=findViewById(R.id.btn1_valasz);
        btn2=findViewById(R.id.btn2_valasz);
        btn3=findViewById(R.id.btn3_valasz);
        btn4=findViewById(R.id.btn4_valasz);
        button=findViewById(R.id.button);

        btn1.setText(valasz1);
        btn2.setText(valasz2);
        btn3.setText(valasz3);
        btn4.setText(valasz4);
        tvkerdes.setText(kerdes);
        tvtantargy.setText(tantargy);
        tvfeladat.setText(feladatszam);

        btn1.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_MC_activity.this, ex_MC_check.class);
                UJ_ACTIVITY.putExtra("melyikgomb", "btn1");
                startActivity(UJ_ACTIVITY);
            }
        });
        btn2.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_MC_activity.this, ex_MC_check.class);
                UJ_ACTIVITY.putExtra("melyikgomb", "btn2");
                startActivity(UJ_ACTIVITY);
            }
        });

        btn3.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_MC_activity.this, ex_MC_check.class);
                UJ_ACTIVITY.putExtra("melyikgomb", "btn3");
                startActivity(UJ_ACTIVITY);
            }
        });

        btn4.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_MC_activity.this, ex_MC_check.class);
                UJ_ACTIVITY.putExtra("melyikgomb", "btn4");
                startActivity(UJ_ACTIVITY);
            }
        });

        button.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_MC_activity.this, ex_dilemma_activity.class);
                startActivity(UJ_ACTIVITY);
            }
        });

    }
}
