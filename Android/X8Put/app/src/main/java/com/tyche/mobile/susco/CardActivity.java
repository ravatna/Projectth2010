package com.tyche.mobile.susco;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.google.zxing.qrcode.QRCodeWriter;

import org.json.JSONException;

public class CardActivity extends AppCompatActivity {


    private Button btnBack;
    private TextView txvMyName;
    private TextView txvMyNumber;
    private TextView txvMyDateExpire;
    private ImageView imgQr;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_card);

        btnBack = (Button)findViewById(R.id.btnBack);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        imgQr = (ImageView)findViewById(R.id.imgQr);
        txvMyName = (TextView) findViewById(R.id.txvName);
        txvMyNumber = (TextView) findViewById(R.id.txvCode);
        txvMyDateExpire = (TextView)findViewById(R.id.txvDate);


        try {
            txvMyName.setText(App.getInstance().customerMember.getString("fname") + " " + App.getInstance().customerMember.getString("lname"));
            txvMyDateExpire.setText(App.getInstance().customerMember.getString("createdate"));
            txvMyNumber.setText(App.getInstance().customerMember.getString("member_code"));
        } catch (JSONException e) {
            e.printStackTrace();
        }

        QRCodeWriter writer = new QRCodeWriter();
        try {
            BitMatrix bitMatrix = null;
            try {
                bitMatrix = writer.encode(App.getInstance().customerMember.getString("member_code"), BarcodeFormat.QR_CODE, 512, 512);
            } catch (JSONException e) {
                e.printStackTrace();
            }
            int width = bitMatrix.getWidth();
            int height = bitMatrix.getHeight();
            Bitmap bmp = Bitmap.createBitmap(width, height, Bitmap.Config.RGB_565);
            for (int x = 0; x < width; x++) {
                for (int y = 0; y < height; y++) {
                    bmp.setPixel(x, y, bitMatrix.get(x, y) ? Color.BLACK : Color.WHITE);
                }
            }
            ((ImageView) findViewById(R.id.imgQr)).setImageBitmap(bmp);

        } catch (WriterException e) {
            e.printStackTrace();
        }

        overrideFonts(this,findViewById(R.id.main_content) );

    }

    private void overrideFonts(final Context context, final View v) {
        try {
            if (v instanceof ViewGroup) {
                ViewGroup vg = (ViewGroup) v;
                for (int i = 0; i < vg.getChildCount(); i++) {
                    View child = vg.getChildAt(i);
                    overrideFonts(context, child);
                }
            } else if (v instanceof TextView ) {
                ((TextView) v).setTypeface(Typeface.createFromAsset(context.getAssets(), "fonts/Kanit-Regular.ttf"));
            }
        } catch (Exception e) {
            Log.e("UpdateFontface",e.getMessage());
        }
    } // end method

}
