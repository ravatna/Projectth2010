package com.projectth.mobile.rabbitauto;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

public class ProductDetailActivity extends AppCompatActivity {
Button btnBack;
    private Button btnMobile;
    private ImageButton btnFb;
    private Button btnDownload;

    final static int REQUEST_PERMISSION_CALL_HONE = 1000;
    private TextView txtDescription,txtMoreInfo;
    private ImageView imgPic1,imgPic2,imgPic3,imgPic4,imgPic5;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_product_detail);


        btnBack = (Button)findViewById(R.id.btnBack);
        btnMobile = (Button)findViewById(R.id.btnMobile);
        btnFb = (ImageButton) findViewById(R.id.btnFb);
        btnDownload = (Button)findViewById(R.id.btnDownload);
        txtDescription = (TextView)findViewById(R.id.txt_desciption);
        txtMoreInfo = (TextView)findViewById(R.id.txtMoreInfo);

        imgPic1 = (ImageView)findViewById(R.id.imgPic1);


        imgPic2 = (ImageView)findViewById(R.id.imgPic2);

        imgPic3 = (ImageView)findViewById(R.id.imgPic3);

        imgPic4 = (ImageView)findViewById(R.id.imgPic4);

        imgPic5 = (ImageView)findViewById(R.id.imgPic5);


        imgPic1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(ProductDetailActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().m_pic1);
                startActivity(intent);
            }
        });


        imgPic2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(ProductDetailActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().m_pic2);
                startActivity(intent);
            }
        });


        imgPic3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(ProductDetailActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().m_pic3);
                startActivity(intent);
            }
        });


        imgPic4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(ProductDetailActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().m_pic4);
                startActivity(intent);
            }
        });


        imgPic5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //ZoomPictureActivity

                Intent intent = new Intent(ProductDetailActivity.this, ZoomPictureActivity.class);
                intent.putExtra("pic",SharedObject.getInstance().m_pic5);
                startActivity(intent);
            }
        });

        btnFb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent;

                startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("http://www.facebook.com/rabbitautocraft")));

            }
        });


        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        btnMobile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:0894252222"));
                if (ActivityCompat.checkSelfPermission(ProductDetailActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.

                    String [] x = new String[] {Manifest.permission.CALL_PHONE };
                    ActivityCompat.requestPermissions(ProductDetailActivity.this,x,REQUEST_PERMISSION_CALL_HONE);
                    return;
                }else {

                    startActivity(intent);
                }
            }
        });


        txtMoreInfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                try{
                    startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(SharedObject.getInstance().m_more_online)));
                }catch(Exception e){

                }


            }
        });

        btnDownload.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

try{

    startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(SharedObject.getInstance().m_brochure)));
}catch(Exception e){

}

            }
        });

initView();

    }

    private void initView() {
        txtDescription.setText(SharedObject.getInstance().m_desc);

        Glide.with(ProductDetailActivity.this)
                .load(SharedObject.getInstance().m_pic1)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic1);

        Glide.with(ProductDetailActivity.this)
                .load(SharedObject.getInstance().m_pic2)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic2);

        Glide.with(ProductDetailActivity.this)
                .load(SharedObject.getInstance().m_pic3)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic3);

        Glide.with(ProductDetailActivity.this)
                .load(SharedObject.getInstance().m_pic4)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic4);

        Glide.with(ProductDetailActivity.this)
                .load(SharedObject.getInstance().m_pic5)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic5);


    }


    @Override
    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults){

        switch (requestCode) {
            case REQUEST_PERMISSION_CALL_HONE:
                // Check Permissions Granted or not
                if (grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                    Toast.makeText(ProductDetailActivity.this, "Permission is granted", Toast.LENGTH_SHORT).show();
                } else {
                    // Permission Denied
                    Toast.makeText(ProductDetailActivity.this, "Permission is denied", Toast.LENGTH_SHORT).show();
                }
                break;
            default:
                super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        }

    }

}
