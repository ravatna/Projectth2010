package com.projectth.mobile.rabbitauto;

import android.app.ProgressDialog;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
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

public class BookingServiceActivity extends AppCompatActivity {

    Button btnBack;
JSONObject bookingService;
    SharedPreferences pref;
    SharedPreferences.Editor prefEdit;
    BookingItem[] bItem;
    private BookingItemAdapter adapter1;
    private ListView listBooking;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking_service);
        initPreference();
        listBooking = (ListView)findViewById(R.id.listItem);
        btnBack = (Button)findViewById(R.id.btnBack);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        new GetBooking().execute();
    }

    void initPreference(){
        pref = getSharedPreferences("RABBIT_AUTO_CRAFT", MODE_PRIVATE);
//set the sharedpref
        prefEdit = pref.edit();
    }

    class GetBooking extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(BookingServiceActivity.this);
        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/list_mybooking/?cust_id=" + pref.getString("id","0")).build();

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
        protected void onPreExecute() {
            super.onPreExecute();

            p.show();
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

                bookingService = result.getJSONObject("mybooking");
                a =  bookingService.getJSONArray("items");
                bItem = new BookingItem[a.length()];
                for(int i = 0; a.length() > i; i++){
                    JSONObject obj = a.getJSONObject(i);
                    bItem[i] = new BookingItem();
                    bItem[i].m_id = obj.getInt("id");
                    bItem[i].m_detail = obj.getString("detail");
                    bItem[i].m_booking_for = obj.getString("booking_for");
                    bItem[i].m_car_brand = obj.getString("car_brand");
                    bItem[i].m_car_model = obj.getString("car_model");
                    bItem[i].m_created_date = obj.getString("created_date");


                }

                adapter1 = new BookingItemAdapter(BookingServiceActivity.this,R.layout.list_caritem,bItem);
                listBooking.setAdapter(adapter1);


            } catch (JSONException e) {
                e.printStackTrace();
            }

        }
    };

}
