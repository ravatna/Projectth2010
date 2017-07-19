package com.projectth.mobile.kt1s;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import java.util.ArrayList;

/**
 * Created by tyche on 7/12/17.
 */

public class ClaimDB  extends SQLiteOpenHelper{

    // Database Version
    private static final int DATABASE_VERSION = 1;

    // Database Name
    private static final String DATABASE_NAME = "claim_db";

    // Table Name
    private static final String TABLE_INFORM = "inform";

    public ClaimDB(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }


    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("CREATE TABLE " + TABLE_INFORM +
                "(id varchar(30)," + //0
                " inform_date int," +
                " inform_datetime varchar(20)," +
                " clam_id_company varchar(100)," +
                " clam_id_self varchar(100)," +
                " insurance_company_id int," +
                " company_name varchar(100)," +
                " clam_officer varchar(100)," +
                " Garage varchar(20)," +
                " insurance_start_date int," +
                " insurance_end_date int," + //10
                " insurance_id int," +
                " insurance_type varchar(100)," +
                " accident_place varchar(30)," +
                " accident_inform text," +
                " car_brand varchar(100)," +
                " car_no varchar(30)," +
                " car_no_province varchar(100)," +
                " vehicle_identification_number varchar(100)," +
                " poung_no varchar(100)," +
                " poung_identification_number varchar(100)," +
                " poung_insurance_id varchar(100)," +
                " poung_insurance_start_date varchar(100)," +
                " poung_insurance_end_date varchar(100)," +
                " poung_insurance_type varchar(100)," +
                " driver_name varchar(100)," +
                " driver_phone varchar(100)," +
                " insurance_owner varchar(100)," +
                " insurance_owner_phone varchar(100)," +
                " accdent_des varchar(100)," +
                " dd varchar(100)," +
                " dd_owner varchar(100)," +
                " dd_owner_des text," +
                " dd_parties varchar(100)," +
                " dd_parties_des text," +
                " ps text," +
                " status text," +
                " clam_id text," +
                " insurance_fix_name_1 varchar(100)," +
                " insurance_fix_name_2 varchar(100),"+
                " insurance_start_datetime varchar(20),"+
                " insurance_end_datetime varchar(20),"+
                " company_phone varchar(20) );");



