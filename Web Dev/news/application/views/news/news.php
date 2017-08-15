<!DOCTYPE html>
<html lang="en">
	<head>
		<title>NEWS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		
						<link href="<?php echo base_url(); ?>css/datatables.min.css" rel="stylesheet">
						

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/datatables.min.js"></script>
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
				<h2>ข่าวในระบบ</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('news/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table id="table_id" class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>ประเภทข่าว</th>
								<th>รูปภาพ</th>
								<th>หัวข้อข่าว</th>							
								<th>รายละเอียด</th>
								
								<th>วันที่เริ่มประกาศ</th>
								
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
								foreach ($news as $key => $value) {
									echo '<tr>
								<td>'.$value['id'].'</td>
								<td class="text-left">'.$value['type_news'].'</td>
								<td class="text-center"><img src="'.base_url().'uploads/'.$value['img'].'" style="max-width:160px; max-height:230px !important;" alt="'.$value['title'].'&quot;" class="img-thumbnail"></td>
								<td class="text-left">'.$value['title'].'</td>
								<td class="text-left">'.substr($value['detail'],0,100).'...</td>
								<td class="text-left">'.$value['start'].'</td>
								
								<td class="text-center">'
									.form_open('newsmanage/del').anchor('news/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('ID',$value['id'] ). form_button($data).form_close().'									
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
 $(document).ready( function () {
    $('#table_id').DataTable();
} );
function confirm_delete() {
  return confirm('ยืนยันการลบข้อมุูล');
}
</script>