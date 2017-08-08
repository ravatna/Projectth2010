package com.projectth.mobile.rabbitauto;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

public class ZoomPictureActivity extends AppCompatActivity {

    Button btnBack;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_zoom);

ImageView img = (ImageView)findViewById(R.id.imgCar);



        Glide.with(ZoomPictureActivity.this)
                .load(getIntent().getExtras().getString("pic"))
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(img);


        btnBack = (Button)findViewById(R.id.btnBack);
       btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

}
