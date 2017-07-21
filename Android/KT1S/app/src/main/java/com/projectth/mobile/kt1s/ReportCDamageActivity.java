package com.projectth.mobile.kt1s;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;

import java.util.ArrayList;

public class ReportCDamageActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report_cdamage);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        //Button btnAdd = (Button)findViewById(R.id.btnAdd);



        final ArrayList<DamageItem> x  = new ArrayList<DamageItem>();


        x.add(new DamageItem(1,"KT000012","123321","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: แจ้งวัมฯะ","02/06/2017 14:36","งานใหม่"));

  //      x.add(new DamageItem(2,"KT000015","123324","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: บางเขน","02/06/2017 1ุ6:36","กำลังทำ"));


        final DamageAdapter adapter = new DamageAdapter(ReportCDamageActivity.this, x);

        //btnAdd.setOnClickListener(new View.OnClickListener() {
          //  @Override
            //public void onClick(View v) {
              //  x.add(new DamageItem(2,"KT000015","123324","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: บางเขน","02/06/2017 1ุ6:36","กำลังทำ"));
//adapter.notifyDataSetChanged();
           // }
        //});

//        ListView newsListView = (ListView)findViewById(R.id.listview);
//        newsListView.setFocusable(false);
//        newsListView.setAdapter(adapter);
//        newsListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
//            @Override
//            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
//
//                Intent intent = new Intent(ReportCDamageActivity.this, TaskDetailActivity.class);
//                startActivity(intent);
//            }
//        });

    }

}
