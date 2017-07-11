package com.projectth.mobile.kt1s;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class ProgressMenuActivity extends AppCompatActivity {

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

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_progress_menu);

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


                Intent intent = new Intent (ProgressMenuActivity.this,ReportCActivity.class);
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
    }

}
