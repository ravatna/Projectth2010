package com.projectth.mobile.kt1s;

import android.Manifest;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class TaskDetailActivity extends AppCompatActivity {

    Button btnCheckIn;
    Button btnTelToP;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_task_detail);
        btnTelToP = (Button) findViewById(R.id.btnTelToP);
        btnCheckIn = (Button) findViewById(R.id.btnCheckIn);

        btnTelToP.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


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


                                        Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + "0639710919"));
                                        if (ActivityCompat.checkSelfPermission(TaskDetailActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                                            // TODO: Consider calling
                                            //    ActivityCompat#requestPermissions
                                            // here to request the missing permissions, and then overriding
                                            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                                            //                                          int[] grantResults)
                                            // to handle the case where the user grants the permission. See the documentation
                                            // for ActivityCompat#requestPermissions for more details.
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
