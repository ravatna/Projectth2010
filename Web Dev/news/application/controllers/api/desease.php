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

class Desease extends REST_Controller {
	function getDesease_post() {
		if (!$this -> post('id')) {
			//$this->message = 'userno is null';
			$data = array('Message' => 'require desease id');
			$this -> response($data, 400);
			return;
		}else{
			
		}
		
	}

	function addDesease_post() {
		$name = $this -> post('deseaseName');
		$evauluteTime = $this -> post('evaluateTime');
		$comment = $this->post('comment');
		if (!$name) {
			$data = array('Message' => 'กรุณาระบุชื่อการรักษา');
			$this -> response($data, 400);
			return;
		}
		$oldDesease = $this->Desease_model->getByName($name);
		if ($oldDesease) {
			//have user
			$data = array('Message' => 'มีชื่อนี้ในระบบแล้ว');
			$this -> response($data, 400);
		} else {
			$data = array('deseaseName' => $name, 'evaluateTime' => $evauluteTime, 'comment' => $comment);

			$str = $this -> Desease_model -> insert_desease($data);
			if($str>0)
				$this -> response(array('Message' => 'กรุณาระบุชื่อการรักษาเสร็จแล้วค่ะ'), 200);
			else 
				$this -> response(array('Message' => 'กรุณาระบุชื่อการรักษาผิดพลาด'), 200);
			// 200 being the HTTP response code
		}
	}

	function updateDesease_post() {

	}

	function delDesease_post() {
		//$this->some_model->deletesomething( $this->get('id') );
		$message = array('id' => $this -> get('id'), 'message' => 'DELETED!');

		$this -> response($message, 200);
		// 200 being the HTTP response code
	}

}
