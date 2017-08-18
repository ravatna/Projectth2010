package com.projectth.mobile.demopoi;

import android.Manifest;
import android.app.Activity;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.location.Location;
import android.media.Image;
import android.os.Environment;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.Polygon;
import com.google.android.gms.maps.model.PolygonOptions;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {

    private static String LOG_TAG = "MapActivity";
    Button btnMark;
    private GoogleMap mMap;
    private GPSTracker gps;

    private double lat,lng;
    private Location tmpLocation;
    private ImageView ivImage;

    ArrayList<Location> location;
    private TextView txv1,txv2,txv3;
    private Button btnArea;
    private Polygon polygon;
    private Button btnClear;

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);

        finish();

    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
                != PackageManager.PERMISSION_GRANTED
                && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)
                != PackageManager.PERMISSION_GRANTED
                && ActivityCompat.checkSelfPermission(this, Manifest.permission.WRITE_EXTERNAL_STORAGE)
                != PackageManager.PERMISSION_GRANTED

                && ActivityCompat.checkSelfPermission(this, Manifest.permission.CAMERA)
                != PackageManager.PERMISSION_GRANTED
                ) {
            // TODO: Consider calling
            requestPermissions(new String[] {Manifest.permission.ACCESS_FINE_LOCATION,Manifest.permission.ACCESS_COARSE_LOCATION,Manifest.permission.WRITE_EXTERNAL_STORAGE,Manifest.permission.CAMERA},
                    1000);

            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return ;
        }

        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        //ivImage = (ImageView)findViewById(R.id.ivImage);
        btnMark = (Button) findViewById(R.id.btnMark);
        btnArea  = (Button)findViewById(R.id.btnArea);
        btnClear  = (Button)findViewById(R.id.btnClear);
        txv1 = (TextView)findViewById(R.id.textView);
        txv2 = (TextView)findViewById(R.id.textView2);
        txv3 = (TextView)findViewById(R.id.textView3);

        location = new ArrayList<>();

        btnClear.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                mMap.clear();
                location = new ArrayList<Location>();
                polygon = null;
            }
        });

        btnMark.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                if(lat != 0 && lng != 0) {

                    Toast.makeText(MapsActivity.this,lat + "," +lng,Toast.LENGTH_SHORT).show();
                    // Add a marker in Sydney and move the camera
                    LatLng sydney = new LatLng(lat, lng);
                    location.add(tmpLocation);

                    mMap.addMarker(new MarkerOptions().position(sydney).title("Lat:" + lat + ", Lng:" + lng));
                    mMap.moveCamera(CameraUpdateFactory.newLatLng(sydney));
                    //mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(sydney,16));

                    drawPloygon(lat,lng);

                    // cameraIntent();

                    //calculateAreaOfGPSPolygonOnEarthInSquareMeters(location);

                }// .End if
            }
        });


        btnArea.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

            if(location == null){
                return;
            }

