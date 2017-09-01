<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_clam');
		$this->load->model('m_inform');
		$this->load->model('m_time');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function go()
	{	
	$data['error_msg2']='Please login with your username and password';

	if(isset($_POST['login']) && $_POST['login'] == 'yes' )
		{
			$user_data=$this->m_user->get_user($_POST['username'],$_POST['password']);

			//echo $_POST['login_name']." asdasd ".$_POST['password'];
			if (isset($user_data->username)) {
				$this->session->set_userdata('username', $user_data->username);
				$data2 = array(
	               'last_access' => time()
	            );

				$this->db->where('username', $user_data->username);
				$this->db->update('user', $data2); 
				redirect('dashboard');

			}else{			
				$this->load->view('v_login',$data);
				$this->session->sess_destroy();
			}			
		}else{
			$this->load->view('v_login',$data);
			$this->session->sess_destroy();
		}	
		
	} // End of method go()
	
	/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	public function login_api(){
		header("Content-Type:application/json; charset=utf8");

		$u = @$_REQUEST['u'];
		$p = @$_REQUEST['p'];

		if($u == "" || $p == ""){
			print json_encode(array('status'=>'ok' ,'msg'=>'error, username or password is\'t valid.'));
		}
$user_data=$this->m_user->get_user($u,$p);
		
$rows['data'] = $user_data;
		
		$rows['status'] = 'success';
		$rows['msg'] = 'get data success.';
		print json_encode($rows);
	} // End of method login_api()
	
	/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	public function list_claim_api(){
		header("Content-Type:application/json; charset=utf8");
		$claim_officer = @$_REQUEST['claim_officer'];

		if($claim_officer == ""){
			print json_encode(array('status'=>'error' ,'msg'=>'error, not found claim officer.'));
		}

		$sql="select from_unixtime(inform_date) as inform_datetime 
		, from_unixtime(insurance_start_date) as insurance_start_datetime 
		, from_unixtime(insurance_end_date) as insurance_end_datetime 
		,company.company_name 
		, company.company_phone
		,inform.* 
		from kte_claim.inform inner join company on inform.insurance_company_id = company.id 
		where clam_officer='{$claim_officer}' and  inform_date >= unix_timestamp(DATE_FORMAT(curdate(), '%Y-%m-01' )) 
		order by inform.inform_date desc ;";
		
		$r = $this->db->query($sql);
		$rows['data'] = $r->result_array();
		$rows['status'] = 'success';
		$rows['msg'] = 'get data success.';
		
		print json_encode($rows);
	}
	
	/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	public function list_tool_api(){
		header("Content-Type:text/html; charset=utf8");
		@$s = $_REQUEST['tb_name'];
		@$f = $_REQUEST['field'];
		$sql="select * from {$s} ;";
		
		$r = $this->db->query($sql);
		$rows = $r->result_array();
		
		foreach($rows as $k => $v)
		{
			echo "&lt;item&gt;{$v[$f]}&lt;/item&gt;<br/>";
		}
		
		print json_encode($rows);
	}
	
	/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	public function list_tool_class_api(){
		header("Content-Type:text/html; charset=utf8");
		@$s = $_REQUEST['tb_name']; 
		$sql="select * from {$s} limit 0,1;";
		
		$r = $this->db->query($sql);
		$rows = $r->result_array();
		
		foreach($rows as $k => $v)
		{
			
			foreach($v as $kk => $vv)
		{
			
			echo "String {$kk} ;<br/>";
		}
		}
		
		print json_encode($rows);
	}
	
	
	public function list_tool_insert_api(){
		header("Content-Type:text/html; charset=utf8");
		@$s = $_REQUEST['tb_name']; 
		$sql="select * from {$s} limit 0,1;";
		
		$r = $this->db->query($sql);
		$rows = $r->result_array();
		
		foreach($rows as $k => $v)
		{
			
			foreach($v as $kk => $vv)
		{
			
			echo "Val.put(\"{$kk}\", obj.{$kk})  ;<br/>";
			//Val.put("id", inform.id);
		}
		}
		
		print json_encode($rows);
	}
	
	public function list_tool_select_api(){
		header("Content-Type:text/html; charset=utf8");
		@$s = $_REQUEST['tb_name']; 
		$sql="select * from {$s} limit 0,1;";
		
		$r = $this->db->query($sql);
		$rows = $r->result_array();
		
		foreach($rows as $k => $v)
		{
			$i = 0;
			foreach($v as $kk => $vv)
		{
			
			echo "item.{$kk} = cursor.getString(".($i++).")  ;<br/>";
			//item.id = cursor.getString(0);
		}
		}
		
		print json_encode($rows);
	}
	/*
	public function list_province_api(){
		header("Content-Type:application/json; charset=utf8");
		$claim_officer = @$_REQUEST['claim_officer'];

		if($claim_officer == ""){
			print json_encode(array('status'=>'error' ,'msg'=>'error, not found claim officer.'));
		}

		$sql="select * from tb_province ;";
		
		$r = $this->db->query($sql);
		$rows['data'] = $r->result_array();
		$rows['status'] = 'success';
		$rows['msg'] = 'get data success.';
		
		print json_encode($rows);
	}*/

	/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	public function cancel_api(){
		
			$inform_id = @$_REQUEST['inform_id'];
			
			if($inform_id == ""){
			print json_encode(array('status'=>'error' ,'msg'=>'error, not found claim officer.'));
		}
			
			// load content from inform 
			$inform=$this->m_inform->get_inform_by_id($inform_id);
			$data=array(
				'status' => 'cancel',
			);
			
			// update inform 
			$this->m_inform->update_inform($data, $inform_id);
			
			$insert_data=array(
				'status' => 'ยกเลิกเคลม',					
			);

			// update claim
			$this->m_clam->update_clam($insert_data, $inform->clam_id);
 
		$rows['data'] = $r->result_array();
		$rows['status'] = 'success';
		$rows['msg'] = 'get data success.';
	}	// End cancel_api

