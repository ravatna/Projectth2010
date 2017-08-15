<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Utility extends REST_Controller {
	function autoComplete_post()
	{
		$userNo = $this -> post('userNo');
		$fname = $this -> post('fname');
        $result = $this->Utility_model->get_user($userNo,$fname);  
         
        
        if($result)
		{
			$response = array('userQ'=>$result);				  
			$this -> response($response, 200);			
			
		}
		else {			
			$response = array('userQ'=>$result);	
			$this -> response($response, 400);			
		}
        
		
	}
}
?>