try {
    calculateAreaOfGPSPolygonOnEarthInSquareMeters(location);
}catch (Exception e){
    Log.e("xxxx",e.getMessage());
}
            }
        });
    }

    private void drawPloygon(Double lat,Double lng){

if (location.size() == 0){
    return;
}
        if(polygon != null){
            polygon.remove();

        }

        PolygonOptions po = new PolygonOptions ();

        for(int i = 0; i < location.size() ;i ++){
            Location lo = location.get(i);

            po.add(new LatLng(lo.getLatitude(),lo.getLongitude()));
        }

        Location lo = location.get(0);

        po.add(new LatLng(lo.getLatitude(),lo.getLongitude()));

        //po.add(new LatLng(lat,lng));
        po.strokeColor(Color.RED);
        po.fillColor(Color.BLUE);
        polygon = mMap.addPolygon(po);

//        Polygon polygon = mMap.addPolygon(new PolygonOptions()
//                .add(new LatLng(0, 0), new LatLng(0, 5), new LatLng(3, 5), new LatLng(0, 0))
//
//
//                );
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == Activity.RESULT_OK) {

                onCaptureImageResult(data);
        }
    }

    private void cameraIntent()
    {
        Intent intent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, 1002);
    }

    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
                != PackageManager.PERMISSION_GRANTED
                && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)
                != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
         //   requestPermissions(new String[] {Manifest.permission.ACCESS_FINE_LOCATION,Manifest.permission.ACCESS_COARSE_LOCATION},
           //         1000);

            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.

        }
        mMap.setMyLocationEnabled(true);

        mMap.setOnMyLocationChangeListener(new GoogleMap.OnMyLocationChangeListener() {
            @Override
            public void onMyLocationChange(Location location) {
                lat = location.getLatitude();
                lng = location.getLongitude();
                tmpLocation = location;
                //Toast.makeText(MapsActivity.this, location.getLatitude()+","+location.getLongitude(),Toast.LENGTH_LONG).show();
            }
        });



        if(mMap.getMyLocation()!= null) {
            //Add a marker in Sydney and move the camera
            LatLng sydney = new LatLng(mMap.getMyLocation().getLatitude(), mMap.getMyLocation().getLongitude());
            mMap.addMarker(new MarkerOptions().position(sydney).title("Marker in Sydney"));
            mMap.moveCamera(CameraUpdateFactory.newLatLng(sydney));
        }
    }


    private void onCaptureImageResult(Intent data) {
        Bitmap thumbnail = (Bitmap) data.getExtras().get("data");
        ByteArrayOutputStream bytes = new ByteArrayOutputStream();
        thumbnail.compress(Bitmap.CompressFormat.JPEG, 90, bytes);
        File destination = new File(Environment.getExternalStorageDirectory(),
                System.currentTimeMillis() + ".jpg");
        FileOutputStream fo;
        try {
            destination.createNewFile();
            fo = new FileOutputStream(destination);
            fo.write(bytes.toByteArray());
            fo.close();
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        ivImage.setImageBitmap(thumbnail);
    }

    private static final double EARTH_RADIUS = 6371000;// meters

    public  double calculateAreaOfGPSPolygonOnEarthInSquareMeters(final List<Location> locations) {
        return calculateAreaOfGPSPolygonOnSphereInSquareMeters(locations, EARTH_RADIUS);
    }

    private  double calculateAreaOfGPSPolygonOnSphereInSquareMeters(final List<Location> locations, final double radius) {
        if (locations.size() < 3) {
            return 0;
        }

        final double diameter = radius * 2;
        final double circumference = diameter * Math.PI;

        final List<Double> listY = new ArrayList<Double>();
        final List<Double> listX = new ArrayList<Double>();
        final List<Double> listArea = new ArrayList<Double>();

        // calculate segment x and y in degrees for each point
        final double latitudeRef = locations.get(0).getLatitude();
        final double longitudeRef = locations.get(0).getLongitude();

        for (int i = 1; i < locations.size(); i++) {
            final double latitude = locations.get(i).getLatitude();
            final double longitude = locations.get(i).getLongitude();
            listY.add(calculateYSegment(latitudeRef, latitude, circumference));
            Log.d(LOG_TAG, String.format("Y %s: %s", listY.size() - 1, listY.get(listY.size() - 1)));
            listX.add(calculateXSegment(longitudeRef, longitude, latitude, circumference));
            Log.d(LOG_TAG, String.format("X %s: %s", listX.size() - 1, listX.get(listX.size() - 1)));
            txv2.setText(String.format("X %s: %s", listX.size() - 1, listX.get(listX.size() - 1)));
            txv1.setText(String.format("Y %s: %s", listY.size() - 1, listY.get(listY.size() - 1)));
        }

        // calculate areas for each triangle segment
        for (int i = 1; i < listX.size(); i++) {
            final double x1 = listX.get(i - 1);
            final double y1 = listY.get(i - 1);
            final double x2 = listX.get(i);
            final double y2 = listY.get(i);

            listArea.add(calculateAreaInSquareMeters(x1, x2, y1, y2));
            Log.d(LOG_TAG, String.format("area %s: %s", listArea.size() - 1, listArea.get(listArea.size() - 1)));
            txv3.setText(String.format("Location: %s, Area = %s", listArea.size() - 1, listArea.get(listArea.size() - 1)));
        }

        // sum areas of all triangle segments
        double areasSum = 0;
        for (final Double area : listArea) {
            areasSum = areasSum + area;
        }

        // get abolute value of area, it can't be negative
        return Math.abs(areasSum);// Math.sqrt(areasSum * areasSum);
    }

    private static Double calculateAreaInSquareMeters(final double x1, final double x2, final double y1, final double y2) {
        return (y1 * x2 - x1 * y2) / 2;
    }

    private static double calculateYSegment(final double latitudeRef, final double latitude, final double circumference) {
        return (latitude - latitudeRef) * circumference / 360.0;
    }

    private static double calculateXSegment(final double longitudeRef, final double longitude, final double latitude,
                                            final double circumference) {
        return (longitude - longitudeRef) * circumference * Math.cos(Math.toRadians(latitude)) / 360.0;
    }

}
