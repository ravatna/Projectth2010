<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Product</title>
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
						<h2>ลูกค้า</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('customermanage/customeradd', $atts);
 ?>
 
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">ชื่อ</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="name" id="name" required>
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="phone_no" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="phone_no" id="phone_no" required>
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label for="email" class="col-sm-2 control-label">E-mail</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="email" id="email" required>
							</div>
						</div>
                                                
						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">ที่อยู่</label>
							<div class="col-xs-4">
								<textarea name="address" id="address" class="form-control"></textarea>
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
