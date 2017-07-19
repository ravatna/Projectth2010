package com.projectth.mobile.kt1s;

import android.Manifest;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.net.Uri;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by rewat on 26/5/2560.
 */

public class CaseAdapter extends BaseAdapter {
    private Context ctx;
    private static LayoutInflater inflater=null;
    private ArrayList<Inform> mapArrayList ;

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;



    public CaseAdapter(Context _ctx , ArrayList<Inform> mapList) {
        ctx = _ctx;
        mapArrayList = mapList;
        inflater = (LayoutInflater)ctx.getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        sharedPreferences = ctx.getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();
    }

    public int getCount() {
        if(mapArrayList != null)
            return mapArrayList.size();
        else
            return 0;
    }

    public Inform getItem(int position) {
        return mapArrayList.get(position);
    }

    public long getItemId(int position) {
        return position;
    }

    public View getView(final int position, View convertView, ViewGroup parent) {

        View vi=convertView;
        if(convertView==null)
            vi = inflater.inflate(R.layout._item_task, null);
            final Inform item= mapArrayList.get(position);

        TextView txvCaseCode = (TextView)vi.findViewById(R.id.txvCaseCode);
//      TextView txvPPhone = (TextView)vi.findViewById(R.id.txvPPhone);
        TextView txvInsuranceCompanyName = (TextView)vi.findViewById(R.id.txvInsuranceCompanyName);
        TextView txvStatusJob = (TextView)vi.findViewById(R.id.txvStatusJob);
        TextView txvAccidentPlace = (TextView)vi.findViewById(R.id.txvAccidentPlace);
        TextView txvTimeAcceptCase = (TextView)vi.findViewById(R.id.txvTimeAcceptCase);
        TextView txvCarBrandLicensePlate = (TextView)vi.findViewById(R.id.txvCarBrand_plate_license);
        Button btnAcceptCase = (Button)vi.findViewById(R.id.btnAccepCase);
        Button btnCancelCase = (Button)vi.findViewById(R.id.btnCancelCase);

        LinearLayout lnrStatus = (LinearLayout)vi.findViewById(R.id.status_bar);


        // Setting all values in listview

        txvCaseCode.setText(item.claim_id_comapany + " เลขเคลม : " + item.claim_id_self ); // รหัสรับแจ้ง

//      txvPPhone.setText(item.mPPhone); // เบอร์ติดต่อ ป.
        txvInsuranceCompanyName.setText("บ.ประกัน : " + item.company_name); // ชื่อติดต่อ ป.

        txvCarBrandLicensePlate.setText("ยี่ห้อ/ทะเบียน : " + item.car_brand +"/" + item.car_no);
        btnCancelCase.setVisibility(View.INVISIBLE);

        if(item.status.equals("active"))
        {
            lnrStatus.setBackgroundColor(ctx.getResources().getColor(R.color.status_new_job));
            txvStatusJob.setText("งานใหม่"); // สถานะงาน
        }else if(item.status.equals("accept"))
        {
            lnrStatus.setBackgroundColor(ctx.getResources().getColor(R.color.status_current_job));

            btnAcceptCase.setText("ดูเคลม");
            txvStatusJob.setText("กำลังดำเนินการ"); // สถานะงาน
        }
        else if(item.status.equals("verify") || item.status.equals("send"))
        {

            lnrStatus.setBackgroundColor(ctx.getResources().getColor(R.color.status_send_job));
            txvStatusJob.setText("ตรวจสอบแล้ว"); // สถานะงาน
            btnAcceptCase.setText("ดูเคลม");
        }



        txvAccidentPlace.setText("สถานที่เกิดเหตุ : " + item.accident_place); // สถานที่เกิดเหตุ
        txvTimeAcceptCase.setText(item.inform_datetime); // เวลารับแจ้งได้รับช้อมูล

        btnAcceptCase.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                new AlertDialog.Builder(ctx)
                        .setTitle("ยืนยัน")
                        .setMessage("ต้องการรับงานนี้ใช่หรืไม่?")
                        .setPositiveButton("ใช่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {
                                        dialog.dismiss();

                                        Intent intent = new Intent(ctx,TaskDetailActivity.class);

                                        // put content to prefernce

                                        editor.putString(App.CURRENT_INFORM_ID,item.claim_id_comapany);
                                        //editor.putBoolean(App.CALL_TO_P,true);
                                        editor.commit();



                                        // start activity
                                        ctx.startActivity(intent);


                                    }
                                })
                        .setNegativeButton("ไม่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {
                                        dialog.cancel();
                                    }
                                })
                        .show();
            }
        });

        btnCancelCase.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                new AlertDialog.Builder(ctx)
                        .setTitle("ยืนยัน")
                        .setMessage("ต้องการปฏิเสธงานนี้ใช่หรืไม่?")
                        .setPositiveButton("ใช่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {
                                        dialog.dismiss();

                                        // not yet implement for now
//                                      //@todo send command cancel by user to service
//                                      mapArrayList.get(position).mIsCancelJob = 1;
//                                      mapArrayList.remove(position);
//                                      CaseAdapter.this.notifyDataSetChanged();

                                    }
                                })
                        .setNegativeButton("ไม่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {
                                        dialog.cancel();
                                    }
                                })
                        .show();
            }
        });


        return vi;
    }
}
