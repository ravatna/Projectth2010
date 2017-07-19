package com.projectth.mobile.kt1s;

import org.json.JSONObject;

/**
 * Created by tyche on 7/12/17.
 */

public class SharedInfo {
    SharedInfo object;

    JSONObject jsonLogin;
    JSONObject jsonClaim;

    String hostServer = "http://www.kteclaimsurvay.com:5792/login/login_api";

    SharedInfo getInstance(){

        if(object == null){

            object = new SharedInfo();
        }

        return object;

    } // end get instance


}
// end class
// end of file
