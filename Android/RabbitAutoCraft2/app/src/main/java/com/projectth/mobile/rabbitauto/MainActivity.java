package com.projectth.mobile.rabbitauto;

import android.Manifest;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.Window;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class MainActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    SharedPreferences pref;
    SharedPreferences.Editor prefEdit;


    final static int REQUEST_PERMISSION_CALL_HONE = 1000;
    private GridView grdProduct;
    CarItem[] m_carItem,m_carUseItem;

    ImageButton imbMenu;
    ImageView imgFb, imgAddr;
    DrawerLayout drawer;
    CarItemAdapter adapter1,adapter2;
    JSONObject productNew,productUse;

    TextView txtLoginHeare;
    TextView txtTitleName;
    LinearLayout lnrNeedHelp;
    private GridView grdProductUse;

    void initPreference(){
        pref = getSharedPreferences("RABBIT_AUTO_CRAFT", MODE_PRIVATE);
//set the sharedpref
       prefEdit = pref.edit();
    }



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        View header=navigationView.getHeaderView(0);
/*View view=navigationView.inflateHeaderView(R.layout.nav_header_main);*/


        initPreference();
        grdProduct = (GridView) findViewById(R.id.grdProduct);
        grdProductUse = (GridView) findViewById(R.id.grdProductUse);
        imgAddr = (ImageView) findViewById(R.id.img_pic_addr);
        imgFb = (ImageView) findViewById(R.id.img_fb);



        imgFb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent;

                startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("http://www.facebook.com/rabbitautocraft")));

            }
        });
        imgAddr.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:0894252222"));
                if (ActivityCompat.checkSelfPermission(MainActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                    // TODO: Consider calling
                    //    ActivityCompat#requestPermissions
                    // here to request the missing permissions, and then overriding
                    //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                    //                                          int[] grantResults)
                    // to handle the case where the user grants the permission. See the documentation
                    // for ActivityCompat#requestPermissions for more details.

                    String [] x = new String[] {Manifest.permission.CALL_PHONE };
                    ActivityCompat.requestPermissions(MainActivity.this,x,REQUEST_PERMISSION_CALL_HONE);
                    return;
                }else {

                    startActivity(intent);
                }
            }
        });
        imbMenu = (ImageButton)findViewById(R.id.imbMenu);
        imbMenu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                drawer.openDrawer(GravityCompat.START);
            }
        });

        m_carItem = new CarItem[0];
        m_carUseItem= new CarItem[0];
         adapter1 = new CarItemAdapter(this,R.layout.grid_caritem,m_carItem);
        adapter2 = new CarItemAdapter(this,R.layout.grid_caritem,m_carUseItem);

        grdProduct.setAdapter(adapter1);
        grdProductUse.setAdapter(adapter2);
        grdProduct.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v,
                                    int position, long id) {

                SharedObject.getInstance().m_id =  m_carItem[position].m_id;
                SharedObject.getInstance().m_name =  m_carItem[position].m_title;
                SharedObject.getInstance().m_desc =  m_carItem[position].m_desc;
                SharedObject.getInstance().m_price =  m_carItem[position].m_price;
                SharedObject.getInstance().m_more_online =  m_carItem[position].m_more_online;
                SharedObject.getInstance().m_brochure =  m_carItem[position].m_brochoure;
                SharedObject.getInstance().m_pic1 =  m_carItem[position].m_pic1;
                SharedObject.getInstance().m_pic2 =  m_carItem[position].m_pic2;
                SharedObject.getInstance().m_pic3 =  m_carItem[position].m_pic3;
                SharedObject.getInstance().m_pic4 =  m_carItem[position].m_pic4;
                SharedObject.getInstance().m_pic5 =  m_carItem[position].m_pic5;


                Intent intent = new Intent(MainActivity.this,ProductDetailActivity.class);
                startActivity(intent);

            }
        });

        grdProductUse.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v,
                                    int position, long id) {

                SharedObject.getInstance().m_id =  m_carUseItem[position].m_id;
                SharedObject.getInstance().m_name =  m_carUseItem[position].m_title;
                SharedObject.getInstance().m_desc =  m_carUseItem[position].m_desc;
                SharedObject.getInstance().m_price =  m_carUseItem[position].m_price;
                SharedObject.getInstance().m_more_online =  m_carUseItem[position].m_more_online;
                SharedObject.getInstance().m_brochure =  m_carUseItem[position].m_brochoure;
                SharedObject.getInstance().m_pic1 =  m_carUseItem[position].m_pic1;
                SharedObject.getInstance().m_pic2 =  m_carUseItem[position].m_pic2;
                SharedObject.getInstance().m_pic3 =  m_carUseItem[position].m_pic3;
                SharedObject.getInstance().m_pic4 =  m_carUseItem[position].m_pic4;
                SharedObject.getInstance().m_pic5 =  m_carUseItem[position].m_pic5;


                Intent intent = new Intent(MainActivity.this,ProductDetailActivity.class);
                startActivity(intent);

            }
        });

        txtLoginHeare = (TextView)header.findViewById(R.id.txt_logout);
        txtTitleName = (TextView)header.findViewById(R.id.txt_title_name);

        lnrNeedHelp = (LinearLayout)findViewById(R.id.lnr_need_help);
        lnrNeedHelp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // create custome login form
                final Dialog dialog = new Dialog(MainActivity.this);
                dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
                dialog.setContentView(R.layout.dialog_help);
                dialog.setCancelable(true);

                Button btnTel = (Button)dialog.findViewById(R.id.btnTel);
                Button btnMobile = (Button)dialog.findViewById(R.id.btnMobile);
                btnTel.setOnClickListener(new View.OnClickListener() {
                    public void onClick(View v) {

                        Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:1800911911"));
                        if (ActivityCompat.checkSelfPermission(MainActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                            // TODO: Consider calling
                            //    ActivityCompat#requestPermissions
                            // here to request the missing permissions, and then overriding
                            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                            //                                          int[] grantResults)
                            // to handle the case where the user grants the permission. See the documentation
                            // for ActivityCompat#requestPermissions for more details.

                            String [] x = new String[] {Manifest.permission.CALL_PHONE };
                            ActivityCompat.requestPermissions(MainActivity.this,x,REQUEST_PERMISSION_CALL_HONE);
                            return;
                        }else {

                            startActivity(intent);
                        }

                        dialog.dismiss();
                    }
                });

                btnMobile.setOnClickListener(new View.OnClickListener() {
                    public void onClick(View v) {

                        Intent intent = new Intent(Intent.ACTION_CALL, Uri.parse("tel:1401911911"));
                        if (ActivityCompat.checkSelfPermission(MainActivity.this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
                            // TODO: Consider calling
                            //    ActivityCompat#requestPermissions
                            // here to request the missing permissions, and then overriding
                            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                            //                                          int[] grantResults)
                            // to handle the case where the user grants the permission. See the documentation
                            // for ActivityCompat#requestPermissions for more details.

                            String [] x = new String[] {Manifest.permission.CALL_PHONE };
                            ActivityCompat.requestPermissions(MainActivity.this,x,REQUEST_PERMISSION_CALL_HONE);
                            return;
                        }else {

                            startActivity(intent);
                        }
                        dialog.dismiss();
                    }
                });


                dialog.show();
            }
        });




        updateUser();

        txtLoginHeare.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {



                if(txtLoginHeare.getText().toString().equals("Logout")){

                    confirmLogout();
                }else {

                    // create custome login form
                    final Dialog dialog = new Dialog(MainActivity.this);
                    dialog.requestWindowFeature(Window.FEATURE_NO_TITLE);
                    dialog.setContentView(R.layout.dialog_login);
                    dialog.setCancelable(true);

                    final EditText email = (EditText) dialog.findViewById(R.id.edtEmail),
                    pword = (EditText) dialog.findViewById(R.id.edtPword);
                    //email.setText("demo");
                    //pword.setText("1234");

                    Button btnLoign = (Button) dialog.findViewById(R.id.btnLogin);
                    Button btnRegister = (Button) dialog.findViewById(R.id.btnRegister);

                    btnLoign.setOnClickListener(new View.OnClickListener() {
                        public void onClick(View v) {
                            Login l ;
                            l = new Login();
                            l.email = email.getText().toString();
                            l.pword = pword.getText().toString();
                            l.execute();

                            dialog.cancel();
                        }
                    });

                    btnRegister.setOnClickListener(new View.OnClickListener() {
                        public void onClick(View v) {


                            final Dialog d = new Dialog(MainActivity.this);
                            d.requestWindowFeature(Window.FEATURE_NO_TITLE);
                            d.setContentView(R.layout.dialog_register);
                            d.setCancelable(true);

                            final EditText email = (EditText) d.findViewById(R.id.edtEmail),
                                    pword = (EditText) d.findViewById(R.id.edtPword),
                            address = (EditText) d.findViewById(R.id.edtAddress),
                            mobile = (EditText) d.findViewById(R.id.edtMobile),
                            name = (EditText) d.findViewById(R.id.edtName),
                            repword = (EditText) d.findViewById(R.id.edtRePword);

/*
                            email.setText("demo2");
                            pword.setText("1234");
                            repword.setText("1234");

                            name.setText("demo2 man");
                            address.setText("123-200");
                            mobile.setText("00012344");
*/

                            Button btnSubmit = (Button) d.findViewById(R.id.btnSubmit);
                            Button btnCancel = (Button) d.findViewById(R.id.btnCancel);

                            btnSubmit.setOnClickListener(new View.OnClickListener() {
                                public void onClick(View v) {

                                    if(name.getText().toString().equals("")){
                                        Toast.makeText(MainActivity.this,"Please entry Name.",Toast.LENGTH_LONG).show();

                                        return ;
                                    }

                                    if(android.util.Patterns.EMAIL_ADDRESS.matcher(email.getText().toString()).matches()){
                                        Toast.makeText(MainActivity.this,"Please Enter Valid Email Address.",Toast.LENGTH_LONG).show();

                                        return ;
                                    }

                                    if(mobile.getText().toString().equals("")){
                                        Toast.makeText(MainActivity.this,"Please entry Mobile/Telephone.",Toast.LENGTH_LONG).show();

                                        return ;


                                    }

                                    if(pword.getText().toString().length() < 6 && pword.getText().toString().length() > 12){
                                        Toast.makeText(MainActivity.this,"Please entry Password 6 to 12 character.",Toast.LENGTH_LONG).show();

                                        return ;
                                    }


                                    if(pword.getText().toString().equals("")){
                                        Toast.makeText(MainActivity.this,"Please entry Password.",Toast.LENGTH_LONG).show();

                                        return ;
                                    }

                                    if(repword.getText().toString().equals("")){
                                        Toast.makeText(MainActivity.this,"Please entry Confirm Password.",Toast.LENGTH_LONG).show();

                                        return ;
                                    }

                                    if(!repword.getText().toString().equals(pword.getText().toString())){
                                        Toast.makeText(MainActivity.this,"Password and Confirm password not valid.",Toast.LENGTH_LONG).show();

                                        return ;
                                    }

                                    RegisterTask l ;
                                    l = new RegisterTask();
                                    l.name = name.getText().toString();
                                    l.email = email.getText().toString();
                                    l.pword = pword.getText().toString();
                                    l.address = address.getText().toString();
                                    l.mobile = mobile.getText().toString();
                                    l.execute();

                                    d.dismiss();
                                }
                            });

                            btnCancel.setOnClickListener(new View.OnClickListener() {
                                public void onClick(View v) {
                                    d.dismiss();
                                }
                            });


                            d.show();

                            dialog.dismiss();
                        }
                    });


                    dialog.show();
                }
            }
        });


        // call data from network
        new GetListProduct().execute();



    }

    @Override
    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults){

        switch (requestCode) {
            case REQUEST_PERMISSION_CALL_HONE:
                // Check Permissions Granted or not
                if (grantResults[0] == PackageManager.PERMISSION_GRANTED) {

                    Toast.makeText(MainActivity.this, "Permission is granted", Toast.LENGTH_SHORT).show();
                } else {
                    // Permission Denied
                    Toast.makeText(MainActivity.this, "Permission is denied", Toast.LENGTH_SHORT).show();
                }
                break;
            default:
                super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        }

    }

    @Override
    public void onBackPressed() {
       // DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_mycar) {
            // Handle the camera action
            Intent intent = new Intent(MainActivity.this, MyCarActivity.class);
            startActivity(intent);
        } else if (id == R.id.nav_booking_service) {
            Intent intent = new Intent(MainActivity.this, BookingServiceActivity.class);
            startActivity(intent);
        } else if (id == R.id.nav_contact_us) {
            Intent intent = new Intent(MainActivity.this, ContactUsActivity.class);
            startActivity(intent);

        } else if (id == R.id.nav_rate_app) {
            Intent intent = new Intent(Intent.ACTION_VIEW,Uri.parse("market://details?id=com.projectth.mobile.rabbitauto"));
            startActivity(intent);
        }

        //DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }


    /*
    Sub class GetListProduct
     */


    class GetListProduct extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(MainActivity.this);
        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/list_product").build();

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

                // get new product section
                productNew = result.getJSONObject("new");
                a =  productNew.getJSONArray("items");
                m_carItem = new CarItem[a.length()];
                for(int i = 0; a.length() > i; i++){
                    JSONObject car = a.getJSONObject(i);
                    m_carItem[i] = new CarItem();
                    m_carItem[i].m_title = car.getString("ProductsName");
                    m_carItem[i].m_price = "x,xxx,xxx";
                    m_carItem[i].m_desc = car.getString("Description");
                    m_carItem[i].m_id = car.getInt("ProductsID");

                    m_carItem[i].m_more_online = car.getString("more_online");
                    m_carItem[i].m_brochoure = "http://dev.exclusivedatethai.com/admin/uploads_brochure/" + car.getString("brochoure");
                    m_carItem[i].m_pic1 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic1");
                    m_carItem[i].m_pic2 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic2");
                    m_carItem[i].m_pic3 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic3");
                    m_carItem[i].m_pic4 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic4");
                    m_carItem[i].m_pic5 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic5");
                }

                adapter1 = new CarItemAdapter(MainActivity.this,R.layout.grid_caritem,m_carItem);
                grdProduct.setAdapter(adapter1);

            } catch (JSONException e) {
                e.printStackTrace();
            }


            // get use product section

            try {
                JSONObject result = new JSONObject(string).getJSONObject("result");

                // get new product section
                productUse = result.getJSONObject("used_car");
                a =  productUse.getJSONArray("items");
                m_carUseItem = new CarItem[a.length()];
                for(int i = 0; a.length() > i; i++){
                    JSONObject car = a.getJSONObject(i);
                    m_carUseItem[i] = new CarItem();
                    m_carUseItem[i].m_title = car.getString("ProductsName");
                    m_carUseItem[i].m_price = "x,xxx,xxx";
                    m_carUseItem[i].m_desc = car.getString("Description");
                    m_carUseItem[i].m_id = car.getInt("ProductsID");

                    m_carUseItem[i].m_more_online = car.getString("more_online");
                    m_carUseItem[i].m_brochoure = "http://dev.exclusivedatethai.com/admin/uploads_brochure/" + car.getString("brochoure");
                    m_carUseItem[i].m_pic1 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic1");
                    m_carUseItem[i].m_pic2 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic2");
                    m_carUseItem[i].m_pic3 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic3");
                    m_carUseItem[i].m_pic4 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic4");
                    m_carUseItem[i].m_pic5 = "http://dev.exclusivedatethai.com/admin/uploads_product/" + car.getString("pic5");
                }

                adapter2 = new CarItemAdapter(MainActivity.this,R.layout.grid_caritem,m_carUseItem);
                grdProductUse.setAdapter(adapter2);

            } catch (JSONException e) {
                e.printStackTrace();
            }

        }
    };

    /**
     * login
     */

    class Login extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(MainActivity.this);

        String email = "";
        String pword = "";
        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/logincheck/?email=" + email  + "&password=" + pword).build();

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
                    prefEdit.putString("id",result.getString("id"));
                prefEdit.putString("name",result.getString("name"));
                prefEdit.putString("phone_no",result.getString("phone_no"));
                prefEdit.putString("created_date",result.getString("created_date"));
                prefEdit.putString("updated_date",result.getString("updated_date"));
                prefEdit.putString("address",result.getString("address"));

                prefEdit.commit();

                //
                AlertDialog.Builder alert = new AlertDialog.Builder(MainActivity.this);

                alert.setMessage("Welcome to Rabbit Auto Craft, " + result.getString("name"));
                alert.setTitle("Info");
                alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });


                alert.show();


