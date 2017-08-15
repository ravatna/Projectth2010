<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register</title>
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
				<h2>รายการแจ้งสมัครใหม่</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('register/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table id="table_id" class="display table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>ชื่อ</th>
								<th>เลข บ/ช ธนาคาร</th>							
								<th>ชื่อธนาคาร</th>
								<th>หมายเลขโทรศัพท์</th>
								<th>วันที่แจ้ง</th>
                                                                <th>ผู้ทำ</th>
                                                                <th>สถานะ</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody >
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
								foreach ($reg as $key => $value) {
                                                                    $row_class = "";
                                                                    if($value['process_status'] == "ดำเนินการเรียบร้อย"){
                                                                        $row_class = "success";
                                                                    }elseif($value['process_status'] == "ยกเลิกรายการ"){
                                                                        $row_class = "warning" ;
                                                                    }
                                                                    
								echo '<tr class="'.$row_class.'" >
								<td>'.$value['id'].'</td>
								
								<td class="text-left">'.$value['reg_fname'].'</td>
								<td class="text-left">'.$value['reg_bank_number'].'</td>
                                                                <td class="text-left">'.$value['reg_bank_name'].'</td>
                                                                <td class="text-left">'.$value['reg_phone_no'].'</td>
								<td class="text-left">'.$value['created_date'].'</td>
                                                                    <td class="text-left">'.$value['who_updated'].'</td>
								<td class="text-left">'.$value['reg_status_text'].'</td>
								<td class="text-center">'
									.form_open('registermanage/del').anchor('register/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('id',$value['id'] ).form_close()
                                                                        // form_open('registermanage/del').anchor('register/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('id',$value['id'] ). form_button($data).form_close()
                                                                        .'									
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
  return confirm('ยืนยันการลบข้อมูล');
}
</script>