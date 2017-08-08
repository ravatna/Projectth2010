package com.projectth.mobile.rabbitauto;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.CursorLoader;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.provider.DocumentsContract;
import android.provider.MediaStore;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.squareup.okhttp.MediaType;
import com.squareup.okhttp.MultipartBuilder;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.RequestBody;
import com.squareup.okhttp.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;

public class ManageCarActivity extends AppCompatActivity {

    Button btnBack;
Button btnSave;
    Button btnCancel;
    Bitmap bmpPic1,bmpPic2,bmpPic3;
    ImageView imgPic1,imgPic2,imgPic3,imgPic1Del,imgPic2Del,imgPic3Del;
    EditText edtCarModel,edtBodyNo,edtInsureDate,edtLicenseDate,edtLicenseNo;
    File file1,file2,file3;
    String realPath1,realPath2,realPath3;


    Spinner spnCarBrand;
    ArrayList<String> adp1 = new ArrayList<String>();
    private int PICK_IMAGE_REQUEST = 1,PICK_IMAGE_KITKAT_REQUEST = 2;
    private int pick_position = 0;// 0,1,2

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_manage_car);

        btnCancel = (Button)findViewById(R.id.btnCancel);
        btnSave  = (Button)findViewById(R.id.btnSave);

        spnCarBrand = (Spinner)findViewById(R.id.spnCarBrand);

        // Adapter ตัวแรก
        ArrayAdapter<String> adapterThai = new ArrayAdapter<String>(this, android.R.layout.simple_dropdown_item_1line, adp1);
        spnCarBrand.setAdapter(adapterThai);

        edtCarModel = (EditText)findViewById(R.id.edtCarModel);
        edtBodyNo = (EditText)findViewById(R.id.edtBodyNo);
        edtLicenseNo = (EditText)findViewById(R.id.edtLicenseNo);
        edtLicenseDate = (EditText)findViewById(R.id.edtLicenseDate);
        edtInsureDate = (EditText)findViewById(R.id.edtInsuareDate);

         imgPic1 = (ImageView) findViewById(R.id.imgPic1);
         imgPic2 = (ImageView) findViewById(R.id.imgPic2);
         imgPic3 = (ImageView) findViewById(R.id.imgPic3);
        imgPic1Del = (ImageView) findViewById(R.id.imgPic1Del);
        imgPic2Del = (ImageView) findViewById(R.id.imgPic2Del);
        imgPic3Del = (ImageView) findViewById(R.id.imgPic3Del);




        imgPic1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pick_position = 0;



                if (Build.VERSION.SDK_INT <19){
                    Intent intent = new Intent();
                    intent.setType("image/jpeg");
                    intent.setAction(Intent.ACTION_GET_CONTENT);
                    startActivityForResult(Intent.createChooser(intent, "Select Picture"),PICK_IMAGE_REQUEST);
                } else {
                    Intent intent = new Intent(Intent.ACTION_OPEN_DOCUMENT);
                    intent.addCategory(Intent.CATEGORY_OPENABLE);
                    intent.setType("image/jpeg");
                    startActivityForResult(intent, PICK_IMAGE_KITKAT_REQUEST);
                }



            }
        });
        imgPic2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pick_position = 1;
                if (Build.VERSION.SDK_INT <19){
                    Intent intent = new Intent();
                    intent.setType("image/jpeg");
                    intent.setAction(Intent.ACTION_GET_CONTENT);
                    startActivityForResult(Intent.createChooser(intent, "Select Picture"),PICK_IMAGE_REQUEST);
                } else {
                    Intent intent = new Intent(Intent.ACTION_OPEN_DOCUMENT);
                    intent.addCategory(Intent.CATEGORY_OPENABLE);
                    intent.setType("image/jpeg");
                    startActivityForResult(intent, PICK_IMAGE_KITKAT_REQUEST);
                }
            }
        });
        imgPic3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pick_position = 2;
                if (Build.VERSION.SDK_INT <19){
                    Intent intent = new Intent();
                    intent.setType("image/jpeg");
                    intent.setAction(Intent.ACTION_GET_CONTENT);
                    startActivityForResult(Intent.createChooser(intent, "Select Picture"),PICK_IMAGE_REQUEST);
                } else {
                    Intent intent = new Intent(Intent.ACTION_OPEN_DOCUMENT);
                    intent.addCategory(Intent.CATEGORY_OPENABLE);
                    intent.setType("image/jpeg");
                    startActivityForResult(intent, PICK_IMAGE_KITKAT_REQUEST);
                }
            }
        });

        imgPic1Del.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pick_position = 0;
                AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

                alert.setMessage("Are you want to remove picture?");
                alert.setTitle("Confirm");
                alert.setPositiveButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });

                alert.setNegativeButton("Yes", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        DeletePictureTask dp = new DeletePictureTask();
                        dp.car_id = Integer.toString(SharedObject.getInstance().manageCar.m_id);
                        dp.position = "1";
                        dp.execute();

                        dialog.dismiss();
                    }
                });

                alert.show();



            }
        });


        imgPic2Del.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pick_position = 1;
                AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

                alert.setMessage("Are you want to remove picture?");
                alert.setTitle("Confirm");
                alert.setPositiveButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });

                alert.setNegativeButton("Yes", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        DeletePictureTask dp = new DeletePictureTask();
                        dp.car_id = Integer.toString(SharedObject.getInstance().manageCar.m_id);
                        dp.position = "2";
                        dp.execute();

                        dialog.dismiss();
                    }
                });

                alert.show();

            }
        });


        imgPic2Del.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pick_position = 2;
                AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

                alert.setMessage("Are you want to remove picture?");
                alert.setTitle("Confirm");
                alert.setPositiveButton("No", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });

                alert.setNegativeButton("Yes", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        DeletePictureTask dp = new DeletePictureTask();
                        dp.car_id = Integer.toString(SharedObject.getInstance().manageCar.m_id);
                        dp.position = "3";
                        dp.execute();

                        dialog.dismiss();
                    }
                });

                alert.show();

            }
        });



        btnBack = (Button)findViewById(R.id.btnBack);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        btnSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

            }
        });

        btnCancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
