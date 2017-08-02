package com.projectth.mobile.rabbitauto;

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class MyCarInfoActivity extends AppCompatActivity {

    Button btnBack,btnDel,btnManage;
    private TextView txtDescription;
ImageView imgPic1,imgPic2,imgPic3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mycar_info);

        txtDescription = (TextView)findViewById(R.id.txt_desciption);
        imgPic1= (ImageView)findViewById(R.id.imgPic1);
        imgPic2= (ImageView)findViewById(R.id.imgPic2);
        imgPic3= (ImageView)findViewById(R.id.imgPic3);
        btnBack = (Button)findViewById(R.id.btnBack);
        btnDel = (Button)findViewById(R.id.btnDelete);
        btnManage = (Button)findViewById(R.id.btnEdit);



        imgPic1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(MyCarInfoActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().myCar.m_pic1);
                startActivity(intent);
            }
        });


        imgPic2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(MyCarInfoActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().myCar.m_pic2);
                startActivity(intent);
            }
        });


        imgPic3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(MyCarInfoActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().myCar.m_pic3);
                startActivity(intent);
            }
        });


        btnManage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SharedObject.getInstance().manageCar = SharedObject.getInstance().myCar;

                Intent intent= new Intent(MyCarInfoActivity.this,ManageCarActivity.class);
                startActivity(intent);
            }
        });

        btnDel.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {



                AlertDialog.Builder alert = new AlertDialog.Builder(MyCarInfoActivity.this);
                alert.setMessage("Are you want to delete this car ? " );
                alert.setTitle("Confirm");
                alert.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                        DeleteTask d = new DeleteTask();
                        d.car_id = Integer.toString(SharedObject.getInstance().myCar.m_id);
                        d.execute();
                        dialog.dismiss();
                    }
                });
                alert.setNegativeButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();

                    }
                });


                alert.show();

            }
        });

        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        initView();

    }


    class DeleteTask extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(MyCarInfoActivity.this);

        String car_id = "";

        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/del_mycar/?car_id=" + car_id ).build();

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
            try {
                String result = new JSONObject(string).getString("result");
                if(result.equals("success")){
                    AlertDialog.Builder alert = new AlertDialog.Builder(MyCarInfoActivity.this);
                    alert.setMessage("Delete car was success." );
                    alert.setTitle("Info");
                    alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            dialog.dismiss();
                            finish();
                        }
                    });

                    alert.show();
                }else{

                    AlertDialog.Builder alert = new AlertDialog.Builder(MyCarInfoActivity.this);

                    alert.setMessage(" Can not delete car." );
                    alert.setTitle("Alert");
                    alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {


                            dialog.dismiss();
                        }
                    });


                    alert.show();
                }

            } catch (JSONException e) {
                e.printStackTrace();
            }

        }
    };


    private void initView() {
        txtDescription.setText("Brand: " + SharedObject.getInstance().myCar.m_car_brand + "\n"
                + "Model: " + SharedObject.getInstance().myCar.m_car_model + "\n"
                + "Chessis Number: " + SharedObject.getInstance().myCar.m_body_no + "\n"
                + "Lincese No: " + SharedObject.getInstance().myCar.m_license_no + "\n"
                + "Lincese Date: " + SharedObject.getInstance().myCar.m_license_plate_date + "\n"
                + "Insurance Date : " + SharedObject.getInstance().myCar.m_insureance_date + "\n" );



        Glide.with(MyCarInfoActivity.this)
                .load(SharedObject.getInstance().myCar.m_pic1)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic1);

        Glide.with(MyCarInfoActivity.this)
                .load(SharedObject.getInstance().myCar.m_pic2)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic2);

        Glide.with(MyCarInfoActivity.this)
                .load(SharedObject.getInstance().myCar.m_pic3)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic3);
    }
}
