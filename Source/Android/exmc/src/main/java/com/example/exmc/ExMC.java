package com.example.exmc;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

public class ExMC extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ex_mc);

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
        Button btn1=findViewById(R.id.btn1_valasz);
        Button btn2=findViewById(R.id.btn2_valasz);
        Button btn3=findViewById(R.id.btn3_valasz);
        Button btn4=findViewById(R.id.btn4_valasz);


        btn1.setText(valasz1);
        btn2.setText(valasz2);
        btn3.setText(valasz3);
        btn4.setText(valasz4);
        tvkerdes.setText(kerdes);
        tvtantargy.setText(tantargy);
        tvfeladat.setText(feladatszam);



    }

}
