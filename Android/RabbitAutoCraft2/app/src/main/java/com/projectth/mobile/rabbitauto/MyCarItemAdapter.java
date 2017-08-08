package com.projectth.mobile.rabbitauto;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.annotation.LayoutRes;
import android.support.annotation.NonNull;
import android.support.v7.app.AlertDialog;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
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

/**
 * Created by Administrator on 3/25/2017.
 */

public class MyCarItemAdapter extends ArrayAdapter<MyCarItem> {
    Context ctx;
    MyCarItem[] carItem;
    int m_res;
    private MyCarItemAdapter adapter1;
    private JSONObject m_bookings;

    public MyCarItemAdapter(@NonNull Context context, @LayoutRes int resource, @NonNull MyCarItem[] objects) {
        super(context, resource, objects);
        this.ctx = context;
        this.carItem = objects;
        this.m_res = resource;
    }

    @Override
    public int getCount() {
        return carItem.length;
    }

    @Override
    public MyCarItem getItem(int position) {
        return null;
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        // 1
        final MyCarItem item = carItem[position];

        // 2
        if (convertView == null) {
            final LayoutInflater layoutInflater = LayoutInflater.from(ctx);
            convertView = layoutInflater.inflate(m_res, null);
        }

        // 3
        final ImageView imgCar = (ImageView)convertView.findViewById(R.id.imgCar);
        final TextView titleTextView = (TextView)convertView.findViewById(R.id.txt_title);
        final TextView lcPlateTextView = (TextView)convertView.findViewById(R.id.txt_license_plate);
        final TextView licenseTextView = (TextView)convertView.findViewById(R.id.txt_license);
        final TextView insuranceTextView = (TextView)convertView.findViewById(R.id.txt_insurance);

        final Button btnBooking = (Button) convertView.findViewById(R.id.btnBooking);
        final Button btnCarInfo = (Button) convertView.findViewById(R.id.btnCarInfo);

        // 4
        // imageView.setImageResource(item.m_pic1);

        Glide.with(ctx)
                .load(item.m_pic1)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgCar);

        titleTextView.setText(item.m_car_brand + "," + item.m_car_model);
        lcPlateTextView.setText("Lincese No: " +item.m_license_no);
        licenseTextView.setText("Lincese Date: " +item.m_license_plate_date);
        insuranceTextView.setText("Insurance Date: " +item.m_insureance_date);

        btnBooking.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder alert = new AlertDialog.Builder(ctx);

                alert.setMessage("Are you want to  booking car service for "+ item.m_license_no +"?");
                alert.setTitle("Confirm");
                alert.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                        new BookingTask().execute();

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


        btnCarInfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(ctx,MyCarInfoActivity.class);


                SharedObject.getInstance().myCar  = new MyCarItem();
                SharedObject.getInstance().myCar.m_cust_id = item.m_cust_id;
                SharedObject.getInstance().myCar.m_body_no = item.m_body_no;
                SharedObject.getInstance().myCar.m_license_plate_date = item.m_license_plate_date;
                SharedObject.getInstance().myCar.m_car_model = item.m_car_model;
                SharedObject.getInstance().myCar.m_car_brand = item.m_car_brand;
                SharedObject.getInstance().myCar.m_insureance_date = item.m_insureance_date;
                SharedObject.getInstance().myCar.m_license_no = item.m_license_no;
                SharedObject.getInstance().myCar.m_pic1 =  item.m_pic1;
                SharedObject.getInstance().myCar.m_pic2 =   item.m_pic2;
                SharedObject.getInstance().myCar.m_pic3 =   item.m_pic3;


                ctx.startActivity(i);
            }
        });

        return convertView;
    }

    class BookingTask extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(ctx);

        String car_id = "";
        String cust_id = "";
        String booking_for = "";

        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/add_booking/?car_id=" + car_id  + "&booking_for=" + booking_for + "&cust_id=" + cust_id).build();

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
                    AlertDialog.Builder alert = new AlertDialog.Builder(ctx);

                    alert.setMessage("ทำรายการสำเร็จ\nโปรดรอรับการติดต่อกลับจากทางเจ้าหน้าที่เพื่อยืนยันเวลาอีกครั้งค่ะ " );
                    alert.setTitle("Info");
                    alert.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {


                            dialog.dismiss();
                        }
                    });


                    alert.show();
                }else{

                            AlertDialog.Builder alert = new AlertDialog.Builder(ctx);

                    alert.setMessage(" Can not booking car service." );
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
}
