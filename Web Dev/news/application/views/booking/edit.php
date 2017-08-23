<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Products</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script> 
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

        <!-- Include Date Range Picker -->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/daterangepicker.css" />
    </head>
    <style>
        .starter-template {
            padding: 90px 15px;
        }
    </style>
    <body>
        <?php $this->load->view($master); ?>
        <div class="container">
            <div class="starter-template">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>วันจองเข้าอู่</h2>
                        <hr />
                        <?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
                        echo form_open('bookingmanage/bookingedit', $atts);
                        ?>
                        <input type="hidden" name="id" value="<?php echo $booking[0]['id'] ?>" />

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">ลูกค้า</label>
                            <div class="col-xs-4">
                                <!--<input type="text" class="form-control" name="cust_id" id="cust_id" value="<?php echo $booking[0]['cust_id'] ?>" required>-->
                                
                                <select class="form-control" id="cust_id"  name="cust_id" >
                                                                    
                                                                    <?php foreach($customer as $k => $v){  
                                                                        $b = ($booking[0]['cust_id'] == $v['id']) ? " selected " : "";
                                                                        
                                                                        echo '    <option '.$b.' value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                        ?>
                                                                    <?php } ?>
                                                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">ยี่ห้อรถ</label>
                            <div class="col-xs-4">
                                <!--<input type="text" class="form-control" name="car_brand" id="car_brand" value="<?php echo $booking[0]['car_brand_id'] ?>" required>-->
                                <select class="form-control" id="car_brand_id"  name="car_brand_id" >
                                                                    
                                                                    <?php foreach($carbrand as $k => $v){  
                                                                        $b = ($booking[0]['car_brand_id'] == $v['id']) ? " selected " : "";
                                                                        echo '    <option '. $b .' value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                        ?>
                                                                    <?php } ?>
                                                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">รุ่นรถ</label>
                            <div class="col-xs-4">
                                <!--<input type="text" class="form-control" name="car_model" id="car_model" value="<?php echo $booking[0]['car_model_id'] ?>" required>-->
                                <select class="form-control" id="car_model_id"  name="car_model_id" >
                                                                    
                                                                    <?php foreach($carmodel as $k => $v){  
                                                                        $b = ($booking[0]['car_model_id'] == $v['id']) ? " selected " : "";
                                                                        echo '    <option ' . $b . ' value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                        ?>
                                                                    <?php } ?>
                                                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">เลขตัวถัง</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="body_no" id="body_no" value="<?php echo $booking[0]['body_no'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail" class="col-sm-2 control-label">แจ้งอาการซ่อม</label>
                            <div class="col-xs-4">
                                <select class="form-control" id="booking_for"  name="booking_for" >
                                    
                                    
                                    <option <?php ($booking[0]['booking_for'] == "เช็คระยะ") ? " selected " : "" ?> value="เช็คระยะ">เช็คระยะ</option>
                                    <option <?php ($booking[0]['booking_for'] == "เปลี่ยนอะไหล่") ? "selected" : "" ?> value="เปลี่ยนอะไหล่">เปลี่ยนอะไหล่</option>
                                    <option <?php ($booking[0]['booking_for'] == "งานซ่อมหนัก") ? "selected" : "" ?> value="งานซ่อมหนัก">งานซ่อมหนัก่</option>
                                    <option <?php ($booking[0]['booking_for'] == "เคลมประกัน") ? "selected" : "" ?> value="เคลมประกัน">เคลมประกัน่</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail_news" class="col-sm-2 control-label">รายละเอียด</label>
                            <div class="col-xs-4">
                                <textarea name="detail" id="detail" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ratio" class="col-sm-2 control-label">วันที่ต้องการจอง</label>
                            <div class="col-xs-3">
                                <input type="text" class="form-control" name="booking_date" id="booking_date"  value="<?php echo $booking[0]['booking_date'] ?>"  />
                                <script type="text/javascript">
                                    $('#booking_date').datepicker({"dateFormat": "yy-mm-dd"});
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail" class="col-sm-2 control-label">สถานะ</label>
                            <div class="col-xs-4">
                                <select class="form-control" id="status_text"  name="status_text" >
                                    <option <?php ($booking[0]['booking_for'] == "รอรับรถ") ? " selected " : "" ?>  value="รอรับรถ">รอรับรถ</option>
                                    <option <?php ($booking[0]['booking_for'] == "รอแจ้งลูกค้า") ? " selected " : "" ?>  value="รอแจ้งลูกค้า">รอแจ้งลูกค้า</option>
                                    <option <?php ($booking[0]['booking_for'] == "ส่งมอบรถแล้ว") ? " selected " : "" ?>  value="ส่งมอบรถแล้ว">ส่งมอบรถแล้ว</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                submit
                            </button>
                            <button type="reset" class="btn btn-default">
                                reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container-fluid -->

</body>
</html>
<script></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->