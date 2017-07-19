package com.projectth.mobile.kt1s;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.MediaType;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class LoginActivity extends AppCompatActivity {

    private EditText edtUsername;
    private EditText edtPassword;

    private TextView txvVersion;

    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;

    private Button  btnLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        sharedPreferences = getApplicationContext().getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        initView();
    }

    private void initView() {

        edtUsername = (EditText)findViewById(R.id.edtUsername);
        edtPassword = (EditText)findViewById(R.id.edtPassword);
        edtUsername.setText("kt000");
        edtPassword.setText("kt000");

        btnLogin = (Button)findViewById(R.id.btnLogin);
        txvVersion = (TextView)findViewById(R.id.txvVersion);

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                doLogin();
            }
        });

        try {
            PackageInfo pInfo = getPackageManager().getPackageInfo(getPackageName(), 0);
            String version = pInfo.versionName;
            txvVersion.setText("v." + version);
        } catch (PackageManager.NameNotFoundException e) {
            e.printStackTrace();
        }
    }

    private void doLogin() {


        new Login().execute();
    }


    /**
     * Class login by service
     */
    private class Login extends AsyncTask<Void, Void, String> {
        String strJson,postUrl;
        ProgressDialog pd;
        String u,p;


        @Override
        protected void onPreExecute() {
            // Create Show ProgressBar
            u  = edtUsername.getText().toString();
            p = edtPassword.getText().toString();

            postUrl  = App.getInstance().m_server + "/login/login_api";
            pd = new ProgressDialog(LoginActivity.this);
            pd.setMessage("กำลังดำเนินการ...");
            pd.setCancelable(false);
            pd.show();

        }

        protected String doInBackground(Void... urls)   {

            String result = null;
            try {
                RequestBody formBody = new FormEncodingBuilder()
                        .add("u",u)
                        .add("p", p)
                        .build();

                Request request = new Request.Builder()
                        .url(postUrl)
                        .post(formBody)
                        .build();


                Response response = client.newCall(request).execute();
                return response.body().string();



            } catch (IOException e) {
                e.printStackTrace();
            }

            return result;
        }

        protected void onPostExecute(String result)  {

            if(pd.isShowing()){
                pd.dismiss();
                pd = null;
            }

            parseResultLogin(result);

        }


        OkHttpClient client = new OkHttpClient();


    }

    private void parseResultLogin(String result) {

        try {

            JSONObject jsonObj = new JSONObject(result);

            if(jsonObj.getString("status").equals("success")) {
                App.getInstance().loginObject = jsonObj;

                App.getInstance().claimOfficer.id  = "";
                App.getInstance().claimOfficer.fullname  = jsonObj.getJSONObject("data").getString("firstname")
                        + "  " +  jsonObj.getJSONObject("data").getString("lastname");


                App.getInstance().claimOfficer.user  = jsonObj.getJSONObject("data").getString("username");
                App.getInstance().claimOfficer.pass  = jsonObj.getJSONObject("data").getString("password");


                // commit content
                editor.putString("login_json", jsonObj.toString());
                editor.commit();

                // when logoin state valid next load dialy transaction
                Intent intent = new Intent(LoginActivity.this, TaskActivity.class);
                startActivity(intent);
                finish();
            }else{

                new AlertDialog.Builder(LoginActivity.this)
                        .setTitle("เข้าสู่ระบบ")
                        .setMessage("ไม่สามารถเข้าสู่ระบบ เนื่องจาก ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง")
                        .setNeutralButton("ปิด",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {
                                        dialog.dismiss();


                                    }
                                })

                        .show();

            }

        } catch (Exception e) {
            e.printStackTrace();
        }




    }





}
