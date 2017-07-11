package com.projectth.mobile.kt1s;

/**
 * Created by rewat on 26/5/2560.
 */

public class CaseItem {
    String mCarBrand;
    String mLicensePlate;
    int id ;
    /**
     * รหัสกำกับเอกสาร
     */
    String mKTCode ="";

    /**
     * รหัสเคลม
     */
    String mClaimCode;

    /**
     * บริษัทประกัน
     */
    String mInsuranceCompany;

    /**
     * ชื่อผู้แจ้งเหตุ
     */
    String mPName="";
    /**
     * หมายเลขโทรรถประกัน
     */
    String mPPhone="";
    /**
     * สถานที่เกิดเหตุ
     */
    String mAccidentPlace="";
    /**
     * เวลารับแจ้งเหตุ
     */
    String mTimeAcceptCase="";

    /**
     * โทรหาลูกค้าแล้ว
     */
    byte mCalled2P = 0;

    /**
     * กดปุ่มถึงที่เกิดเหตุแล้ว
     */
    byte mArrivedToPlace = 0;

    /**
     * รายการนี้ ถูกยกเลิกโดยผู้ใช้งานหรือไม่
     */
    byte mIsCancelJob = 0;
    /**
 * สถานะของาน
 */
String mStatusJob="";

    public CaseItem(int id, String mKTCode,String mClaimCode, String mPName, String mCarBrand,String mLicensePlate, String mAccidentPlace,String mTimeAcceptCase,String mStatusJob) {
        this.id = id;
this.mKTCode = mKTCode;
        this.mCarBrand = mCarBrand;
        this.mLicensePlate = mLicensePlate;
        this.mClaimCode = mClaimCode;
        this.mPName = mPName;
        this.mAccidentPlace = mAccidentPlace;
        this.mTimeAcceptCase = mTimeAcceptCase;
        this.mStatusJob = mStatusJob;
    }
}
