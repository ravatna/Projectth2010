<!DOCTYPE html>
<html lang="en">
	<head>
		<title>administration</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	</head>
	<style>
		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
	</style>
	<body>
		<div class="container-fluid">
                    
				<?php echo form_open('member/logincheck','class="form-signin"'); ?>
                    <div class="form-group">
                                <h2>Administrator Form</h2>
				</div>
				<div class="form-group">
					<label for="username">username</label>
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
						<input type="text" class="form-control" name="username" id="username" placeholder="username">
					</div>
				</div>
				<div class="form-group">
					<label for="username">password</label>
					<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
						<input type="password" class="form-control" name="password" id="password" placeholder="password">
					</div>
				</div>
				 <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> login</button>
		</div>
	</body>
</html>