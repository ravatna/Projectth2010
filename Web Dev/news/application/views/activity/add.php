<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Activity</title>
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
						<h2>&#3585;&#3636;&#3592;&#3585;&#3619;&#3619;&#3617;</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('activitymanage/addmanage', $atts);
 ?>

						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">&#3627;&#3633;&#3623;&#3586;&#3657;&#3629;&#3585;&#3636;&#3592;&#3585;&#3619;&#3619;&#3617;</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="title" id="title" required">
							</div>
						</div>
						<div class="form-group">
							<label for="detail_news" class="col-sm-2 control-label" >&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</label>
							<div class="col-xs-4">
								<textarea name="detail" id="detail" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;</label>
							<div class="col-xs-3">
								<input type="text" class="form-control" name="daterange" value="<?php echo date('m/d/Y')."-".date('m/d/Y') ?>" />
								<script type="text/javascript">
									$(function() {
										$('input[name="daterange"]').daterangepicker();
									});
								</script>
							</div>
						</div>
						<div class="form-group">
								<label for="file" class="col-sm-2 control-label">&#3616;&#3634;&#3614;</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="files" accept="image/*" required />
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
