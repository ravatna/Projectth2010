package com.projectth.mobile.kt1s;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.squareup.okhttp.MediaType;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONException;

import java.io.IOException;

public class LoginActivity extends AppCompatActivity {

    private EditText edtUsername;
    private EditText edtPassword;

    private TextView txvVersion;

    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;

    private static final String MY_PREFS = "projectth_kteclaim";
    private Button  btnLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        sharedPreferences = getApplicationContext().getSharedPreferences(MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        initView();
    }

    private void initView() {

        edtUsername = (EditText)findViewById(R.id.edtUsername);
        edtPassword = (EditText)findViewById(R.id.edtPassword);
        edtUsername.setText("0831356653");
        edtPassword.setText("6653");

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
        Intent intent = new Intent(LoginActivity.this,TaskActivity.class);
        startActivity(intent);
        finish();

//        new Login().execute();
    }

    private class Login extends AsyncTask<Void, Void, String> {
        String strJson,postUrl;
        ProgressDialog pd;
        @Override
        protected void onPreExecute() {
            // Create Show ProgressBar
            strJson = "{'mobile_customer':'" + edtUsername.getText().toString()  + "','pass_customer':'" + edtPassword.getText().toString() + "'}";
            postUrl  = App.getInstance().m_server + "/Security/login_customer_susco";
            pd = new ProgressDialog(LoginActivity.this);
            pd.setMessage("กำลังดำเนินการ...");
            pd.setCancelable(false);
            pd.show();

        }

        protected String doInBackground(Void... urls)   {

            String result = null;
            try {
                result = post(postUrl, strJson);
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

        public  final MediaType JSON = MediaType.parse("application/json; charset=utf-8");

        OkHttpClient client = new OkHttpClient();

        String post(String url, String json) throws IOException {
            RequestBody body = RequestBody.create(JSON, json);
            Request request = new Request.Builder()
                    .url(url)
                    .post(body)
                    .build();
            Response response = client.newCall(request).execute();
            return response.body().string();
        }

    }

    private void parseResultLogin(String result) {

        try {
//            JSONObject jsonObj = new JSONObject(result);
//            App.getInstance().loginObject = jsonObj;
//            JSONArray arr = jsonObj.getJSONArray("customer_detail");
//
//            App.getInstance().formToken = jsonObj.getString("formToken");
//            App.getInstance().cookieToken = jsonObj.getString("cookieToken");
//
//            App.getInstance().customerMember = arr.getJSONObject(0);
//            App.getInstance().selectNews = jsonObj.getJSONArray("select_news");

            // when logoin state valid next load dialy transaction
            Intent intent = new Intent(LoginActivity.this,MainActivity.class);
            startActivity(intent);
            finish();

        } catch (Exception e) {
            e.printStackTrace();
        }




    }





}
