package com.projectth.mobile.kt1s;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;

public class ReportCaseActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report_case);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        Button btnReportOverAll = (Button)findViewById(R.id.btnReportCaseOverAll);
        btnReportOverAll.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(ReportCaseActivity.this,ReportOverAllActivity.class);
                startActivity(intent);
            }
        });


        Button btnReportP = (Button)findViewById(R.id.btnReportP);
        btnReportP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(ReportCaseActivity.this,ReportPActivity.class);
                startActivity(intent);
            }
        });

        Button btnReportC = (Button)findViewById(R.id.btnReportC);
        btnReportC.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(ReportCaseActivity.this,ReportCActivity.class);
                startActivity(intent);
            }
        });
    }

}
