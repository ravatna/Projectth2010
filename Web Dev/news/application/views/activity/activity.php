<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Activity</title>
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
				<h2>กิจกรรม</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('activity/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>รูปภาพ</th>
								<th>หัวข้อ</th>							
								<th>รายละเอียด</th>
								<th>วันที่เริ่มประกาศ</th>
								<th>วันที่สิ้นสุดประกาศ</th>
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
								foreach ($activity as $key => $value) {
									echo '<tr>
								<td>'.$value['id'].'</td>
								<td class="text-center"><img src="'.base_url().'uploads/'.$value['img'].'" width="60" alt="'.$value['title'].'&quot;" class="img-thumbnail"></td>
								<td class="text-left">'.$value['title'].'</td>
								<td class="text-left">'.$value['detail'].'</td>
								<td class="text-left">'.$value['start'].'</td>
								<td class="text-left">'.$value['end'].'</td>
								<td class="text-center">'
									.form_open('activitymanage/del').anchor('activity/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('ID',$value['id'] ). form_button($data).form_close().'									
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