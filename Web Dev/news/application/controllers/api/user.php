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
require APPPATH.'/libraries/REST_Controller.php';


class User extends REST_Controller
{
	function signin_post()
    {
        if(!$this -> post('userNo', TRUE))
        {
        	//$this->message = 'userno is null';
        	$data = array('Message' => 'User is null' );
        	$this->response($data, 400);
			return;
        }

		
    	$user = array();
		$user['userNo'] = $this -> post('userNo', TRUE);
		$user['password'] = $this -> post('password', TRUE);
    	
		$response = $this ->User_model->get_user($user);
        if($response)
        {
        	//$this->response->set_header('Content-Type','application/json');
            $this->response($response, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'User could not be found'), 404);
        }
    }
    
    function signup_post()
    {
    	$userNo=$this-> post('userNo', TRUE);
		$password = $this->post('password', TRUE);
         if(!$userNo||!$password)
        {
        	$data = array('Message' => 'User or password is null' );
        	$this->response($data, 400);
			return;
        }
		$oldUser = $this->User_model->get_userno($userNo);
		if ($oldUser) {
			//have user
			$data = array('Message' => 'บุคคลนี้มีในระบบแล้ว' );
			$this->response($data, 400);
		} else {
			$data = array('userNo' => $userNo, 'password'=>$password, 'fname'=>$this->post('fname'), 'lname'=>$this->post('lname'),'email' => $this->post('email'), 'bdate' => $this->post('bdate'), 'telno'=>$this->post('telno')/*, 'userType'=>$userType*/);

			$str = $this->User_model->insert_user($data);
			if ($str>0) {
				$user = array();
				$user['userNo'] = $userNo;
				$user['password'] = $password;
				$response = $this ->User_model->get_user($user);
 				$data = array('Message' => 'เพิ่มสมาชิกเรียบร้อยค่ะ', 'user'=>$response );
				$this->response($data, 200); // 200 being the HTTP response code
			}else{
				$this->response('', 403); // 200 being the HTTP response code
			}
		}        
    }
    
    function user_delete()
    {
    	//$this->some_model->deletesomething( $this->get('id') );
        $message = array('id' => $this->get('id'), 'message' => 'DELETED!');
        
        $this->response($message, 200); // 200 being the HTTP response code
    }

}