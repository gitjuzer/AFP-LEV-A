package com.example.renyh.ex_mc;

import android.content.Intent;
import android.graphics.Color;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

public class ex_MC_check extends AppCompatActivity {
    private Button btn1;
    private Button btn2;
    private Button btn3;
    private Button btn4;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ex__mc_check);


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

        btn1.setText(valasz1);
        btn2.setText(valasz2);
        btn3.setText(valasz3);
        btn4.setText(valasz4);
        tvkerdes.setText(kerdes);
        tvtantargy.setText(tantargy);
        tvfeladat.setText(feladatszam);
        //itt kapja meg a program, hogy melyik gomb lett megnyomva.
        Intent intent=getIntent();
        String megnyomva = intent.getStringExtra("melyikgomb");
        btn1=findViewById(R.id.btn1_valasz);
        btn2=findViewById(R.id.btn2_valasz);
        btn3=findViewById(R.id.btn3_valasz);
        btn4=findViewById(R.id.btn4_valasz);

        switch(megnyomva)
        {
            case "btn1":
                btn1.setBackgroundColor(Color.RED);
                break;
            case "btn2":
                btn2.setBackgroundColor(Color.RED);
                break;
            case "btn3":
                btn3.setBackgroundColor(Color.RED);
                break;
            case "btn4":
                btn4.setBackgroundColor(Color.RED);
                break;
        }

        //itt kapja meg a program, hogy melyik a helyes válasz
        Boolean valaszgomb1=true;
        Boolean valaszgomb2=false;
        Boolean valaszgomb3=false;
        Boolean valaszgomb4=false;

        if(valaszgomb1==true)
        {
            btn1.setBackgroundColor(Color.GREEN);
        }
        if(valaszgomb2==true)
        {
            btn2.setBackgroundColor(Color.GREEN);
        }
        if(valaszgomb3==true)
        {
            btn3.setBackgroundColor(Color.GREEN);
        }
        if(valaszgomb4==true)
        {
            btn4.setBackgroundColor(Color.GREEN);
        }
    }
}
