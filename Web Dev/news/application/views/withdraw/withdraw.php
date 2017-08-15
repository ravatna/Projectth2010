<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Withdraw</title>
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
				<h2>รายการแจ้งถอนเงิน</h2>
				<hr />
				<div class="row">
				<div class="col-sm-12">
					<?php echo anchor('withdraw/add', '<i class="glyphicon glyphicon-plus"></i>', 'class="btn btn-primary"') ?>
					<table id="table_id" class="display table table-hover">
						<thead>
							<tr>
								<th>รหัส</th>
								<th>ยอดเงิน</th>
                                                                <th>ชื่อธนาคาร</th>
                                                                <th>ชื่อ</th>
								<th>ยูเซอร์</th>
								
								
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
								foreach ($with as $key => $value) {
                                                                    $row_class = "";
                                                                    if($value['process_status'] == "ดำเนินการเรียบร้อย"){
                                                                        $row_class = "success";
                                                                    }elseif($value['process_status'] == "ยกเลิกรายการ"){
                                                                        $row_class = "warning" ;
                                                                    }
                                                                    
								echo '<tr class="'.$row_class.'" >
								<td>'.$value['id'].'</td>
								
								
								<td class="text-left">'.  number_format($value['with_amount'], 2, ".", ",").'</td>
                                                                <td class="text-left">'.$value['with_bank_name'].'</td>
                                                                <td class="text-left">'.$value['with_fname'].'</td>
                                                                <td class="text-left">'.$value['with_uname'].'</td>
								
                                                                <td class="text-left">'.$value['created_date'].'</td>
                                                                <td class="text-left">'.$value['who_updated'].'</td>
								<td class="text-left">'.$value['with_status_text'].'</td>
								<td class="text-center">'
									.
                                                                        form_open('withdrawmanage/del').anchor('withdraw/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('id',$value['id'] ).form_close()
//                                                                        form_open('withdrawmanage/del').anchor('withdraw/edit/'.$value['id'],'<i class="glyphicon glyphicon-pencil"></i>','class="btn btn-primary btn-sm"').' '.form_hidden('id',$value['id'] ). form_button($data).form_close()
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