<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register</title>
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
						<h2>ลงทะเบียนใหม่</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('registermanage/registeradd', $atts); ?>
                                                <input type="hidden" name="process_status" value="เจ้าหน้าที่ดำเนินการแทน" />
						<div class="form-group">
							<label for="reg_fname" class="col-sm-2 control-label">ชื่อ</label>
							<div class="col-xs-4">
								<input  type="text" class="form-control" name="reg_fname" id="title" value="">
							</div>
						</div>
                                                <div class="form-group">
							<label for="reg_phone_no" class="col-sm-2 control-label">เบอร์ติดต่อ</label>
							<div class="col-xs-4">
								<input  type="text" class="form-control" name="reg_phone_no" id="reg_phone_no" value="">
							</div>
						</div>
                                                <div class="form-group">
							<label for="reg_bank_number" class="col-sm-2 control-label">เลขที่ บ/ช ธนาคาร</label>
							<div class="col-xs-4">
								<input  type="text" class="form-control" name="reg_bank_number" id="reg_bank_number" value="">
							</div>
						</div>
                                                <div class="form-group">
							<label for="reg_bank_name" class="col-sm-2 control-label">ธนาคาร</label>
							<div class="col-xs-4"> 
                                                            <select class="form-control" id="reg_bank_name"  name="reg_bank_name" >
                                                                <option value="กสิกรไทย">กสิกรไทย</option>
                                                                <option value="กรุงไทย">กรุงไทย</option>
                                                                <option value="กรุงเทพ">กรุงเทพ</option>
                                                                <option value="ไทยพาณิชย์">ไทยพาณิชย์</option>
                                                                <option value="ทหารไทย">ทหารไทย</option>
                                                                <option value="กรุงศรีอยุธยา">กรุงศรีอยุธยา</option>
                                                            </select>
							</div>
						</div>
                                                <div class="form-group">
							<label for="reg_status_text" class="col-sm-2 control-label">สถานะดำเนินการ</label>
							<div class="col-xs-4">
                                                            <input  type="text" readonly  name="reg_status_text" id="reg_status_text" class="form-control"  value="จนท. ทำรายการ">
							</div>
						</div>
						<div class="form-group">
							<label for="reg_remark" class="col-sm-2 control-label">หมายเหตุ</label>
							<div class="col-xs-4">
								<textarea name="reg_remark" id="reg_remark" class="form-control"></textarea>
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
