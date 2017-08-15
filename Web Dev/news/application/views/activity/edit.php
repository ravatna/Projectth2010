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
						<h2>&#3586;&#3656;&#3634;&#3623;</h2>
						<hr />
						<?php $atts = array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal');
							echo form_open('activitymanage/editmanage', $atts); ?>
						<input type="hidden" name="id" value="<?php echo $activity[0]['id'] ?>" />
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">หัวข้อกิจกรรม</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" name="title" id="title" value="<?=$activity[0]['title']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="detail_news" class="col-sm-2 control-label">รายละเอียด</label>
							<div class="col-xs-4">
								<textarea name="detail" id="detail" class="form-control"><?=$activity[0]['detail']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="ratio" class="col-sm-2 control-label">วันที่</label>
							<div class="col-xs-3">
								<?php $start = date("m/d/Y", strtotime($activity[0]['start']));
									$end = date("m/d/Y", strtotime($activity[0]['end']))
								?>
								<input type="text" class="form-control" name="daterange" value="<?php echo $start ?> - <?php echo $end ?>" />
								<script type="text/javascript">
									$(function() {
										$('input[name="daterange"]').daterangepicker();
									});
								</script>
							</div>
						</div>
						<div class="form-group">
								<label for="file" class="col-sm-2 control-label">ภาพ</label>
								<div class="col-xs-4">
									 <input type="file" id="file" name="files" accept="image/*" required/>
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
