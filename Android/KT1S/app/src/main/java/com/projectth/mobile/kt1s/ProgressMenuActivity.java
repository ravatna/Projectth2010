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
import android.widget.TextView;

public class ProgressMenuActivity extends AppCompatActivity {
    private TextView txvCaseCode,txvInsuranceCompanyName;
    private Button btnTakePhoto,btnManageP,btnManageK;
    private Button btnReportCase;
    private Button btnReportCaseOverAll;
    private Button btnReportP;
    private Button btnReportC;
    private Button btnReportAsset;
    private Button btnReportInjurk;
    private Button btnReportPDamage;
    private Button btnReportCaseDetail;
    private Button btnReportCDamage;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    private ClaimDB claimDB;
    private Inform inform;
    private Button btnClearCurrentClaim;
    private Button btnManagerTel,btnInformTel,btnConsoult;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_progress_menu);


        sharedPreferences = getApplicationContext().getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        claimDB = new ClaimDB(this,"claim_db",null,1);
        txvCaseCode = (TextView)findViewById(R.id.txvCaseCode);
        txvInsuranceCompanyName = (TextView)findViewById(R.id.txvInsuranceCompanyName);

        btnTakePhoto = (Button)findViewById(R.id.btnTakePicture);
        btnReportCaseOverAll = (Button)findViewById(R.id.btnReportCaseOverAll);
//        btnManageK = (Button)findViewById(R.id.btnManageK);
       // btnReportCase = (Button)findViewById(R.id.btnReportCase);
        btnReportC = (Button)findViewById(R.id.btnReportC);
        btnReportP = (Button)findViewById(R.id.btnReportP);
        btnReportAsset = (Button)findViewById(R.id.btnReportAsset);
        btnReportInjurk = (Button)findViewById(R.id.btnReportInjurk);
        btnReportPDamage = (Button)findViewById(R.id.btnReportPDamage);
        btnReportCDamage = (Button)findViewById(R.id.btnReportCDamage);
        btnReportCaseDetail = (Button)findViewById(R.id.btnReportCaseDetail);

        btnManagerTel = (Button)findViewById(R.id.btnManagerTel);
        btnInformTel = (Button)findViewById(R.id.btnInformTel);
        btnConsoult = (Button)findViewById(R.id.btnConsoult);

        btnClearCurrentClaim = (Button)findViewById(R.id.btnClearCurrentClaim);
        btnClearCurrentClaim.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new AlertDialog.Builder(ProgressMenuActivity.this)
                        .setTitle("แจ้งเตือน")
                        .setMessage("ต้องการเปิดเคลมอื่นใช่หรือไม่?")
                        .setNeutralButton("ใช่",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog, int which) {
                                        dialog.dismiss();

                                        // clear current
                                        editor.putString(App.CURRENT_INFORM_ID,"");
                                        editor.putBoolean(App.CALL_TO_P,false);
                                        editor.putBoolean(App.CHECK_POINT,false);

                                        editor.commit();
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

//        btnTakePhoto.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//
//
//                Intent intent = new Intent (ProgressMenuActivity.this,TakePhotoCaseActivity.class);
//                startActivity(intent);
//            }
//        });

        btnReportCaseOverAll.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                Intent intent = new Intent (ProgressMenuActivity.this,ReportOverAllActivity.class);
                startActivity(intent);
            }
        });

//        btnReportCase.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//
//                Intent intent = new Intent (ProgressMenuActivity.this,ReportCaseActivity.class);
//                startActivity(intent);
//            }
//        });

        btnReportPDamage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent (ProgressMenuActivity.this,ReportPDamageActivity.class);
                startActivity(intent);
            }
        });


        // รถ ค. เสียหาย
        btnReportCDamage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent (ProgressMenuActivity.this,ReportCDamageActivity.class);
                startActivity(intent);
            }
        });

        btnReportCaseDetail.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent (ProgressMenuActivity.this,ReportCaseDetailActivity.class);
                startActivity(intent);
            }
        });


        btnReportP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                Intent intent = new Intent (ProgressMenuActivity.this,ReportPActivity.class);
                startActivity(intent);
            }
        });

        btnReportC.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                Intent intent = new Intent (ProgressMenuActivity.this,ReportC2Activity.class);
                startActivity(intent);
            }
        });

        btnReportAsset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                Intent intent = new Intent (ProgressMenuActivity.this,ReportAssetActivity.class);
                startActivity(intent);
            }
        });

        btnReportInjurk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                Intent intent = new Intent (ProgressMenuActivity.this,ReportInjurkActivity.class);
                startActivity(intent);
            }
        });



        btnManagerTel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + "0813581134"));
                if (ActivityCompat.checkSelfPermission(ProgressMenuActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.

                    if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                        ProgressMenuActivity.this.requestPermissions(new String [] { Manifest.permission.CALL_PHONE },1000);
                    }

                    return;
                }
                startActivity(intent);
            }
        });


        btnConsoult.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + ""));
                if (ActivityCompat.checkSelfPermission(ProgressMenuActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.

                    if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                        ProgressMenuActivity.this.requestPermissions(new String [] { Manifest.permission.CALL_PHONE },1000);
                    }

                    return;
                }
                startActivity(intent);
            }
        });

        btnInformTel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + "029786080"));
                if (ActivityCompat.checkSelfPermission(ProgressMenuActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.

                    if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                        ProgressMenuActivity.this.requestPermissions(new String [] { Manifest.permission.CALL_PHONE },1000);
                    }

                    return;
                }
                startActivity(intent);
            }
        });


        // HEADER SECTION ///////

//load inform conten from db
        inform = claimDB.inform_by_kt_id(sharedPreferences.getString(App.CURRENT_INFORM_ID,""));

        if(inform != null){
            txvCaseCode.setText(inform.claim_id_comapany + " เลขเคลม : " + inform.claim_id_self ); // รหัสรับแจ้ง
            txvInsuranceCompanyName.setText("บ.ประกัน : " + inform.company_name); // ชื่อติดต่อ ป.
        }else{

            new AlertDialog.Builder(ProgressMenuActivity.this)
                    .setTitle("แจ้งเตือน")
                    .setMessage("ไม่พบข้อมูลรับแจ้ง")
                    .setNeutralButton("ปิด",
                            new DialogInterface.OnClickListener() {

                                @Override
                                public void onClick(DialogInterface dialog,
                                                    int which) {
                                    dialog.dismiss();


                                    finish();

                                }
                            })

                    .show();
        }

    }

}
