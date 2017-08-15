<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class UserQ extends REST_Controller {


	function addQ_post() {
		$status_flag = 'waiting';
		$userNo = $this -> post('userNo');
		$diseaseId = $this -> post('diseaseId');
		$requestQ = $this -> post('requestQ');
		if (!$userNo) {
			$data = array('status'=>'fail','message' => 'User is null');
			$this -> response($data, 400);
		}
		if (!$diseaseId) {
			$data = array('status'=>'fail','message' => 'Desease is null');
			$this -> response($data, 400);			
		}
		if (!$requestQ) {
			$requestQ = 2; //default
		}
        
        $result = $this->UserQ_model->get_userq($userNo);
		if(!$result)
		{
            		
			$no_q = $this->UserQ_model->get_max_q();

			$data = array(
						   'userNo' => $userNo,
						   'diseaseId' => $diseaseId ,
						   'addDate' => $this->centerfunc->get_now(),						
						   'status_flag' => $status_flag,
						   'requestQ' => $requestQ,						  
						   'no_q' => $no_q					
						);
			
		$this->UserQ_model->insert_userq($data);

		$response = array('status'=>'success','message'=>'บันทึกการจัดคิวผู้ใช้ '.$userNo.' เรียบร้อยแล้ว');
		$this->response($response,200);			
		} 
		else {
			$response = array('status'=>'fail','message'=>'ไม่สามารถบันทึกการจัดคิวผู้ใช้ '.$userNo.' ได้');
			$this -> response($response, 400);			
		}

    }

	function getQ_post() {
		$userNo = $this -> post('userNo');
		if (!$userNo) {
			$data = array('status'=>'fail','message' => 'User is null');
			$this -> response($data, 400);
		}
        $result = $this->UserQ_model->get_userq($userNo);  
         
        
        if($result)
		{
			$userQ = array('userNo'=>$result['userNo'],
                              'status_flag'=>$result['status_flag'] ,
                              'addDate'=>$result['addDate'] ,
                              'diseaseId'=>$result['diseaseId'] ,                              
                              'no_q'=>$result['no_q'] ,
                              'requestQ'=>$result['requestQ'],
                              'wait_amount'=>$result['wait_amount'],
                              'wait_time'=>$result['wait_time']                              
							  );
			$response = array('userQ'=>$userQ);				  
			$this -> response($response, 200);	
		
			
		}
		else {
			//$response = array('status'=>'fail','message'=>'ผู้ใช้ '.$userNo.' ยังไม่จัดคิว');
			$response = array('userQ'=>$result);	
			$this -> response($response, 400);			
		}
        
        	

	}
    
    function getAllQ_post() {
    	$query = $this->UserQ_model->get_userAllQ();
    	$result = $query->result_array();
		if($query->num_rows() > 0)
		  {		
		  	$response = array('userQ'=>$result);	
			$this->response($response,200);		
		  }
		else
		  {
			//$response = array('status'=>'fail','message'=>'ยังไม่มีการจัดคิว');
			$response = array('userQ'=>$result);	
			$this->response($response,400);				  	
		  	
		  }		
    	
    }
    
	function updateQ_post() {
			
		$userNo = $this -> post('userNo');	
		$requestQ = $this -> post('requestQ');
		$status_flag = $this -> post('status_flag');
		if (!$userNo) {
			$data = array('status'=>'fail','message' => 'User is null');
			$this -> response($data, 400);
		}
		if (!$requestQ) {
			$data = array('status'=>'fail','message' => 'RequestQ is null');
			$this -> response($data, 400);			
		}
		if (!$status_flag) {
			$data = array('status'=>'fail','message' => 'Status_flag is null');
			$this -> response($data, 400);	
		}
        
        $result = $this->UserQ_model->get_userq($userNo);
		if($result)
		{
            			
			$data = array(
						   'userNo' => $userNo,						   						   					
						   'status_flag' => $status_flag,
						   'requestQ' => $requestQ						 						   
						);
			
		$this->UserQ_model->update_userq($data);

		$response = array('status'=>'success','message'=>'บันทึกการจัดคิวผู้ใช้ '.$userNo.' เรียบร้อยแล้ว');
		$this->response($response,200);			
		} 
		else {
			$response = array('status'=>'fail','message'=>'ผู้ใช้ '.$userNo.' ยังไม่จัดคิว');
			$this -> response($response, 400);			
		}		
	}

	function deleteQ_post() {
		$userNo = $this -> post('userNo');	
		if (!$userNo) {
			$data = array('status'=>'fail','message' => 'User is null');
			$this->response($data, 400);
		}
		$result = $this->UserQ_model->get_userq($userNo);
		if($result)
		  {
			$this->UserQ_model->delete_userq($userNo);		
			$response = array('status'=>'success','message'=>'ลบข้อมูลการจัดคิวผู้ใช้ '.$userNo.' เรียบร้อยแล้ว');
			$this->response($response,200);		
		  }
		else
		  {
			$response = array('status'=>'fail','message'=>'ผู้ใช้ '.$userNo.' ยังไม่ถูกจัดคิว');
			$this->response($response,400);				  	
		  	
		  }		
		

	}


	function deleteAllQ_post() {
		$query = $this->UserQ_model->get_userAllQ();
		if($query->num_rows() > 0)
		  {
			$this->UserQ_model->delete_userAllq();		
			$response = array('status'=>'success','message'=>'ลบข้อมูลการจัดคิวเรียบร้อยแล้ว');
			$this->response($response,200);		
		  }
		else
		  {
			$response = array('status'=>'fail','message'=>'ยังไม่มีการจัดคิว');
			$this->response($response,400);				  	
		  	
		  }		
		

	}

}
