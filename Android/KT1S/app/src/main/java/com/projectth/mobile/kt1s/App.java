package com.projectth.mobile.kt1s;

import org.json.JSONArray;
import org.json.JSONObject;

/**
 * Created by rewat on 2/6/2560.
 */

class App {

    static private App object;

    JSONObject loginObject;
    JSONObject customerMember;
    JSONArray transactionDialies;
    JSONArray redeemTransactions;
    JSONArray giftCatalogs;
    JSONArray selectNews;
    JSONObject objNews;
    String cookieToken,formToken;

    String m_server =  "http://suscoapidev-iCRM.atlasicloud.com"; // "http://192.168.88.197/SUSCOAPI/";

    static public App getInstance(){
        if(object == null){
            object = new App();
        }

        return object;
    }
}
