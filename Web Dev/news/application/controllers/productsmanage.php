<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productsmanage extends CI_Controller {

    public function productsadd() {
        $newimage = "";
        $this->load->helper('url');
        $this->load->model('mproducts');

        $pic1 = "";
        $pic2 = "";
        $pic3 = "";
        $pic4 = "";
        $pic5 = "";
        $brochoure = "";

        if ($_FILES['brochoure']["name"] != "") {

            $imageupload = $_FILES['brochoure']['tmp_name'];
            $imageupload_name = $_FILES['brochoure']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_brochoure";
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
            }
        }

        if ($_FILES['pic1']["name"] != "") {

            $imageupload = $_FILES['pic1']['tmp_name'];
            $imageupload_name = $_FILES['pic1']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis_pic1');
            $filetype = @$arraypic[1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
            }
        }

        // update database

        $data = array(
//			'ProductsID' => $this -> input -> post('ProductsID'), 
            'ProductsName' => $this->input->post('ProductsName'),
            'ProductsType' => $this->input->post('ProductsType'),
            'more_online' => $this->input->post('more_online'),
            'brochoure' => $brochoure,
            'pic1' => $pic1,
            'pic2' => $pic2,
            'pic3' => $pic3,
            'pic4' => $pic4,
            'pic5' => $pic5,
            'Description' => $this->input->post('Description'),
            'date' => date('Y-m-d H:i:s')
        );

        $this->mproducts->products_insert($data);


        // redirect



        redirect('product/administration');
    }

    /**
     * Edit product 
     */
    public function productsedit() {
        $this->load->helper('url');
        $this->load->model('mproducts');
        $newimage = "";
        $pic1 = "";
        $pic2 = "";
        $pic3 = "";
        $pic4 = "";
        $pic5 = "";
        $brochoure = "";


        $data = array(
            'ProductsID' => $this->input->post('ProductsID'),
            'ProductsName' => $this->input->post('ProductsName'),
            'ProductsType' => $this->input->post('ProductsType'),
            'more_online' => $this->input->post('more_online'),
            'Description' => $this->input->post('Description'),
            'date' => date('Y-m-d H:i:s')
        );


        if ($_FILES['brochoure']["name"] != "") {

            $imageupload = $_FILES['brochoure']['tmp_name'];
            $imageupload_name = $_FILES['brochoure']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis_brochoure');
            $filetype = @$arraypic[1];

            if ($filetype == "pdf") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_product/" . $newimage);
            }
            $brochoure = $newimage;

            $data['brochoure'] = $brochoure;
        }

        if ($_FILES['pic1']["name"] != "") {

            $imageupload = $_FILES['pic1']['tmp_name'];
            $imageupload_name = $_FILES['pic1']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic1_";
            $filetype = $arraypic[count($arraypic) - 1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_product/" . $newimage);
                $pic1 = $newimage;
            }
            $data['pic1'] = $pic1;
        }

        if ($_FILES['pic2']["name"] != "") {

            $imageupload = $_FILES['pic2']['tmp_name'];
            $imageupload_name = $_FILES['pic2']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic2_";
            $filetype = $arraypic[count($arraypic) - 1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_product/" . $newimage);
                $pic2 = $newimage;
            }
            $data['pic2'] = $pic2;
        }

        if ($_FILES['pic3']["name"] != "") {

            $imageupload = $_FILES['pic3']['tmp_name'];
            $imageupload_name = $_FILES['pic3']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic3_";
            $filetype = $arraypic[count($arraypic) - 1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_product/" . $newimage);
                $pic3 = $newimage;
            }
            $data['pic3'] = $pic3;
        }

        if ($_FILES['pic4']["name"] != "") {

            $imageupload = $_FILES['pic4']['tmp_name'];
            $imageupload_name = $_FILES['pic4']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic4_";
            $filetype = $arraypic[count($arraypic) - 1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_product/" . $newimage);
                $pic4 = $newimage;
            }
            $data['pic4'] = $pic4;
        }

        if ($_FILES['pic5']["name"] != "") {

            $imageupload = $_FILES['pic5']['tmp_name'];
            $imageupload_name = $_FILES['pic5']['name'];
            $arraypic = explode(".", $imageupload_name);
            $filename = date('YmdHis') . "_pic5_";
            $filetype = $arraypic[count($arraypic) - 1];

            if ($filetype == "jpg" || $filetype == "JPG" || $filetype == "jpeg" || $filetype == "JPEG" || $filetype == "png" || $filetype == "PNG" || $filetype == "gif") {
                $newimage = $filename . "." . $filetype;
                move_uploaded_file($imageupload, "uploads_product/" . $newimage);
                $pic5 = $newimage;
            }
            $data['pic5'] = $pic5;
        }

        $this->mproducts->products_update($data);


        redirect('product/administration');
    }

    public function del() {
        $this->load->model('mproducts');
        $this->load->helper('url');
        $this->mproducts->products_del($this->input->post('ID'));
        redirect('product/administration');
    }

}
