<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ประวัติรถลูกค้า</title>
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
						<h2>ประวัติรถลูกค้า</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('membercarmanage/membercaredit', $atts); ?>
						<input type="hidden" name="id" value="<?php echo $membercar[0]['id'] ?>" />
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">ลูกค้า</label>
							<div class="col-xs-4">
								<select class="form-control" id="cust_id"  name="cust_id" >
                                                                    
                                                                    <?php foreach($customer as $k => $v){  
                                                                        echo '    <option value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                        ?>
                                                                    <?php } ?>
                                                            </select>
							</div>
						</div>
                                                
                                                 <div class="form-group">
							<label for="title" class="col-sm-2 control-label">ยี่ห้อรถ</label>
							<div class="col-xs-4">
								<select class="form-control" id="car_brand_id"  name="car_brand_id" >
                                                                    
                                                                    <?php foreach($carbrand as $k => $v){  
                                                                        echo '    <option value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                        ?>
                                                                    <?php } ?>
                                                            </select>
							</div>
						</div>
						
                                                <div class="form-group">
							<label for="title" class="col-sm-2 control-label">รุ่นรถ</label>
							<div class="col-xs-4">
								<select class="form-control" id="car_model_id"  name="car_model_id" >
                                                                    
                                                                    <?php foreach($carmodel as $k => $v){  
                                                                        echo '    <option value="'.$v['id'].'">'.$v['name'].'</option>';
                                                                        ?>
                                                                    <?php } ?>
                                                            </select>
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="title" class="col-sm-2 control-label">เลขตัวถัง</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="body_no" id="body_no" <?=$membercar[0]['body_no']?> required>
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="title" class="col-sm-2 control-label">ทะเบียน</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="license_no" id="license_no" value="<?=$membercar[0]['license_no']?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="detail_news" class="col-sm-2 control-label">รายละเอียด</label>
							<div class="col-xs-4">
								<textarea name="detail" id="detail" class="form-control"><?=$membercar[0]['detail']?></textarea>
							</div>
						</div>
						<?php 
                                                                        $use_start = date("m/d/Y", strtotime($membercar[0]['car_use_date']));
                                                                        $lc_start = date("m/d/Y", strtotime($membercar[0]['license_plate_date']));
                                                                        $insure_start = date("m/d/Y", strtotime($membercar[0]['insurance_date']));
									
								?>
                                                
                                                <div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">วันที่เริ่มใช้รถ</label>
							<div class="col-xs-3">
								<input type="text" class="form-control" name="car_use_date" value="<?=$use_start?>" />
								<script type="text/javascript">
									$(function() {
										$('input[name="use_date"]').daterangepicker();
									});
								</script>
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">วันทะเบียนหมดอายุ</label>
							<div class="col-xs-3">
								<input type="text" class="form-control" name="license_plate_date" value="<?=$lc_start?>" />
								<script type="text/javascript">
									$(function() {
										$('input[name="license_plate_date"]').daterangepicker();
									});
								</script>
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">วันประกันหมดอายุ</label>
							<div class="col-xs-3">
								<input type="text" class="form-control" name="insurance_date" value="<?=$insure_start?>" />
								<script type="text/javascript">
									$(function() {
										$('input[name="insurance_date"]').daterangepicker();
									});
								</script>
							</div>
						</div>
						<div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 1</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic1" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($membercar[0]['pic1'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_mycar/'.$membercar[0]['pic1'].'" width="50" height="40"  class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>								
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 2</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic2" multiple="multiple" accept="image/*"/>
                                                                         <?php
                                                                         if($membercar[0]['pic2'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_mycar/'.$membercar[0]['pic2'].'" width="50" height="40" class="img-thumbnail">';
                                                                         }
                                                                         
                                                                         ?>
								</div>								
							</div>
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 3</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic3" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($membercar[0]['pic3'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_mycar/'.$membercar[0]['pic3'].'" width="50" height="40" class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 4</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic4" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($membercar[0]['pic4'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_mycar/'.$membercar[0]['pic4'].'" width="50" height="40" class="img-thumbnail">';
                                                                         }
                                                                         ?>
								</div>								
							</div>
                                                
                                                <div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ 5</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="pic5" multiple="multiple" accept="image/*" />
                                                                         <?php
                                                                         if($membercar[0]['pic5'] != ""){
                                                                            echo '<img src="'.base_url().'uploads_mycar/'.$membercar[0]['pic5'].'" width="50" height="40" class="img-thumbnail">';
                                                                         }
                                                                         ?>
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
