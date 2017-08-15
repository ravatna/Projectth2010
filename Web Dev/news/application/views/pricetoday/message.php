<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Products</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
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
						<hr />
							<?php echo form_open('pricetoday/send_notifications'); ?>
							<div class="form-group">
								<label for="ProductsID" class="col-sm-2 control-label">ข้อความ</label>
								<div class="col-xs-4">
									<textarea name="send"style="width: 500px"></textarea>
								</div>
							</div>														
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">submit</button>
									<button type="reset" class="btn btn-default">reset</button>									
								</div>
							</div>
							<?php echo form_close() ?>
					</div>
				</div>
				<!-- /.row -->
			</div>
		</div>
		<!-- /.container-fluid -->

	</body>
</html>