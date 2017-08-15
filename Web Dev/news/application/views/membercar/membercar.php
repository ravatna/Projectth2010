<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ประวัติรถลูกค้า</title>
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
				<h2>รายการประวัติรถลูกค้า</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('membercar/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>รูปภาพ</th>
                                                                <th>ทะเบียน</th>
								<th>รุ่นรถ</th>							
								<th>ชื่อ ลูกค้า</th>
								<th>ทะเบียนหมดอายุ</th>
								<th>ประกันหมดอายุ</th>
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
								foreach ($membercar as $key => $value) {
                                                                    
                                                                    
                                                                    
                                                                    
									echo '<tr>
								<td>'.$value['id'].'</td>
								<td class="text-center"><img src="'.base_url().'uploads_mycar/'.$value['pic1'].'" width="60"  class="img-thumbnail"></td>
                                                                <td class="text-left">'.$value['license_no'].'</td>								
                                                                    


                                                                <td class="text-left">'.$value['brand_name'].'-'.$value['model_name'].'</td>
                                                                <td class="text-left">'.$value['cust_name'].'</td>
                                                                
								<td class="text-left">'.$value['license_plate_date'].'</td>
                                                                <td class="text-left">'.$value['insureance_date'].'</td>
								<td class="text-center">'.form_open('membercarmanage/del').anchor('membercar/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('ID',$value['id'] ). form_button($data).form_close().'</td>
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