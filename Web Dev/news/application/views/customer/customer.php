<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Customer</title>
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
				<h2>Customer</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('customer/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>ชื่อ</th>
								<th>เบอร์โทร</th>							
								<th>E-mail</th>
								<th>ปรับปรุงเมื่อ</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$data = array(
    							'name' => 'button',
    							'id' => 'button',
    							'value' => 'true',
    							'type' => 'submit',
    							'onclick' => 'return confirm_delete()',
    							'class' => 'btn btn-danger btn-sm',
    							'content' => '<i class="glyphicon glyphicon-trash"></i>'
							);
                                                        
								foreach ($customer as $key => $value) {
									echo '<tr>
								<td>'.$value['id'].'</td>
								<td class="text-left">'.$value['name'].'</td>
								<td class="text-left">'.$value['phone_no'].'</td>
                                                                <td class="text-left">'.$value['email'].'</td>
								<td class="text-left">'.$value['updated_date'].'</td>
								<td class="text-center">'
									.form_open('customermanage/del').anchor('customer/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('ID',$value['id'] ). form_button($data).form_close().'									
								</td>
							</tr>';
								}
                                                        
							?>						
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.row -->
			</div>
		</div>
		<!-- /.container-fluid -->

	</body>
</html>
<script type="text/javascript">
function confirm_delete() {
  return confirm('ยืนยันการลบข้อมุูล');
}
</script>