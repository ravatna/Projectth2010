package com.projectth.mobile.kt1s;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import org.json.JSONObject;

import java.util.ArrayList;

public class TaskActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_task);



ArrayList<CaseItem> x  = new ArrayList<CaseItem>();


        x.add(new CaseItem(1,"KT000012","123321","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: แจ้งวัมฯะ","02/06/2017 14:36","งานใหม่"));

        x.add(new CaseItem(2,"KT000015","123324","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: บางเขน","02/06/2017 1ุ6:36","กำลังทำ"));

        x.add(new CaseItem(3,"KT000016","166321","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: ดอนเมือง","02/06/2017 17:36","ส่งข้อมูลแล้ว"));
        x.add(new CaseItem(4,"KT000018","123389","บ. ประกัน :วิริยะประกันภัย","มาสด้า","กท1234","ที่เกิดเหตุ: ติวานนท์","02/06/2017 18:36","ส่งข้อมูลแล้ว"));

        CaseAdapter adapter = new CaseAdapter(TaskActivity.this, x);

        ListView newsListView = (ListView)findViewById(R.id.lstTask);
        newsListView.setFocusable(false);
        newsListView.setAdapter(adapter);
        newsListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                Intent intent = new Intent(TaskActivity.this, TaskDetailActivity.class);
                startActivity(intent);
            }
        });

    }

}
