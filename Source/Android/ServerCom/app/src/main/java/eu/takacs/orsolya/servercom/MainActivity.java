package eu.takacs.orsolya.servercom;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.TextView;

import java.io.IOException;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class MainActivity extends AppCompatActivity {

    // avoid creating several instances, should be singleon
    static OkHttpClient client = new OkHttpClient();

    TextView textView;

    //annotáció-@: ezzel jelölöm, hogy felüldefiniáltam az ősosztályt
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        //super-base
        super.onCreate(savedInstanceState);
        //setContentView beolvassa az xml tartalmát, és példányosítja és inicializálja is az objektumokat!
        setContentView(R.layout.activity_main);

        textView = findViewById(R.id.text);

        // https://github.com/gitjuzer/AFP-LEV-A/blob/develop/Doc/vegpontok.md
        final Request request = new Request.Builder()
                .header("Accept", "application/json")
                .post(RequestBody.create(MediaType.parse("application/json"),
                        "{\"email\": \"arjunphp@gmail.com\", \"password\": \"Arjun@123\"}"
                ))
                .url("https://nyusz.eu/afpleva/public/api/login")
                .build();

        client.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(Call call, IOException e) {
                showResult(e.getMessage());
            }

            @Override
            public void onResponse(Call call, final Response response) throws IOException {
                showResult(response + "\nBody: " + response.body().string());
            }
        });
    }

    protected void showResult(final String text) {
        textView.post(new Runnable() {
            @Override
            public void run() {
                textView.setText(text);
            }
        });
    }
}
