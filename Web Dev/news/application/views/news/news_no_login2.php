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
				<div class="row">
				<div class="col-sm-12">
					<table id="table_id" class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>รูปภาพ</th>
								<th>หัวข้อข่าว</th>							
								<th>รายละเอียด</th>
								<th>วันที่เริ่มประกาศ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($news as $key => $value) {
									echo '<tr>
								<td>'.$value['id'].'</td>
								<td class="text-center"><img src="'.base_url().'uploads/'.$value['img'].'"  style="width:160px; height:230px !important;"  alt="'.$value['title'].'&quot;" class="img-thumbnail"></td>
								<td class="text-left">'.$value['title'].'</td>
								<td class="text-left">'.$value['detail'].'</td>
								<td class="text-left">'.$value['start'].'</td>
								<td>'. anchor('news/news_detail/'.$value['id'],'อ่านข่าว','class="btn btn-primary btn-sm" target="_BLANK"') .'</td>
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
 $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>