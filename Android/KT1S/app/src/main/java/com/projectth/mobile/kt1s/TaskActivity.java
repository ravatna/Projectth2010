/**
 * List task from service by user login session
 * and display new claim , current , and sended claim
 * by show all in current month only
 *
 * when display list item ,application will
 * seperate by color on card caption
 */

package com.projectth.mobile.kt1s;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;

import com.squareup.okhttp.FormEncodingBuilder;
import com.squareup.okhttp.MediaType;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;

public class TaskActivity extends AppCompatActivity {

    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;

    ArrayList <Inform> informs;
    CaseAdapter adapter;
    ClaimDB claimDB;
    ListView listView;
    String mInformId = "";
    Boolean mCallToP = false;
    Boolean mCheckPoint = false;
    Button btnRefreshClaim;
    TextView txvStatus;
    private int iSend=0;
    private int iAll=0;
    private int iVerify=0;
    private int iAccept=0;
    private Button btnLogout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_task);
        claimDB = new ClaimDB(this,"claim_db",null,1);

        sharedPreferences = getApplicationContext().getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        // check is stil work with any inform
        mInformId =  sharedPreferences.getString(App.CURRENT_INFORM_ID,""); // inform id
        mCallToP = sharedPreferences.getBoolean(App.CALL_TO_P, false); // is call to p
        mCheckPoint = sharedPreferences.getBoolean(App.CHECK_POINT, false); // is call to p

