package com.projectth.mobile.kt1s;

import org.json.JSONArray;
import org.json.JSONObject;

/**
 * Created by rewat on 2/6/2560.
 */

class App {



ClaimOfficer claimOfficer = new ClaimOfficer();
    static private App object;

    public static final String MY_PREFS = "projectth_kt1s";
    public static final String LOGIN_JSON = "login_json";
    public static final String CURRENT_INFORM_ID = "current_inform_id";
    public static final String CALL_TO_P = "call_to_p";
    public static final String CHECK_POINT = "check_point";


    JSONObject loginObject;
    JSONObject claim_officer;

    String m_server =  "http://www.kteclaimsurvay.com:5792";

    static public App getInstance(){
        if(object == null){
            object = new App();
        }

        return object;
    }


    class ClaimOfficer {
        String id = "";
        String fullname = "";
        String pass = "";
        String user = "";

    }

}