updateUser();
            } catch (JSONException e) {
                e.printStackTrace();
            }

        }
    };


    /**
     * RegisterTask
     */

    class RegisterTask extends AsyncTask<Void, Void, String> {
        ProgressDialog p = new ProgressDialog(MainActivity.this);

        String email = "";
        String name = "";
        String pword = "";
        String address = "";
        String mobile = "";


        @Override
        protected String doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();

            Request.Builder builder = new Request.Builder();
            Request request = builder.url("http://dev.exclusivedatethai.com/admin/index.php/webservice/add_customer/?name="+ name  +"&email=" + email  + "&password=" + pword+ "&moible=" + mobile+ "&address=" + address).build();

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
                prefEdit.putString("id",result.getString("id"));
                prefEdit.putString("name",result.getString("name"));
                prefEdit.putString("phone_no",result.getString("phone_no"));
                prefEdit.putString("created_date",result.getString("created_date"));
                prefEdit.putString("updated_date",result.getString("updated_date"));
                prefEdit.putString("address",result.getString("address"));

                prefEdit.commit();

                //
                AlertDialog.Builder alert = new AlertDialog.Builder(MainActivity.this);

                alert.setMessage("Welcome to Rabbit Auto Craft, " + result.getString("name"));
                alert.setTitle("Info");
                alert.setPositiveButton("Close", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });


                alert.show();


                updateUser();
            } catch (JSONException e) {
                e.printStackTrace();

                AlertDialog.Builder alert = new AlertDialog.Builder(MainActivity.this);

                alert.setMessage("Your email was registered.");
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

private void clearUser(){

    prefEdit.putString("id","");
    prefEdit.putString("name","");
    prefEdit.putString("phone_no","");
    prefEdit.putString("created_date","");
    prefEdit.putString("updated_date","");
    prefEdit.putString("address","");

    prefEdit.commit();
}

private void confirmLogout(){
    AlertDialog.Builder alert = new AlertDialog.Builder(MainActivity.this);

    alert.setMessage("Are you want to Logout?");
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
            // @todo make logout.

            clearUser();

            updateUser();
        }
    });

    alert.show();
}


private void updateUser(){
    if(pref.getString("name","Guest").equals("")){
        txtTitleName.setText("Welcome, Guest.");
        txtLoginHeare.setText("Login here");
    }else {

        txtTitleName.setText("Welcome " + pref.getString("name", "Guest") + ".");
        txtLoginHeare.setText("Logout");
    }
}
}