txvStatus = (TextView)findViewById(R.id.txvStatus);

        btnLogout = (Button) findViewById(R.id.btnLogout);

        btnRefreshClaim = (Button)findViewById(R.id.btnRefreshCurrentClaim);

        btnLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                new AlertDialog.Builder(TaskActivity.this)
                        .setTitle("แจ้งเตือน")
                        .setMessage("ต้องการออกจากระบบใช่หรือไม่?")
                        .setNeutralButton("ใช่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog, int which) {
                                        dialog.dismiss();

                                        // clear current

                                        // commit content
                                        editor.putString(App.LOGIN_JSON, "");
                                        editor.putBoolean(App.CURRENT_INFORM_ID,false);
                                        editor.putBoolean(App.CALL_TO_P,false);
                                        editor.putBoolean(App.CHECK_POINT,false);

                                        editor.commit();

                                        Intent intent = new Intent(TaskActivity.this, LoginActivity.class);
                                                startActivity(intent);

                                        finish();


                                    }
                                })
                        .setNegativeButton("ไม่ใช่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog, int which) {
                                        dialog.dismiss();


                                    }
                                })
                        .show();

            }
        });

        btnRefreshClaim.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
             new LoadClaims().execute();
            }
        });






        // if have some id meaning to still working on jobs.
        // will skip taskdetail screen.
        if(!mInformId.equals("") && mCallToP && mCheckPoint){
            Intent intent = new Intent(TaskActivity.this, ProgressMenuActivity.class);
            startActivity(intent);

        }else if(!mInformId.equals("") && mCallToP && !mCheckPoint){
            Intent intent = new Intent(TaskActivity.this, TaskDetailActivity.class);
            startActivity(intent);

        }else{
            new LoadClaims().execute();
        }

    }




    /**
     * Class login by service
     */
    private class LoadClaims extends AsyncTask<Void, Void, String> {
        String postUrl;
        ProgressDialog pd;
        OkHttpClient client = new OkHttpClient();

        @Override
        protected void onPreExecute() {
            // Create Show ProgressBar
            postUrl  = App.getInstance().m_server + "/login/list_claim_api" ;
            pd = new ProgressDialog(TaskActivity.this);
            pd.setMessage("กำลังดำเนินการ...");
            pd.setCancelable(false);
            pd.show();

        }

        protected String doInBackground(Void... urls)   {

            String result = null;
            try {
                RequestBody formBody = new FormEncodingBuilder()
                        .add("claim_officer", App.getInstance().claimOfficer.user )
                        //.add("claim_officer","narat")
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

            parseResult(result);

        }

    }

    private void parseResult(String result) {

        try {

            JSONObject jsonObj = new JSONObject(result);
            Log.i("JSON",result);

            if(jsonObj.getString("status").equals("success")) {


                JSONArray arrData = jsonObj.getJSONArray("data");

                for(int i = 0; i < arrData.length() ; i ++){
                    JSONObject item = arrData.getJSONObject(i);
                    Log.i("json",item.toString());
                    Inform inform = new Inform();

                    inform.id = item.getString("id");
                    inform.inform_date = item.getString("inform_date");
                    inform.inform_datetime = item.getString("inform_datetime");
                    inform.company_name =  item.getString("company_name");

                    inform.claim_id_comapany = item.getString("clam_id_company");
                    inform.claim_id_self = item.getString("clam_id_self");
                    inform.insurance_company_id = item.getString("insurance_company_id");
                    inform.clam_officer = item.getString("clam_officer");
                    inform.Garage = item.getString("Garage");
                    inform.insurance_start_date = item.getString("insurance_start_date");
                    inform.insurance_end_date = item.getString("insurance_end_date");
                    inform.insurance_type = item.getString("insurance_type");
                    inform.insurance_id = item.getString("insurance_id");
                    inform.accident_place = item.getString("accident_place");
                    inform.accident_inform = item.getString("accident_inform");
                    inform.car_brand = item.getString("car_brand");
                    inform.car_no = item.getString("car_no");

                    inform.car_no_province = item.getString("car_no_province");
                    inform.vehicle_identification_number = item.getString("vehicle_identification_number");
                    inform.poung_no = item.getString("poung_no");
                    inform.poung_identification_number = item.getString("poung_identification_number");
                    inform.poung_insurance_id = item.getString("poung_insurance_id");
                    inform.poung_insurance_start_date = item.getString("poung_insurance_start_date");
                    inform.poung_insurance_end_date = item.getString("poung_insurance_end_date");
                    inform.poung_insurance_type = item.getString("poung_insurance_type");
                    inform.driver_name = item.getString("driver_name");
                    inform.driver_phone = item.getString("driver_phone");
                    inform.insurance_owner = item.getString("insurance_owner");

                    inform.insurance_owner_phone = item.getString("insurance_owner_phone");
                    inform.accdent_des = item.getString("accdent_des");
                    inform.dd = item.getString("dd");
                    inform.dd_owner = item.getString("dd_owner");
                    inform.dd_owner_des = item.getString("dd_owner_des");
                    inform.dd_parties = item.getString("dd_parties");
                    inform.dd_parties_des = item.getString("dd_parties_des");
                    inform.ps = item.getString("ps");
                    inform.status = item.getString("status");
                    inform.clam_id = item.getString("clam_id");
                    inform.insurance_fix_name_1 = item.getString("insurance_fix_name_1");
                    inform.insurance_fix_name_2 = item.getString("insurance_fix_name_2");
                    inform.insurance_start_datetime = item.getString("insurance_start_datetime");
                    inform.insurance_end_datetime = item.getString("insurance_end_datetime");


                    // check duplicate data by inform id
                    if(claimDB.inform_by_kt_id(inform.claim_id_comapany) == null) {
                        claimDB.insertData(inform);
                    }else{
                        //claimDb.insertData(inform);
                    }
                } // End of for

                informs  = new ArrayList<>();
iAll = 0;
                iVerify = 0;
                iSend = 0;
                iAccept = 0;
                // load data from database.
                informs = claimDB.informs();
                adapter = new CaseAdapter(TaskActivity.this, informs);

                listView = (ListView)findViewById(R.id.lstTask);
                listView.setAdapter(adapter);
                listView.setFocusable(false);

                for (Inform inf: informs) {
                    iAll++;

                    if(inf.status.equals("accept"))
                    {
                        iAccept++;
                    }
                    else if(inf.status.equals("verify"))
                    {
                        iVerify++;

                    }else if( inf.status.equals("send"))
                    {

                        iSend++;
                    }

                }

                txvStatus.setText("เดือนนี้ ทั้งหมด:" + iAll +" ,เปิด:" + iAccept +" ,ส่ง:" + iSend +" ,ผ่าน:" + iVerify );

            }


            else{

                new AlertDialog.Builder(TaskActivity.this)
                        .setTitle("แจ้งเตือน")
                        .setMessage("ไม่สามารถแสดงรายการข้อมูลได้ โปรดตรวจสอบการเชื่อมต่อ Internet")
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


    /**
     * Update claim item to database
     */
    private void updateClaim2DB() {






    }


    @Override
    protected void onResume() {
        super.onResume();




        // new LoadClaims().execute();
    }
}
