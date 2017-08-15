<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Deposit</title>
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
						<h2>แจ้งฝากเงิน</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('depositmanage/depositedit', $atts); ?>
						<input type="hidden" name="id" value="<?php echo $dep[0]['id'] ?>" />
						<div class="form-group">
							<label for="dep_fname" class="col-sm-2 control-label">ชื่อ</label>
							<div class="col-xs-4">
								<input readonly type="text" class="form-control" name="dep_fname" id="dep_fname" value="<?=$dep[0]['dep_fname']?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="dep_uname" class="col-sm-2 control-label">ยูเซอร์</label>
							<div class="col-xs-4">
								<input readonly type="text" class="form-control" name="dep_uname" id="dep_uname" value="<?=$dep[0]['dep_uname']?>">
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="dep_bank_name" class="col-sm-2 control-label">ธนาคาร</label>
							<div class="col-xs-4"> 
                                                            
                                                            <input readonly type="text" class="form-control" name="dep_bank_name" id="dep_bank_name" value="<?=$dep[0]['dep_bank_name']?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="dep_amount" class="col-sm-2 control-label">ยอดเงิน</label>
							<div class="col-xs-4">
								<input  readonly type="text" class="form-control" name="dep_amount" id="dep_amount" value="<?=$dep[0]['dep_amount']?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="dep_time" class="col-sm-2 control-label">เวลา</label>
							<div class="col-xs-4">
								<input readonly type="text" class="form-control" name="dep_time" id="dep_time" value="<?=$dep[0]['dep_time']?>">
							</div>
						</div>
                                                
					
                                                <div class="form-group">
							<label for="dep_status_text" class="col-sm-2 control-label">สถานะดำเนินการ</label>
							<div class="col-xs-4">
                                                            <input  type="text" readonly class="form-control" name="dep_status_text" id="dep_status_text"  value="<?=$dep[0]['dep_status_text']?>">
                                                                
                                                                <select class="form-control" name="process_status" id="process_status" >
                                                                    
                                                                    <option <?=($dep[0]['process_status'] == "ดำเนินการเรียบร้อย") ? "selected" :"" ?> value="ดำเนินการเรียบร้อย">ดำเนินการเรียบร้อย</option>
                                                                    <option <?=($dep[0]['process_status'] == "ดำเนินการไม่เรียบร้อย") ? "selected" :"" ?> value="ดำเนินการไม่เรียบร้อย">ดำเนินการไม่เรียบร้อย</option>
                                                                    <option <?=($dep[0]['process_status'] == "ยกเลิกรายการ") ? "selected" :"" ?> value="ยกเลิกรายการ">ยกเลิกรายการ</option>
                                                                </select>
                                                                
							</div>
						</div>
                                                
						
						<div class="form-group">
							<label for="dep_remark" class="col-sm-2 control-label">หมายเหตุ</label>
							<div class="col-xs-4">
								<textarea name="dep_remark" id="dep_remark" class="form-control"><?=$dep[0]['dep_remark']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="created_date" class="col-sm-2 control-label">วันที่ทำรายการ</label>
							<div class="col-xs-3">
								<?php 
                                                                    $start = date("m/d/Y H:i:s", strtotime($dep[0]['created_date']));
									
								?>
								<input type="text" readonly class="form-control" name="created_date" id="created_date" value="<?php echo $start ?>" />
								
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
