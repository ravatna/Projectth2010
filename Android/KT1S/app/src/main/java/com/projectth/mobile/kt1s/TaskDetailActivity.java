package com.projectth.mobile.kt1s;

import android.Manifest;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;

import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;



public class TaskDetailActivity extends AppCompatActivity {

    Button btnCheckIn;
    Button btnTelToP;

    ClaimDB claimDB;
    private TextView txvCaseCode,txvInsuranceCompanyName;
    private TextView txvAccidentPlace,txvTimeAcceptCase,txvStatusJob;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    private LinearLayout lnrStatus;

    private Inform inform;
    private TextView txvCarBrandLicensePlate;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_task_detail);
        btnTelToP = (Button) findViewById(R.id.btnTelToP);
        btnCheckIn = (Button) findViewById(R.id.btnCheckIn);


        sharedPreferences = getApplicationContext().getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        claimDB = new ClaimDB(this,"claim_db",null,1);

        txvCaseCode = (TextView)findViewById(R.id.txvCaseCode);
        txvStatusJob = (TextView)findViewById(R.id.txvStatusJob);
        txvInsuranceCompanyName = (TextView)findViewById(R.id.txvInsuranceCompanyName);
        txvAccidentPlace = (TextView)findViewById(R.id.txvAccidentPlace);
        txvTimeAcceptCase = (TextView)findViewById(R.id.txvTimeAcceptCase);
        txvCarBrandLicensePlate = (TextView)findViewById(R.id.txvCarBrand_plate_license);
        lnrStatus = (LinearLayout)findViewById(R.id.status_bar) ;

        inform = claimDB.inform_by_kt_id(sharedPreferences.getString(App.CURRENT_INFORM_ID,""));

        if(inform != null){


            txvCaseCode.setText(inform.claim_id_comapany + " เลขเคลม : " + inform.claim_id_self ); // รหัสรับแจ้ง
            txvInsuranceCompanyName.setText("บ.ประกัน : " + inform.company_name); // ชื่อติดต่อ ป.
            txvCarBrandLicensePlate.setText("ยี่ห้อ/ทะเบียน :" + inform.car_brand +"/" + inform.car_no);

            if(inform.status.equals("active"))
            {
                lnrStatus.setBackgroundColor(getResources().getColor(R.color.status_new_job));
                txvStatusJob.setText("งานใหม่"); // สถานะงาน
            }else if(inform.status.equals("accept"))
            {
                lnrStatus.setBackgroundColor(getResources().getColor(R.color.status_current_job));

                txvStatusJob.setText("กำลังดำเนินการ"); // สถานะงาน
            }
            else if(inform.status.equals("verify") || inform.status.equals("send"))
            {

                lnrStatus.setBackgroundColor(getResources().getColor(R.color.status_send_job));
                txvStatusJob.setText("ตรวจสอบแล้ว"); // สถานะงาน

            }



            txvAccidentPlace.setText("สถานที่เกิดเหตุ : " + inform.accident_place); // สถานที่เกิดเหตุ
            txvTimeAcceptCase.setText(inform.inform_datetime); // เวลารับแจ้งได้รับช้อมูล



        }else{

            new AlertDialog.Builder(TaskDetailActivity.this)
                    .setTitle("แจ้งเตือน")
                    .setMessage("ไม่พบข้อมูลรับแจ้ง")
                    .setNeutralButton("ปิด",
                            new DialogInterface.OnClickListener() {

                                @Override
                                public void onClick(DialogInterface dialog,
                                                    int which) {
                                    dialog.dismiss();
                                    btnCheckIn.setVisibility(View.VISIBLE);


                                    dialog.dismiss();
                                    finish();
                                }
                            })

                    .show();
        }



        btnTelToP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if(inform.driver_phone !="" && inform.driver_phone == null){
                    new AlertDialog.Builder(TaskDetailActivity.this)
                            .setTitle("ยืนยัน")
                            .setMessage("ต้องการโทรหา ผู้แจ้งเหตุใช่หรือไม่?")
                            .setPositiveButton("ใช่",
                                    new DialogInterface.OnClickListener() {

                                        @Override
                                        public void onClick(DialogInterface dialog,
                                                            int which) {
                                            dialog.dismiss();
                                            btnCheckIn.setVisibility(View.VISIBLE);

                                            // keep state called to p
                                            editor.putBoolean(App.CALL_TO_P,true);
                                            editor.commit();

                                            Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + inform.driver_phone.replace("-","")));
                                            if (ActivityCompat.checkSelfPermission(TaskDetailActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                                                // TODO: Consider calling
                                                //    ActivityCompat#requestPermissions
                                                // here to request the missing permissions, and then overriding
                                                //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                                                //                                          int[] grantResults)
                                                // to handle the case where the user grants the permission. See the documentation
                                                // for ActivityCompat#requestPermissions for more details.

                                                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                                                    TaskDetailActivity.this.requestPermissions(new String [] { Manifest.permission.CALL_PHONE },1000);
                                                }

                                                return;
                                            }
                                            startActivity(intent);

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



                }else{

                    new AlertDialog.Builder(TaskDetailActivity.this)
                            .setTitle("แจ้งเตือน")
                            .setMessage("ไม่พบเบอร์ ผู้ขับขี่ ต้องการโทรเข้ารับแจ้งใช่หรือไม่?")
                            .setPositiveButton("ใช่",
                                    new DialogInterface.OnClickListener() {

                                        @Override
                                        public void onClick(DialogInterface dialog,
                                                            int which) {
                                            dialog.dismiss();
                                            btnCheckIn.setVisibility(View.VISIBLE);

                                            // keep state called to p
                                            editor.putBoolean(App.CALL_TO_P,true);
                                            editor.commit();

                                            Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + "029786080"));
                                            if (ActivityCompat.checkSelfPermission(TaskDetailActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                                                // TODO: Consider calling
                                                //    ActivityCompat#requestPermissions
                                                // here to request the missing permissions, and then overriding
                                                //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                                                //                                          int[] grantResults)
                                                // to handle the case where the user grants the permission. See the documentation
                                                // for ActivityCompat#requestPermissions for more details.

                                                if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                                                    TaskDetailActivity.this.requestPermissions(new String [] { Manifest.permission.CALL_PHONE },1000);
                                                }

                                                return;
                                            }
                                            startActivity(intent);

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

            }
        });

        btnCheckIn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new AlertDialog.Builder(TaskDetailActivity.this)
                        .setTitle("ยืนยัน")
                        .setMessage("ยืนยันการถึงสถานที่เกิดเหตุ?")
                        .setPositiveButton("ใช่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {
                                        dialog.dismiss();
                                        btnCheckIn.setVisibility(View.VISIBLE);
                                        // @todo check in command

                                        Intent intent = new Intent(TaskDetailActivity.this, ProgressMenuActivity.class);
                                        startActivity(intent);
                                        finish();

                                        // keep state check to point
                                        editor.putBoolean(App.CHECK_POINT,true);
                                        editor.putBoolean(App.CALL_TO_P,true);
                                        editor.commit();

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


    }

}
