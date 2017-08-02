package com.projectth.mobile.kt1s;

import android.Manifest;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
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
    private ArrayList<CaseItem> mapArrayList ;

    public ImageView imageLoader;

    public CaseAdapter(Context _ctx , ArrayList<CaseItem> mapList) {
        ctx = _ctx;
        mapArrayList = mapList;
        inflater = (LayoutInflater)ctx.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    }

    public int getCount() {
        return mapArrayList.size();
    }

    public CaseItem getItem(int position) {
        return mapArrayList.get(position);
    }

    public long getItemId(int position) {
        return position;
    }

    public View getView(final int position, View convertView, ViewGroup parent) {

        View vi=convertView;
        if(convertView==null)
            vi = inflater.inflate(R.layout._item_task, null);
            final CaseItem item= mapArrayList.get(position);

        TextView txvCaseCode = (TextView)vi.findViewById(R.id.txvCaseCode);
//        TextView txvPPhone = (TextView)vi.findViewById(R.id.txvPPhone);
        TextView txvPName = (TextView)vi.findViewById(R.id.txvPName);
        TextView txvStatusJob = (TextView)vi.findViewById(R.id.txvStatusJob);
        TextView txvAccidentPlace = (TextView)vi.findViewById(R.id.txvAccidentPlace);
        TextView txvTimeAcceptCase = (TextView)vi.findViewById(R.id.txvTimeAcceptCase);
        TextView txvCarBrandLicensePlate = (TextView)vi.findViewById(R.id.txvCarBrand_plate_license);
        Button btnAcceptCase = (Button)vi.findViewById(R.id.btnAccepCase);
        Button btnCancelCase = (Button)vi.findViewById(R.id.btnCancelCase);
        LinearLayout lnrStatus = (LinearLayout)vi.findViewById(R.id.status_bar);


        // Setting all values in listview

        txvCaseCode.setText(item.mKTCode + " เลขเคลม :" + item.mClaimCode); // รหัสรับแจ้ง

//      txvPPhone.setText(item.mPPhone); // เบอร์ติดต่อ ป.
        txvPName.setText(item.mPName); // ชื่อติดต่อ ป.
        txvStatusJob.setText(item.mStatusJob); // สถานะงาน
        txvCarBrandLicensePlate.setText("ยี่ห้อ/ทะเบียน :" + item.mCarBrand +"/" + item.mLicensePlate);
        if(item.mStatusJob.equals("งานใหม่"))
        {
            lnrStatus.setBackgroundColor(ctx.getResources().getColor(R.color.status_new_job));
        }else if(item.mStatusJob.equals("กำลังทำ"))
        {
            lnrStatus.setBackgroundColor(ctx.getResources().getColor(R.color.status_current_job));
        }else if(item.mStatusJob.equals("ส่งข้อมูลแล้ว"))
        {
            lnrStatus.setBackgroundColor(ctx.getResources().getColor(R.color.status_send_job));
        }

        txvAccidentPlace.setText(item.mAccidentPlace); // สถานที่เกิดเหตุ
        txvTimeAcceptCase.setText(item.mTimeAcceptCase); // เวลารับแจ้งได้รับช้อมูล

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

                                        //@todo send command cancel by user to service
                                        mapArrayList.get(position).mIsCancelJob = 1;
                                        mapArrayList.remove(position);
                                        CaseAdapter.this.notifyDataSetChanged();

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
