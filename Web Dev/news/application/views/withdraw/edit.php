<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Withdraw</title>
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
						<h2>แจ้งถอนเงิน</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('withdrawmanage/withdrawedit', $atts); ?>
						<input type="hidden" name="id" value="<?php echo $with[0]['id'] ?>" />
						<div class="form-group">
							<label for="with_fname" class="col-sm-2 control-label">ชื่อ</label>
							<div class="col-xs-4">
								<input readonly type="text" class="form-control" name="with_fname" id="with_fname" value="<?=$with[0]['with_fname']?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="with_uname" class="col-sm-2 control-label">ยูเซอร์</label>
							<div class="col-xs-4">
								<input readonly type="text" class="form-control" name="with_uname" id="with_uname" value="<?=$with[0]['with_uname']?>">
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="with_bank_name" class="col-sm-2 control-label">ธนาคาร</label>
							<div class="col-xs-4"> 
                                                            
                                                            <input readonly type="text" class="form-control" name="with_bank_name" id="with_bank_name" value="<?=$with[0]['with_bank_name']?>">
							</div>
						</div>
                                                <div class="form-group">
							<label for="with_amount" class="col-sm-2 control-label">ยอดเงิน</label>
							<div class="col-xs-4">
								<input  readonly type="text" class="form-control" name="with_amount" id="with_amount" value="<?=$with[0]['with_amount']?>">
							</div>
						</div>
                                                
                                                
					
                                                <div class="form-group">
							<label for="with_status_text" class="col-sm-2 control-label">สถานะดำเนินการ</label>
							<div class="col-xs-4">
                                                            <input  type="text" readonly class="form-control" name="with_status_text" id="with_status_text"  value="<?=$with[0]['with_status_text']?>">
                                                                
                                                                <select class="form-control" name="process_status" id="process_status" >
                                                                    
                                                                    <option <?=($with[0]['process_status'] == "ดำเนินการเรียบร้อย") ? "selected" :"" ?> value="ดำเนินการเรียบร้อย">ดำเนินการเรียบร้อย</option>
                                                                    <option <?=($with[0]['process_status'] == "ดำเนินการไม่เรียบร้อย") ? "selected" :"" ?> value="ดำเนินการไม่เรียบร้อย">ดำเนินการไม่เรียบร้อย</option>
                                                                    <option <?=($with[0]['process_status'] == "ยกเลิกรายการ") ? "selected" :"" ?> value="ยกเลิกรายการ">ยกเลิกรายการ</option>
                                                                </select>
                                                                
							</div>
						</div>
                                                
						
						<div class="form-group">
							<label for="with_remark" class="col-sm-2 control-label">หมายเหตุ</label>
							<div class="col-xs-4">
								<textarea name="with_remark" id="with_remark" class="form-control"><?=$with[0]['with_remark']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="created_date" class="col-sm-2 control-label">วันที่ทำรายการ</label>
							<div class="col-xs-3">
								<?php 
                                                                    $start = date("m/d/Y H:i:s", strtotime($with[0]['created_date']));
									
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