/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	public function accept_api()
	{
		header("Content-Type:application/json; charset=utf8");
		$inform_id = @$_REQUEST['inform_id'];
		$username = @$_REQUEST['username'];
		$inform = $this->m_inform->get_inform_by_id($inform_id);

		 $rows['inform'] = $inform->status;

		if (trim($inform->status) == "active") {
			$clam_id=$this->m_clam->generate_id_clam();	
			$data=array(
				'status' => 'accept',
				'clam_id' => $clam_id
				);
			//echo json_encode($inform);
			$this->m_inform->update_inform($data,$inform_id);
			
			// init claim
			$insert_data=array(
				'clam_id' => $clam_id,
				'inform_id' => $inform->id,
				'add_by_usn' => $username,
				'status' => 'รับเรื่องแล้ว',
				'clam_id_company' => $inform->clam_id_company ,
				'inform_date' => $inform->inform_date,
				'clam_id_self' => $inform->clam_id_self ,
				'insurance_company_id' => $inform->insurance_company_id ,
				'insurance_id' => $inform->insurance_id  ,
				'insurance_start_date' => $inform->insurance_start_date  ,
				'insurance_end_date' => $inform->insurance_end_date ,
				'insurance_type' => $inform->insurance_type ,
				'accident_place' => $inform->accident_place ,
				'car_brand' => $inform->car_brand ,
				'car_no' => $inform->car_no ,
				'car_no_province' => $inform->car_no_province ,
				'vehicle_identification_number' => $inform->vehicle_identification_number ,
				'poung_no' => $inform->poung_no ,
				'poung_insurance_id' => $inform->poung_insurance_id ,
				'poung_insurance_start_date' => $inform->poung_insurance_start_date ,
				'poung_insurance_end_date' => $inform->poung_insurance_end_date ,
				'poung_insurance_type' => $inform->poung_insurance_type ,
				'poung_identification_number' => $inform->poung_identification_number ,
				'driver_name' => $inform->driver_name ,
				'driver_phone' => $inform->driver_phone ,
				'insurance_owner' => $inform->insurance_owner ,
				'insurance_owner_phone' => $inform->insurance_owner_phone ,
				'accdent_des' => $inform->accdent_des ,
				'insurance_fix_name_1' => $inform->insurance_fix_name_1 ,
				'insurance_fix_name_2' => $inform->insurance_fix_name_2 ,
				'ps' => $inform->ps,
				);

			$this->m_clam->add_clam($insert_data);

				// @todo return json here
			$rows['data'] = array();
			$rows['claim_id'] = $clam_id;
			$rows['status'] = 'success';
			$rows['msg'] = 'get data success.';
		
			print json_encode($rows);

		}//. End If
		else
		{
			// @todo return json here
			$rows['data'] = array();
			$rows['status'] = 'fail';
			$rows['msg'] = 'get data success.';
		
			print json_encode($rows);
		} // .End else

	
	} // .End accept_api



