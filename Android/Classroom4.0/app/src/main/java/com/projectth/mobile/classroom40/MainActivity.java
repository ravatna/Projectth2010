package com.projectth.mobile.classroom40;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.Dialog;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        final SharedPreferences sharedPreferences;
        final SharedPreferences.Editor editor;


        sharedPreferences = getSharedPreferences("mediacenter40",MODE_PRIVATE);
editor = sharedPreferences.edit();

final WebView webView = (WebView)findViewById(R.id.webview);
        webView.setWebChromeClient(new WebChromeClient());
        webView.getSettings().setPluginState(WebSettings.PluginState.ON);
        webView.getSettings().setJavaScriptEnabled(true);
        webView.getSettings().setJavaScriptCanOpenWindowsAutomatically(true);


        Button  btnSetting = (Button)findViewById(R.id.btnSetting);
        Button btnGoBack = (Button)findViewById(R.id.btnBack);
        Button btnHome = (Button)findViewById(R.id.btnHome);
btnGoBack.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View view) {
        webView.goBack();
    }
});

        btnHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                webView.loadUrl("http://" + sharedPreferences.getString("server_ip","") + "/mediacenter/");
            }
        });


        btnSetting.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final Dialog dialog = new Dialog(MainActivity.this);
                        dialog.setContentView(R.layout.dialog_setting);

                final EditText edtServer = (EditText)dialog.findViewById(R.id.edtServer);
                edtServer.setText(sharedPreferences.getString("server_ip",""));
                Button btnSave = (Button) dialog.findViewById(R.id.btnSave);
                btnSave.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {

                        editor.putString("server_ip",edtServer.getText().toString());
                        editor.commit();
                        dialog.dismiss();

                    }
                });

                dialog.show();


            }
        });

    }
}