btnSave.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View v) {
        AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

        alert.setMessage("Are you want to save ?");
        alert.setTitle("Confirm");
        alert.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                AddCarTask a = new AddCarTask();
                a.car_brand  = spnCarBrand.getSelectedItem().toString();
                a.car_model = edtCarModel.getText().toString();
                a.body_no = edtBodyNo.getText().toString();
                a.license_no = edtLicenseNo.getText().toString();
                a.license_date = edtLicenseDate.getText().toString();
                a.insurance_date = edtInsureDate.getText().toString();
a.execute();
                dialog.dismiss();
            }
        });

        alert.setNegativeButton("No", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {

                dialog.dismiss();
            }
        });

        alert.show();

    }
});
        new GetListCarBrand().execute();



if( SharedObject.getInstance().manageCar != null) {
    initView();
}
    }

    private void initView() {



        edtCarModel.setText(SharedObject.getInstance().manageCar.m_car_model);
        edtBodyNo.setText(SharedObject.getInstance().manageCar.m_body_no);
        edtLicenseNo.setText(SharedObject.getInstance().manageCar.m_license_no);
        edtLicenseDate.setText(SharedObject.getInstance().manageCar.m_license_plate_date);
        edtInsureDate.setText(SharedObject.getInstance().manageCar.m_insureance_date);

        Glide.with(ManageCarActivity.this)
                .load(SharedObject.getInstance().manageCar.m_pic1)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic1);

        Glide.with(ManageCarActivity.this)
                .load(SharedObject.getInstance().manageCar.m_pic2)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic2);

        Glide.with(ManageCarActivity.this)
                .load(SharedObject.getInstance().manageCar.m_pic3)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgPic3);
    }


    class GetListCarBrand extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(ManageCarActivity.this);
        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/list_car_brand").build();

            try {
                Response response = okHttpClient.newCall(request).execute();
                if (response.isSuccessful()) {


                    return response.body().string();
                } else {
                    return "Not Success - code : " + response.code();
                }
            } catch (IOException e) {
                e.printStackTrace();
                return "Error - " + e.getMessage();
            }
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            p.show();
        }

        @Override
        protected void onPostExecute(String string) {
            super.onPostExecute(string);
            if(p.isShowing()){
                p.dismiss();
            }
            if(string==null){ return ; }
            JSONArray a;

            try {
                JSONObject result = new JSONObject(string).getJSONObject("result");

                a = result.getJSONArray("items");
                //adp1 = new String[a.length()];
                for(int i = 0; a.length() > i; i++){
                    JSONObject car = a.getJSONObject(i);
                    adp1.add(car.getString("name"));
               }

                // Adapter ตัวแรก
                ArrayAdapter<String> adapterThai = new ArrayAdapter<>(ManageCarActivity.this,
                        android.R.layout.simple_dropdown_item_1line, adp1);
                spnCarBrand.setAdapter(adapterThai);



                if( SharedObject.getInstance().manageCar != null) {
                    for(int i = 0; i < adp1.size(); i++){
                        if(adp1.get(i).toString().equals(SharedObject.getInstance().manageCar.m_car_brand)){
                            spnCarBrand.setSelection(i);
                            break; // end for here.
                        }
                    }
                }


            } catch (JSONException e) {
                e.printStackTrace();
            }

        }
    };



    @SuppressLint("NewApi")
    public static String getRealPathFromURI_API19(Context context, Uri uri){
        String filePath = "";
        String wholeID = DocumentsContract.getDocumentId(uri);


        // Split at colon, use second item in the array
        String id = wholeID.split(":")[1];

        String[] column = { MediaStore.Images.Media.DATA };

        // where id is equal to
        String sel = MediaStore.Images.Media._ID + "=?";

        Cursor cursor = context.getContentResolver().query(MediaStore.Images.Media.EXTERNAL_CONTENT_URI,
                column, sel, new String[]{ id }, null);

        int columnIndex = cursor.getColumnIndex(column[0]);

        if (cursor.moveToFirst()) {
            filePath = cursor.getString(columnIndex);
        }
        cursor.close();
        return filePath;
    }


    @SuppressLint("NewApi")
    public static String getRealPathFromURI_API11to18(Context context, Uri contentUri) {
        String[] proj = { MediaStore.Images.Media.DATA };
        String result = null;

        CursorLoader cursorLoader = new CursorLoader(
                context,
                contentUri, proj, null, null, null);
        Cursor cursor = cursorLoader.loadInBackground();

        if(cursor != null){
            int column_index =
                    cursor.getColumnIndexOrThrow(MediaStore.Images.Media.DATA);
            cursor.moveToFirst();
            result = cursor.getString(column_index);
        }
        return result;
    }

    /////////////////////////////////////////////////////
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == PICK_IMAGE_REQUEST || requestCode == PICK_IMAGE_KITKAT_REQUEST ) {

            if(resultCode == RESULT_OK && data != null && data.getData() != null){
                Uri uri = data.getData();

                try {

                    if(pick_position == 0){
                        bmpPic1 = MediaStore.Images.Media.getBitmap(getContentResolver(), uri);
                        imgPic1.setImageBitmap(bmpPic1);

                        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.KITKAT){
                            realPath1 = getRealPathFromURI_API19(ManageCarActivity.this,uri);
                        }else{
                            realPath1 = getRealPathFromURI_API11to18(ManageCarActivity.this,uri);
                        }

                        file1= new File(realPath1);
                    }

                    if(pick_position == 1){
                        bmpPic2 = MediaStore.Images.Media.getBitmap(getContentResolver(), uri);
                        imgPic2.setImageBitmap(bmpPic2);
                        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.KITKAT){
                            realPath2 = getRealPathFromURI_API19(ManageCarActivity.this,uri);
                        }else{
                            realPath2 = getRealPathFromURI_API11to18(ManageCarActivity.this,uri);
                        }
                        file2= new File(realPath2);
                    }

                    if(pick_position == 2){
                        bmpPic3 = MediaStore.Images.Media.getBitmap(getContentResolver(), uri);
                        imgPic3.setImageBitmap(bmpPic3);
                        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.KITKAT){
                            realPath3 = getRealPathFromURI_API19(ManageCarActivity.this,uri);
                        }else{
                            realPath3 = getRealPathFromURI_API11to18(ManageCarActivity.this,uri);
                        }
                        file3= new File(realPath3);
                    }

                } catch (IOException e) {
                    e.printStackTrace();
                }
            }else{
                if(pick_position == 0){
                    bmpPic1 = null;
                }

                if(pick_position == 1){
                    bmpPic2 = null;
                }

                if(pick_position == 2){
                    bmpPic3 = null;
                }
            } //
        }
    }


    /**
     * login
     */

    class DeletePictureTask extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(ManageCarActivity.this);

        String car_id = "";
        String position = "";
        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/remove_picture_mycar/?car_id=" + car_id+ "&position="+ position).build();

            try {
                Response response = okHttpClient.newCall(request).execute();
                if (response.isSuccessful()) {


                    return response.body().string();
                } else {
                    return "Not Success - code : " + response.code();
                }
            } catch (IOException e) {
                e.printStackTrace();
                return "Error - " + e.getMessage();
            }
        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            p.show();
        }

        @Override
        protected void onPostExecute(String string) {
            super.onPostExecute(string);
            if(p.isShowing()){
                p.dismiss();
            }

            if(string==null){ return ; }
            try {
                JSONObject result = new JSONObject(string);
                if(result.getString("message").equals("success")){
                    AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

                    alert.setMessage("Remove picture was success.");
                    alert.setTitle("Info");
                    alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            if(pick_position == 0){
                             imgPic1.setImageResource(R.mipmap.placeholder);
                            }

                            if(pick_position == 1){
                                imgPic2.setImageResource(R.mipmap.placeholder);
                            }

                            if(pick_position == 2){
                                imgPic3.setImageResource(R.mipmap.placeholder);
                            }

                            dialog.dismiss();
                        }
                    });

                    alert.show();
                }else{
                    AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

                    alert.setMessage("Can not remove picture.");
                    alert.setTitle("Alert");
                    alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            dialog.dismiss();
                        }
                    });

                    alert.show();
                }

            } catch (JSONException e) {
                e.printStackTrace();

                AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);

                alert.setMessage("Can not remove picture.");
                alert.setTitle("Alert");
                alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });

                alert.show();
            }

        }
    };


    /**
     * AddCarTask
     */
    class AddCarTask extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(ManageCarActivity.this);

        String car_brand = "";
        String car_model = "";
        String body_no = "";
        String license_no = "";
        String license_date = "";
        String insurance_date = "";

        @Override
        protected String doInBackground(Void... voids) {

            HashMap<String,String> d = new HashMap<>();
            d.put("car_brand",car_brand);
            d.put("car_model",car_model);
            d.put("body_no",body_no);
            d.put("license_no",license_no);
            d.put("license_date",license_date);
            d.put("insurance_date",insurance_date);

            return postUpdateCar("http://dev.exclusivedatethai.com/admin/index.php/webservice/update_mycar",d);

        }

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            p.show();
        }

        @Override
        protected void onPostExecute(String string) {
            super.onPostExecute(string);
            if(p.isShowing()){
                p.dismiss();
            }
            if(string==null){ return ; }

            try {
                JSONObject result = new JSONObject(string);

                if(result.getString("result").equals("success")){
                    AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);
                    alert.setMessage("Save car was success.");
                    alert.setTitle("Info");
                    alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            dialog.dismiss();
                            finish();
                        }
                    });

                    alert.show();
                }else{
                    AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);
                    alert.setMessage("Can not save this car!!!");
                    alert.setTitle("Alert");
                    alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            dialog.dismiss();
                        }
                    });
                    alert.show();
                }


            } catch (JSONException e) {
                e.printStackTrace();

                AlertDialog.Builder alert = new AlertDialog.Builder(ManageCarActivity.this);
                alert.setMessage("Can not save this car!!!");
                alert.setTitle("Alert");
                alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });


                alert.show();
            }

        }
    };


    public  String postUpdateCar(String url, HashMap<String, String> data) {

            final MediaType MEDIA_TYPE_PNG = MediaType.parse("image/png");

            RequestBody requestBody;
            MultipartBuilder mBuilder = new MultipartBuilder().type(MultipartBuilder.FORM);

            for (String key : data.keySet()) {
                String value = data.get(key);
               // Utility.printLog("Key Values", key + "-----------------" + value);

                mBuilder.addFormDataPart(key, value);

            }

            ///////////////////////////////////////////////////////////////////////////





            ////////////////////////////////////////////////////////////////////////////

            if(file1!=null) {
                Log.e("File Name", file1.getName() + "===========");
                if (file1.exists()) {
                    mBuilder.addFormDataPart("pic1", file1.getName(), RequestBody.create(MEDIA_TYPE_PNG, file1));
                }
            }
//
//            if(file2!=null) {
//                Log.e("File Name", file.getName() + "===========");
//                if (file2.exists()) {
//                    mBuilder.addFormDataPart("pic2", file2.getName(), RequestBody.create(MEDIA_TYPE_PNG, file2));
//                }
//            }
//
//            if(file3!=null) {
//                Log.e("File Name", file.getName() + "===========");
//                if (file3.exists()) {
//                    mBuilder.addFormDataPart("pic3", file3.getName(), RequestBody.create(MEDIA_TYPE_PNG, file3));
//                }
//            }

        requestBody = mBuilder.build();
        Request request = new Request.Builder()
                    .url(url)
                    .post(requestBody)
                    .build();

        OkHttpClient client = new OkHttpClient();
        Response response = null;
        try {
            response = client.newCall(request).execute();
            return response.body().string();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }
}
