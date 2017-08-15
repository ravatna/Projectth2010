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
				<h2>สินค้า</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('product/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>รูปภาพ</th>
								<th>ชื่อสินค้า</th>
								<th>ประเภท</th>
								<th>รายละเอียด</th>
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
								foreach ($products as $key => $value) {
									echo '<tr>
								<td>'.$value['ProductsID'].'</td>
								<td class="text-center"><img src="'.base_url().'uploads_product/'.$value['pic1'].'" width="50" height="40" alt="'.$value['ProductsName'].'" class="img-thumbnail"></td>
								<td class="text-left">'.$value['ProductsName'].'</td>
								<td class="text-left">'.$value['NameType'].'</td>

								<td class="text-left">'.$value['Description'].'</td>
								<td class="text-center">'
									.form_open('productsmanage/del').anchor('product/edit/'.$value['ProductsID'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('ID',$value['ProductsID'] ). form_button($data).form_close().'									
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