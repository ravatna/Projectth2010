<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Newsmanage extends CI_Controller {

	public function newsadd() {
		$this -> load -> helper('url');
		$this -> load -> model('mnews');
		$this -> input -> post('daterange');
		$date = explode(" ", $this -> input -> post('daterange'));
		$datestart = date("Y-m-d", strtotime($date[0]));
		$dateend = date("Y-m-d", strtotime($date[2]));

		$data = array(
		'type_news' =>$this->input->post('type_news'),
			'title' =>$this->input->post('title'),
			'detail' =>$this->input->post('detail'),
			'start'=>$datestart,
			'end'=>$dateend
		);
		if ($_FILES['files']["name"] != "") {
			$imageupload = $_FILES['files']['tmp_name'];
			$imageupload_name = $_FILES['files']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis');
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				//copy($imageupload,"images/product/".$newimage);
				
				move_uploaded_file($imageupload,"uploads/".$imageupload_name);
               $data['img'] = $imageupload_name;
				
			} 
		}
		$this -> db -> insert('news', $data);
		redirect('news/administration');
	}

	public function newsedit() {
		ini_set('memory_limit', '-1');
		$this -> load -> helper('url');
		$this -> load -> model('mnews');
		$this -> input -> post('daterange');
		$date = explode(" ", $this -> input -> post('daterange'));
		$datestart = date("Y-m-d", strtotime($date[0]));
		$dateend = date("Y-m-d", strtotime($date[2]));

		$data = array(
			'id' =>$this->input->post('id'),
			'type_news' =>$this->input->post('type_news'),
			'title' =>$this->input->post('title'),
			'detail' =>$this->input->post('detail'),
			'start'=>$datestart,
			'end'=>$dateend,
			
		);
		
		
		if ($_FILES['files']["name"] != "") {
			$imageupload = $_FILES['files']['tmp_name'];
			$imageupload_name = $_FILES['files']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis');
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				//copy($imageupload,"images/product/".$newimage);
				
				move_uploaded_file($imageupload,"uploads/".$imageupload_name);
               $data['img'] = $imageupload_name;
			}
		}
		
		// upload other file 
		if ($_FILES['file1']["name"] != "") {
			$imageupload = $_FILES['file1']['tmp_name'];
			$imageupload_name = $_FILES['file1']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_file1";
			$filetype = @$arraypic[1];
			$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads".$newimage);
            $data['file1'] = $newimage;
		}
		
		if ($_FILES['file2']["name"] != "") {
			$imageupload = $_FILES['file2']['tmp_name'];
			$imageupload_name = $_FILES['file2']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_file2";
			$filetype = @$arraypic[1];
			$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads/".$newimage);
            $data['file2'] = $newimage;
		}
		
		if ($_FILES['file3']["name"] != "") {
			$imageupload = $_FILES['file3']['tmp_name'];
			$imageupload_name = $_FILES['file3']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis')."_file3";
			$filetype = @$arraypic[1];
			$newimage = $filename . "." . $filetype;
				move_uploaded_file($imageupload,"uploads/".$newimage);
            $data['file3'] = $newimage;
		}
		 
		
		$this -> mnews -> news_update($data);

		redirect('news/administration');
	}

	public function del() {
		$this -> load -> model('mnews');
		$this -> load -> helper('url');
		$this -> mnews -> news_del($this -> input -> post('ID'));
		redirect('news/administration');
	}

}
