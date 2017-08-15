<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Booking</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

                
		
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
				<h2>รายการวันเข้า Service</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('booking/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table id="table_id" class="table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<!--<th>รูปภาพ</th>-->
								<th>รุ่นรถ</th>	
                                                                <th>ทะเบียน</th>	
                                                                <th>เลขตัวถัง</th>	
								<th>รายละเอียด</th>
                                                                <th>ชื่อ ลูกค้า</th>
                                                                
								<th>วันที่จอง</th>
                                <th>สถานะงาน</th>
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
                                                        
								foreach ($booking as $key => $value) {
                                                                    
                                                                    //$a_cust = $customer->customer($value['cust_id']); 
//                                                                   // $a_membercar = $membercar->membercar($value['cust_id']); 
                                                                    //$a_brand = $carbrand->carbrand($value['car_brand_id']); 
                                                                    //$a_model = $carmodel->carmodel($value['car_model_id'],$value['car_brand_id']); 
//                                                                    print_r($a_cust);
								echo '<tr>
								<td>'.$value['id'].'</td>
								<td class="text-left">'.$value['car_brand'].'-'.$value['car_model'].'</td>

                                                                <td class="text-left">'.$value['license_no'].'</td>        
                                                                <td class="text-left">'.$value['body_no'].'</td>
								<td class="text-left">'.$value['booking_for'].'</td>
                                                                <td class="text-left">'.$value['cust_name'].'</td>
								<td class="text-left">'.$value['booking_date'].'</td>
                                                                    <td class="text-left">'.$value['status_text'].'</td>
								<td class="text-center">'
									.form_open('bookingmanage/del').anchor('booking/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('ID',$value['id'] ). form_button($data).form_close().'									
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