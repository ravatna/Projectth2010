package com.projectth.mobile.rabbitauto;

import org.json.JSONObject;

/**
 * Created by User on 30/3/2560.
 */

public class SharedObject {
static SharedObject object;
    JSONObject carProduct;
    JSONObject myCarProduct;
MyCarItem myCar;
    MyCarItem manageCar;
    int m_id = 0;
    String m_name = "";
    String m_price = "";
    String m_desc = "";
    String m_brochure = "";
    String m_more_online = "";
    String m_pic1 = "";
    String m_pic2 = "";
    String m_pic3 = "";
    String m_pic4 = "";
    String m_pic5 = "";


    static public SharedObject getInstance(){

        if(object == null){
            object = new SharedObject();
        }
        return object;
    }


}
