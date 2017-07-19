package com.projectth.mobile.kt1s;

import android.content.Context;
import android.content.DialogInterface;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class ReportOverAllActivity extends AppCompatActivity {

    private ClaimDB claimDB;
    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;

    EditText edtCompanyName,edtCompanyPhone;
    EditText edtClaimIdSelf;
    EditText edtClaimIdCompany;
    EditText edtInformDatetime;
    EditText edtDriverPhone;
    EditText edtDriverName;

    EditText edtInsuranceId;
    EditText edtInsuranceType;
    EditText edtInsuranceStartDate;
    EditText edtInsuranceEndDate;

    EditText edtInsurancePhone;

    EditText edtGarage;
    EditText edtCarBrand;
    EditText edtCarNo;

    EditText edtDDOwner;
    EditText edtDDPartie;
    EditText edtPS;
    EditText edtVehicleIdentificationNumber;
    EditText edtInsuranceOwnerName;
    EditText edtAccidentDes;
    EditText edtAccidentInform;



Inform inform;
    private EditText edtInsuranceFix1,edtInsuranceFix2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_report_over_all);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        claimDB = new ClaimDB(this,"claim_db",null,1);

        sharedPreferences = getApplicationContext().getSharedPreferences(App.MY_PREFS, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();

        inform = claimDB.inform_by_kt_id(sharedPreferences.getString(App.CURRENT_INFORM_ID,""));

        edtClaimIdCompany = (EditText)findViewById(R.id.edt_claim_id_company);
        edtClaimIdSelf = (EditText)findViewById(R.id.edt_claim_id_self);
        edtCompanyName = (EditText)findViewById(R.id.edt_company_name);
        edtInformDatetime = (EditText)findViewById(R.id.edt_inform_datetime);
edtCompanyPhone = (EditText)findViewById(R.id.edt_insurance_phone);
        edtDriverPhone = (EditText)findViewById(R.id.edt_driver_phone);
        edtDriverName = (EditText)findViewById(R.id.edt_driver_name);
        edtInsuranceId = (EditText)findViewById(R.id.edt_insurance_id);
        edtInsuranceType = (EditText)findViewById(R.id.edt_insurance_type);
        edtInsuranceStartDate = (EditText)findViewById(R.id.edt_insurance_start_date);
        edtInsuranceEndDate = (EditText)findViewById(R.id.edt_insurance_end_date);
        edtInsuranceOwnerName = (EditText)findViewById(R.id.edt_insurance_owner_name);
        //edtInsuranceOwnerPhone = (EditText)findViewById(R.id.edt_insurance_owner_phone);
        edtGarage = (EditText)findViewById(R.id.edt_garage);
        edtCarBrand = (EditText)findViewById(R.id.edt_car_brand);
        edtCarNo = (EditText)findViewById(R.id.edt_car_no);
        edtDDOwner = (EditText)findViewById(R.id.edt_dd_owner);
        edtDDPartie = (EditText)findViewById(R.id.edt_dd_partie);
        edtPS = (EditText)findViewById(R.id.edt_ps);
        edtInsurancePhone = (EditText)findViewById(R.id.edt_insurance_phone);
        edtVehicleIdentificationNumber = (EditText)findViewById(R.id.edt_vehicle_identification_number);
        edtAccidentDes = (EditText)findViewById(R.id.edt_accident_des);
        edtAccidentInform = (EditText)findViewById(R.id.edt_accident_inform);
        edtInsuranceFix1= (EditText)findViewById(R.id.edt_insurance_fix_name_1);
        edtInsuranceFix2= (EditText)findViewById(R.id.edt_insurance_fix_name_2);


        edtClaimIdCompany.setText(inform.claim_id_comapany ); // รหัสรับแจ้ง
        edtClaimIdSelf.setText(inform.claim_id_self);
        edtCompanyName.setText(inform.company_name);
        edtInformDatetime.setText(inform.inform_datetime);
        edtDriverPhone.setText(inform.driver_phone);
        //edtInsurancePhone.setText(inform.insurance_phone);
        edtInsuranceId.setText(inform.insurance_id);
        edtInsuranceType.setText(inform.insurance_type);
        edtInsuranceStartDate.setText(inform.insurance_start_datetime);
        edtInsuranceEndDate.setText(inform.insurance_end_datetime);
        edtInsuranceOwnerName.setText(inform.insurance_owner);
        edtDriverName.setText(inform.driver_name);

        edtGarage.setText(inform.Garage);
        edtCarBrand.setText(inform.car_brand);
        edtCarNo.setText(inform.car_no + " ," + inform.car_no_province);
        edtDDOwner.setText(inform.dd_owner_des);
        edtDDPartie.setText(inform.dd_parties_des);
        edtPS.setText(inform.ps);
        edtAccidentInform.setText(inform.accident_inform);
        edtAccidentDes.setText(inform.accdent_des);
        edtVehicleIdentificationNumber.setText(inform.vehicle_identification_number);
        edtInsuranceFix1.setText(inform.insurance_fix_name_1);
        edtInsuranceFix2.setText(inform.insurance_fix_name_2);

        edtCompanyPhone.setText(inform.company_phone);
    }

}