/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/

public function save_main_claim_api(){


		// ตรวจสอบว่ามีการส่ง claim_id มากับ ค่าที่ส่งมาบันทึกข้อมูลด้วยหรือเปล่า
		if (isset($_POST['clam_id'])) {
 
				$data = array(
					'clam_id_self' => $_POST['clam_id_self'] ,
					
					'insurance_type' => $_POST['insurance_type'] ,
					'driver_name' => $_POST['driver_name'] ,
					'driver_phone' => $_POST['driver_phone'] ,
					'driver_relation' => $_POST['driver_relation'] ,

					//'driver_birth_date' => $this->m_time->datepicker_to_unix($_POST['driver_birth_date']) ,

					'driver_age' => $_POST['driver_age'] ,
					'driver_address' => $_POST['driver_address'] ,
					'driver_aumper' => $_POST['driver_aumper'] ,
					'driver_province' => $_POST['driver_province'] ,
					'driver_license_type' => $_POST['driver_license_type'] ,
					'driver_license_id' => $_POST['driver_license_id'] ,

					// //'driver_license_place' => $_POST['driver_license_place'] ,
					//'driver_license_start_date' => $this->m_time->datepicker_to_unix($_POST['driver_license_start_date']) ,
					//'driver_license_end_date' => $this->m_time->datepicker_to_unix($_POST['driver_license_end_date']) ,
					//'driver_identification_start_date' => $this->m_time->datepicker_to_unix($_POST['driver_identification_start_date']) ,
					//'driver_identification_end_date' => $this->m_time->datepicker_to_unix($_POST['driver_identification_end_date']) ,
					
					'driver_identification_number' => $_POST['driver_identification_number'] ,
					'driver_identification_place' => $_POST['driver_identification_place'] ,
					'insurance_fix_name_1' => $_POST['insurance_fix_name_1'] ,
					'insurance_fix_name_2' => $_POST['insurance_fix_name_2'] ,
					);

				$this->m_clam->update_clam($data, $_POST['clam_id']);

				$data2 = array('clam_id_self' => $_POST['clam_id_self'] ,);
				$this->m_inform->update_inform($data2,$_POST['inform_id']);

				header('Content-Type: application/json');
				$json['data']="complete";
				$json[] = $_POST;
				echo json_encode($json);
			 

		}else{
			
			print json_encode(array('status'=>'error' ,'msg'=>'error, not found claim id',$_POST));
		

		}// .End if claim_id


	} // .End save_main_claim()
	
	/** 
	 สำหรับใช้งานกับระบบ android 
	 ravatna@gmail.com
	*/
	function saveImageFile_api(){
		
		$file_path = "media/car_photo/";
		
		$json = array();	
		
		$file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
		if(@move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
			$json['data']= "success";
		} else{
			$json['data']= "fail";
		}
		
		header('Content-Type: application/json');
		$json[] = $_POST;
		echo json_encode($json);
	} // .End saveImageFile_api()
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */