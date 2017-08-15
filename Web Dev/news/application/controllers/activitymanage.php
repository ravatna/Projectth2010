<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activitymanage extends CI_Controller {
	
	public function addmanage()
	{
		$this -> load -> helper('url');
		$this -> load -> model('mactivity');
		$this -> input -> post('daterange');
		$date = explode(" ", $this -> input -> post('daterange'));
		$datestart = date("Y-m-d", strtotime($date[0]));
		$dateend = date("Y-m-d", strtotime($date[2]));

		if ($_FILES['files']["name"] != "") {
			$imageupload = $_FILES['files']['tmp_name'];
			$imageupload_name = $_FILES['files']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis');
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
				//copy($imageupload,"images/product/".$newimage);
			}
			ini_set('memory_limit', '-1');
			$images = @$_FILES['files']["tmp_name"];
			$width = 1000;
			//*** Fix Width & Heigh (Autu caculate) ***//
			$size = GetimageSize($images);
			$height = @round($width * $size[1] / $size[0]);
			$images_orig = @ImageCreateFromJPEG($images);
			$photoX = @ImagesX($images_orig);
			$photoY = @ImagesY($images_orig);
			$images_fin = @ImageCreateTrueColor($width, $height);
			@ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
			@ImageJPEG($images_fin, "uploads/" . $newimage);
			@ImageDestroy($images_orig);
			@ImageDestroy($images_fin);
		}
		$data = array(
			'title' =>$this->input->post('title'),
			'detail' =>$this->input->post('detail'),
			'start'=>$datestart,
			'end'=>$dateend,
			'img'=>@$newimage
		);
		$this -> db -> insert('activity', $data);
		redirect('activity/administration');
	}


	public function editmanage()
	{
		$this -> load -> helper('url');
		$this -> load -> model('mactivity');
		$this -> input -> post('daterange');
		$date = explode(" ", $this -> input -> post('daterange'));
		$datestart = date("Y-m-d", strtotime($date[0]));
		$dateend = date("Y-m-d", strtotime($date[2]));

		if ($_FILES['files']["name"] != "") {
			$imageupload = $_FILES['files']['tmp_name'];
			$imageupload_name = $_FILES['files']['name'];
			$arraypic = explode(".", $imageupload_name);
			$filename = date('YmdHis');
			$filetype = @$arraypic[1];

			if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
				$newimage = $filename . "." . $filetype;
			}
			ini_set('memory_limit', '-1');
			$images = @$_FILES['files']["tmp_name"];
			$width = 2000;
			//*** Fix Width & Heigh (Autu caculate) ***//
			$size = GetimageSize($images);
			$height = @round($width * $size[1] / $size[0]);
			$images_orig = @ImageCreateFromJPEG($images);
			$photoX = @ImagesX($images_orig);
			$photoY = @ImagesY($images_orig);
			$images_fin = @ImageCreateTrueColor($width, $height);
			@ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
			@ImageJPEG($images_fin, "uploads/" . $newimage);
			@ImageDestroy($images_orig);
			@ImageDestroy($images_fin);
		}
		$data = array(
			'id' =>$this->input->post('id'),
			'title' =>$this->input->post('title'),
			'detail' =>$this->input->post('detail'),
			'start'=>$datestart,
			'end'=>$dateend,
			'img'=>@$newimage
		);
		$this->mactivity->update($data);
		redirect('activity/administration');
	}
	public function del()
	{
		$this->load->model('mactivity');	
		$this->load->helper('url');	
		$this->mactivity->del($this->input->post('ID'));
		redirect('activity/administration');
	}
}