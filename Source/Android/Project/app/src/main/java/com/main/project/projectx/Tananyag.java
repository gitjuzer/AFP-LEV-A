package com.main.project.projectx;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class Tananyag extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tananyag);
        TextView titletext = findViewById(R.id.title);
        TextView contenttext = findViewById(R.id.content);
        Intent parameterek = getIntent();
        titletext.setText(parameterek.getStringExtra("title"));
        contenttext.setText(parameterek.getStringExtra("content"));
    }
}
