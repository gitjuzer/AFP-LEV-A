package com.main.project.projectx;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Gravity;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.google.gson.Gson;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.InputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import javax.net.ssl.HttpsURLConnection;

public class tananyagok extends AppCompatActivity {
    Intent elozo;
    int TopicId;
    String topicname;
    public static List<Curriculum> CurriculumsList;
    public static List<Exercise> ExercisesList;
    LinearLayout curriculumsListLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tananyagok);
        elozo = getIntent();
        topicname = elozo.getStringExtra("topicname");
        TopicId = Integer.parseInt(elozo.getStringExtra("topicid"));
        setTitle(topicname);
        curriculumsListLayout = findViewById(R.id.curriculom_container);
        Runnable r = new Runnable() {
            @Override
            public void run() {
                feltoltCurriculums();
                feltoltExercises();
            }
        };
        Thread t = new Thread(r);

        t.start();
        try{
            t.join();
        }catch (Exception e){

        }
        for (Curriculum item: CurriculumsList) {
            TextView titleView = new TextView(this);
            titleView.setText(item.title);
            titleView.setTextSize(20);
            titleView.setTextColor(getResources().getColor(R.color.curriculum_color));
            titleView.setGravity(Gravity.CENTER);
            // TODO: onclick navigáció hozzáadása
            curriculumsListLayout.addView(titleView);
        }

    }

    private String getToken() {
        SharedPreferences prefs = getSharedPreferences("Adatok",Context.MODE_PRIVATE);
        return prefs.getString("token","");
    }
    private  void feltoltCurriculums(){
        Gson gson= new Gson();
        try {

            URL url = new URL("https://nyusz.eu/afpleva/public/sapi/curricula?topic="+TopicId);
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
                CurriculumsList = new ArrayList<Curriculum>();
                for (int i = 0; i < array.length();i++ ){
                    Log.w("JsonArray item"+i,array.getJSONObject(i).toString());
                    CurriculumsList.add(gson.fromJson(array.getJSONObject(i).toString(),Curriculum.class));
                }
            }


        }catch (Exception e){
            Log.w("Api error: ",e);
        }
    }
    private  void feltoltExercises(){
        Gson gson= new Gson();
        try {
            URL url = new URL("https://nyusz.eu/afpleva/public/sapi/exerciseDilemmas?topic="+TopicId);
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
                ExercisesList = new ArrayList<Exercise>();
                for (int i = 0; i < array.length();i++ ){
                    Log.w("JsonArray item"+i,array.getJSONObject(i).toString());
                    ExercisesList.add(gson.fromJson(array.getJSONObject(i).toString(),Exercise.class));
                }
            }


        }catch (Exception e){
            Log.w("Api error: ",e);
        }
    }
}
