package com.projectth.mobile.kt1s;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class SplashActivity extends AppCompatActivity {

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);


        sharedPreferences = getApplicationContext().getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);

        if(!sharedPreferences.getString("login_json","{}").equals("{}")){
            JSONObject jsonObj = null;
            try {
                jsonObj = new JSONObject(sharedPreferences.getString("login_json","{}"));
                App.getInstance().loginObject = jsonObj;



                App.getInstance().claimOfficer.id  = "";
                App.getInstance().claimOfficer.fullname  = jsonObj.getJSONObject("data").getString("firstname")
                        + "  " +  jsonObj.getJSONObject("data").getString("lastname");

                App.getInstance().claimOfficer.user  = jsonObj.getJSONObject("data").getString("username");
                App.getInstance().claimOfficer.pass  = jsonObj.getJSONObject("data").getString("password");

                // when logoin state valid next load dialy transaction
                Intent intent = new Intent(SplashActivity.this,TaskActivity.class);
                startActivity(intent);
                finish();
            } catch (JSONException e) {
                e.printStackTrace();
                new Thread(new Runnable() {
                    public void run() {
                        try {
                            Thread.sleep(3000);
                        } catch (InterruptedException e) { }

                        Intent intent = new Intent(SplashActivity.this, LoginActivity.class);
                        startActivity(intent);
                        finish();
                    }
                }).start();
            }
        }else{
            new Thread(new Runnable() {
                public void run() {
                    try {
                        Thread.sleep(3000);
                    } catch (InterruptedException e) { }

                    Intent intent = new Intent(SplashActivity.this, LoginActivity.class);
                    startActivity(intent);
                    finish();
                }
            }).start();
        }
    } // end onCreate

} // end class