        Log.d("CREATE TABLE","Create Table Successfully.");

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // TODO Auto-generated method stub
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_INFORM);

        // Re Create on method  onCreate
        onCreate(db);
    }

    // Insert Data
    public long insertData(Inform inform) {

        try {
            SQLiteDatabase db;
            db = this.getWritableDatabase(); // Write Data

            ContentValues Val = new ContentValues();
            Val.put("id", inform.id); //0
            Val.put("inform_date", inform.inform_date);
            Val.put("inform_datetime", inform.inform_datetime);
            Val.put("clam_id_company", inform.claim_id_comapany);
            Val.put("clam_id_self", inform.claim_id_self);
            Val.put("insurance_company_id", inform.insurance_company_id);
            Val.put("company_name", inform.company_name);
            Val.put("clam_officer", inform.clam_officer);
            Val.put("Garage", inform.Garage);
            Val.put("insurance_start_date", inform.insurance_start_date);
            Val.put("insurance_end_date", inform.insurance_end_date); //10
            Val.put("insurance_id", inform.insurance_id);
            Val.put("insurance_type", inform.insurance_type);
            Val.put("accident_place", inform.accident_place);
            Val.put("accident_inform", inform.accident_inform);
            Val.put("car_brand", inform.car_brand);
            Val.put("car_no", inform.car_no);
            Val.put("car_no_province", inform.car_no_province);
            Val.put("vehicle_identification_number", inform.vehicle_identification_number);
            Val.put("poung_no", inform.poung_no);
            Val.put("poung_identification_number", inform.poung_identification_number);
            Val.put("poung_insurance_id", inform.poung_insurance_id);
            Val.put("poung_insurance_start_date", inform.poung_insurance_start_date);
            Val.put("poung_insurance_end_date", inform.poung_insurance_end_date);
            Val.put("poung_insurance_type", inform.poung_insurance_type);
            Val.put("driver_name", inform.driver_name);
            Val.put("driver_phone", inform.driver_phone);
            Val.put("insurance_owner", inform.insurance_owner);
            Val.put("insurance_owner_phone", inform.insurance_owner_phone);
            Val.put("accdent_des", inform.accdent_des);
            Val.put("dd", inform.dd);
            Val.put("dd_owner", inform.dd_owner);
            Val.put("dd_owner_des", inform.dd_owner_des);
            Val.put("dd_parties", inform.dd_parties);
            Val.put("dd_parties_des", inform.dd_parties_des);
            Val.put("ps", inform.ps);
            Val.put("status", inform.status);
            Val.put("clam_id", inform.clam_id);
            Val.put("insurance_fix_name_1", inform.insurance_fix_name_1);
            Val.put("insurance_fix_name_2", inform.insurance_fix_name_2);

            Val.put("insurance_start_datetime", inform.insurance_start_datetime);
            Val.put("insurance_end_datetime", inform.insurance_end_datetime);
            Val.put("company_phone", inform.company_phone);




            long rows = db.insert(TABLE_INFORM, null, Val);

            db.close();
            return rows; // return rows inserted.

        } catch (Exception e) {
            return -1;
        }

    } // End of InsertData




    /**
     * read datas inform
     * @return
     */
    public Inform inform_by_kt_id(String claim_id_company ) {
        Inform item = null;
        SQLiteDatabase db;
        db = this.getReadableDatabase(); // Read Data
        Cursor cursor = db.query(TABLE_INFORM, new String[]{"*"}, "clam_id_company=?", new String[]{claim_id_company},null,null,null);
        if(cursor.getCount() > 0)
        {
            cursor.moveToFirst();

            item = new Inform();
            // loop column
            item.id = cursor.getString(0);
            item.inform_date = cursor.getString(1);
            item.inform_datetime = cursor.getString(2);
            item.claim_id_comapany = cursor.getString(3);
            item.claim_id_self = cursor.getString(4);
            item.insurance_company_id = cursor.getString(5);
            item.company_name = cursor.getString(6);
            item.clam_officer = cursor.getString(7);
            item.Garage = cursor.getString(8);
            item.insurance_start_date = cursor.getString(9);
            item.insurance_end_date = cursor.getString(10);
            item.insurance_id = cursor.getString(11);
            item.insurance_type = cursor.getString(12);
            item.accident_place = cursor.getString(13);
            item.accident_inform = cursor.getString(14);
            item.car_brand = cursor.getString(15);
            item.car_no = cursor.getString(16);
            item.car_no_province = cursor.getString(17);
            item.vehicle_identification_number = cursor.getString(18);
            item.poung_no = cursor.getString(19);
            item.poung_identification_number = cursor.getString(20);
            item.poung_insurance_id = cursor.getString(21);
            item.poung_insurance_start_date = cursor.getString(22);
            item.poung_insurance_end_date = cursor.getString(23);
            item.poung_insurance_type = cursor.getString(24);
            item.driver_name = cursor.getString(25);
            item.driver_phone = cursor.getString(26);
            item.insurance_owner = cursor.getString(27);
            item.insurance_owner_phone = cursor.getString(28);
            item.accdent_des = cursor.getString(29);
            item.dd = cursor.getString(30);
            item.dd_owner = cursor.getString(31);
            item.dd_owner_des = cursor.getString(32);
            item.dd_parties = cursor.getString(33);
            item.dd_parties_des = cursor.getString(34);
            item.ps = cursor.getString(35);
            item.status = cursor.getString(36);
            item.clam_id = cursor.getString(37);
            item.insurance_fix_name_1 = cursor.getString(38);
            item.insurance_fix_name_2 = cursor.getString(39);
            item.insurance_start_datetime = cursor.getString(40);
            item.insurance_end_datetime = cursor.getString(41);

            item.company_phone = cursor.getString(42);
        }

        if (cursor != null && !cursor.isClosed()) {
            cursor.close();
        }
        db.close();


        return item;

    } // End of SelectData



    /**
     * read datas inform
     * @return
     */
    public ArrayList<Inform> inform_by_id(String inform_id ) {

        ArrayList<Inform> items = new ArrayList<>();

            SQLiteDatabase db;
            db = this.getReadableDatabase(); // Read Data
            Cursor cursor = db.query(TABLE_INFORM, new String[] {"*"},"id=?",new String[] {inform_id},null,null,null);

            if(cursor != null)
            {

                if(cursor.getCount() < 1){
                    cursor.close();
                    db.close();
                    return items;
                }

                cursor.moveToFirst();

                    // loop row
                    do{

                        Inform item = new Inform();

                        // loop column

                        item.id = cursor.getString(0);
                        item.inform_date = cursor.getString(1);
                        item.inform_datetime = cursor.getString(2);
                        item.claim_id_comapany = cursor.getString(3);
                        item.claim_id_self = cursor.getString(4);
                        item.insurance_company_id = cursor.getString(5);
                        item.company_name = cursor.getString(6);
                        item.clam_officer = cursor.getString(7);
                        item.Garage = cursor.getString(8);
                        item.insurance_start_date = cursor.getString(9);
                        item.insurance_end_date = cursor.getString(10);
                        item.insurance_id = cursor.getString(11);
                        item.insurance_type = cursor.getString(12);
                        item.accident_place = cursor.getString(13);
                        item.accident_inform = cursor.getString(14);
                        item.car_brand = cursor.getString(15);
                        item.car_no = cursor.getString(16);
                        item.car_no_province = cursor.getString(17);
                        item.vehicle_identification_number = cursor.getString(18);
                        item.poung_no = cursor.getString(19);

                        item.poung_identification_number = cursor.getString(20);
                        item.poung_insurance_id = cursor.getString(21);
                        item.poung_insurance_start_date = cursor.getString(22);
                        item.poung_insurance_end_date = cursor.getString(23);

                        item.poung_insurance_type = cursor.getString(24);
                        item.driver_name = cursor.getString(25);
                        item.driver_phone = cursor.getString(26);
                        item.insurance_owner = cursor.getString(27);
                        item.insurance_owner_phone = cursor.getString(28);
                        item.accdent_des = cursor.getString(29);

                        item.dd = cursor.getString(30);
                        item.dd_owner = cursor.getString(31);
                        item.dd_owner_des = cursor.getString(32);
                        item.dd_parties = cursor.getString(33);
                        item.dd_parties_des = cursor.getString(34);
                        item.ps = cursor.getString(35);
                        item.status = cursor.getString(36);
                        item.clam_id = cursor.getString(37);
                        item.insurance_fix_name_1 = cursor.getString(38);
                        item.insurance_fix_name_2 = cursor.getString(39);
                        item.insurance_start_datetime = cursor.getString(40);
                        item.insurance_end_datetime = cursor.getString(41);

                        item.company_phone = cursor.getString(42);

                        if(item.claim_id_comapany == inform_id){

                            items.add(item);

                        }


                    } while(cursor.moveToNext()) ;// ENd of for

                //} // End of if


            } // End of if
        if (cursor != null && !cursor.isClosed()) {
            cursor.close();
        }

        db.close();
        return items;

    } // End of SelectData


    /**
     * read datas inform
     * @return
     */
    public ArrayList<Inform> informs( ) {
        ArrayList<Inform> items = new ArrayList<Inform>();
        
        try {

            SQLiteDatabase db;
            db = this.getReadableDatabase(); // Read Data



            Cursor cursor =db.rawQuery("select * from " + TABLE_INFORM + " order by inform_date desc" ,null);

            if(cursor != null)
            {
                if (cursor.moveToFirst()) {

                    // loop row
                    // loop row
                    do{

                        Inform item = new Inform();

                        // loop column
                        item.id = cursor.getString(0);
                        item.inform_date = cursor.getString(1);
                        item.inform_datetime = cursor.getString(2);
                        item.claim_id_comapany = cursor.getString(3);
                        item.claim_id_self = cursor.getString(4);
                        item.insurance_company_id = cursor.getString(5);
                        item.company_name = cursor.getString(6);
                        item.clam_officer = cursor.getString(7);
                        item.Garage = cursor.getString(8);
                        item.insurance_start_date = cursor.getString(9);
                        item.insurance_end_date = cursor.getString(10);
                        item.insurance_id = cursor.getString(11);
                        item.insurance_type = cursor.getString(12);
                        item.accident_place = cursor.getString(13);
                        item.accident_inform = cursor.getString(14);
                        item.car_brand = cursor.getString(15);
                        item.car_no = cursor.getString(16);
                        item.car_no_province = cursor.getString(17);
                        item.vehicle_identification_number = cursor.getString(18);
                        item.poung_no = cursor.getString(19);

                        item.poung_identification_number = cursor.getString(20);
                        item.poung_insurance_id = cursor.getString(21);
                        item.poung_insurance_start_date = cursor.getString(22);
                        item.poung_insurance_end_date = cursor.getString(23);

                        item.poung_insurance_type = cursor.getString(24);
                        item.driver_name = cursor.getString(25);
                        item.driver_phone = cursor.getString(26);
                        item.insurance_owner = cursor.getString(27);
                        item.insurance_owner_phone = cursor.getString(28);
                        item.accdent_des = cursor.getString(29);

                        item.dd = cursor.getString(30);
                        item.dd_owner = cursor.getString(31);
                        item.dd_owner_des = cursor.getString(32);
                        item.dd_parties = cursor.getString(33);
                        item.dd_parties_des = cursor.getString(34);
                        item.ps = cursor.getString(35);
                        item.status = cursor.getString(36);
                        item.clam_id = cursor.getString(37);
                        item.insurance_fix_name_1 = cursor.getString(38);
                        item.insurance_fix_name_2 = cursor.getString(39);
                        item.insurance_start_datetime = cursor.getString(40);
                        item.insurance_end_datetime = cursor.getString(41);

                        item.company_phone = cursor.getString(42);

                        items.add(item);


                    }while(cursor.moveToNext()) ; // ENd of while



                } // End of if
            } // End of if

            if (cursor != null && !cursor.isClosed()) {
                cursor.close();
            }
            db.close();
            return items;

        } catch (Exception e) {
            return null;
        }

    } // End of SelectData


} // End of Class

// End of file.