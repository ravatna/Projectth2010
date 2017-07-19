package com.projectth.mobile.kt1s;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;

public class ReportPActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report_p);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        Button btnTakePhoto = (Button)findViewById(R.id.btnTakePicture);
        Button btnSaveK = (Button)findViewById(R.id.btn_save_k);


        btnSaveK.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new AlertDialog.Builder(ReportPActivity.this)
                        .setTitle("บันทึกข้อมูล")
                        .setMessage("ต้องการบันทึกข้อมูล ป. ใช่หรือไม่? " )
                        .setPositiveButton("ปิด",
                                new DialogInterface.OnClickListener() {

                                    @Override
                                    public void onClick(DialogInterface dialog,
                                                        int which) {

                                    }
                                })
                        .show();
            }
        });

        btnTakePhoto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent (ReportPActivity.this,TakePhotoCaseActivity.class);
                startActivity(intent);
            }
        });


    }

}
