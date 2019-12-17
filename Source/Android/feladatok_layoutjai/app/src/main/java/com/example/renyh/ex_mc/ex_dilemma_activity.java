package com.example.renyh.ex_mc;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class ex_dilemma_activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ex_dilemma_activity);

        Button btn_igen;
        Button btn_nem;

        TextView tv_kerdes = findViewById(R.id.tv_kerdes);
        String kerdes="Ez egy eldöntendő kérdés?";
        btn_igen=findViewById(R.id.btn_igen);
        btn_nem=findViewById(R.id.btn_nem);
        btn_igen.setText("Igaz");
        btn_nem.setText("Hamis");
        tv_kerdes.setText(kerdes);
       btn_igen.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_dilemma_activity.this, ex_dilemma_check.class);
                UJ_ACTIVITY.putExtra("melyikgomb", "btnigen");
                startActivity(UJ_ACTIVITY);
            }
        });
        btn_nem.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View v)
            {
                Intent UJ_ACTIVITY = new Intent(ex_dilemma_activity.this, ex_dilemma_check.class);
                UJ_ACTIVITY.putExtra("melyikgomb", "btnnem");
                startActivity(UJ_ACTIVITY);
            }
        });


    }
}
