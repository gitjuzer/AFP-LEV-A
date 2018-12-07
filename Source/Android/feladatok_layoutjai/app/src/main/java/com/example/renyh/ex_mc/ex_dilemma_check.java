package com.example.renyh.ex_mc;

import android.content.Intent;
import android.graphics.Color;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

public class ex_dilemma_check extends AppCompatActivity {


    private Button btn_igen;
    private Button btn_nem;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ex_dilemma_check);
        TextView tv_kerdes = findViewById(R.id.tv_kerdes);

        btn_igen=findViewById(R.id.btn_igen);
        btn_nem=findViewById(R.id.btn_nem);
        btn_igen.setText("Igaz");
        btn_nem.setText("Hamis");
        tv_kerdes.setText("Ez egy eldöntendő kérdés?");
        Intent intent=getIntent();
        String megnyomva = intent.getStringExtra("melyikgomb");
        btn_igen=findViewById(R.id.btn_igen);
        btn_nem=findViewById(R.id.btn_nem);

        switch(megnyomva)
        {
            case "btnigen":
                btn_igen.setBackgroundColor(Color.RED);
                break;
            case "btnnem":
                btn_nem.setBackgroundColor(Color.RED);
                break;
        }

        //itt kapja meg a program, hogy melyik a helyes válasz
        Boolean valaszgomb1=true;
        Boolean valaszgomb2=false;

        if(valaszgomb1==true)
        {
            btn_igen.setBackgroundColor(Color.GREEN);
        }
        if(valaszgomb2==true)
        {
            btn_nem.setBackgroundColor(Color.GREEN);
        }

    }
}
