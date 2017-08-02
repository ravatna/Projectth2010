package com.projectth.mobile.rabbitauto;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;

import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class MyCarActivity extends AppCompatActivity  {
    private ListView listItem;
    MyCarItem[] m_carItem;

    Button btnBack;
    Button btnAdd;

    SharedPreferences pref;
    SharedPreferences.Editor prefEdit;
    JSONObject  productNew;
     MyCarItemAdapter adapter1;


    void initPreference(){
        pref = getSharedPreferences("RABBIT_AUTO_CRAFT", MODE_PRIVATE);
//set the sharedpref
        prefEdit = pref.edit();
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mycar);

        listItem = (ListView) findViewById(R.id.listItem);

        initPreference();
        btnBack = (Button)findViewById(R.id.btnBack);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        btnAdd = (Button)findViewById(R.id.btnAddCar);

        btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedObject.getInstance().manageCar = null;
                Intent intent = new Intent(MyCarActivity.this,ManageCarActivity.class);
                startActivity(intent);
            }
        });

        // inidata
        m_carItem = new MyCarItem[0];
        MyCarItemAdapter adapter1 = new MyCarItemAdapter(this,R.layout.list_caritem2,m_carItem);
        listItem.setAdapter(adapter1);
        listItem.setFocusable(false);

        new GetMyCar().execute();

    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }


    class GetMyCar extends AsyncTask<Void, Void, String> {
        ProgressDialog p;

        public  GetMyCar(){

            p = new ProgressDialog(MyCarActivity.this);
        }
        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/list_mycar/?cust_id=" + pref.getString("id","")).build();

            try {
                Response response = okHttpClient.newCall(request).execute();
                if (response.isSuccessful()) {
                    return response.body().string();
                } else {
                    return "Not Success - code : " + response.code();
                }
            } catch (IOException e) {
                e.printStackTrace();
                return "Error - " + e.getMessage();
            }
        }

        @Override
        protected void onPostExecute(String string) {
            super.onPostExecute(string);

            if(p.isShowing()){
                p.dismiss();
            }
            if(string==null){ return ; }
            JSONArray a;

            try {
                JSONObject result = new JSONObject(string).getJSONObject("result");

                productNew = result.getJSONObject("mycar");
                a =  productNew.getJSONArray("items");
                m_carItem = new MyCarItem[a.length()];
                for(int i = 0; a.length() > i; i++){
                    JSONObject car = a.getJSONObject(i);
                    m_carItem[i] = new MyCarItem();
                    m_carItem[i].m_cust_id = car.getString("cust_id");
                    m_carItem[i].m_body_no = car.getString("body_no");
                    m_carItem[i].m_license_plate_date = car.getString("license_plate_date");
                    m_carItem[i].m_car_model = car.getString("car_model");
                    m_carItem[i].m_car_brand = car.getString("car_brand");
                    m_carItem[i].m_insureance_date = car.getString("insureance_date");
                    m_carItem[i].m_license_no = car.getString("license_no");



                    m_carItem[i].m_pic1 = "http://dev.exclusivedatethai.com/admin/uploads_mycar/" + car.getString("pic1");
                    m_carItem[i].m_pic2 = "http://dev.exclusivedatethai.com/admin/uploads_mycar/" + car.getString("pic2");
                    m_carItem[i].m_pic3 = "http://dev.exclusivedatethai.com/admin/uploads_mycar/" + car.getString("pic3");

                }

                adapter1 = new MyCarItemAdapter(MyCarActivity.this,R.layout.list_caritem2,m_carItem);
                listItem.setAdapter(adapter1);



            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    };


}
