
<div id="res"></div>
<div class="alert alert-error hide">
<button type="button" class="close" data-dismiss="alert">×</button>
<span>กรุณาป้อน ข้อมูลให้ครบ ด้วยครับ.</span>
</div>
<form name="frmAdd" id="frmAdd" method="post" enctype="multipart/form-data">
<table width="50%" border="0" align="center" cellpadding="3" cellspacing="3">

  <tr>
    <th align="right" valign="top">เลขประจำตัวประชาชน :</th>
    <td>
	<input name="user_id" id="user_id" type="hidden" id="user_id"  />
	<input name="identification" type="text" id="identification" size="13" lengthmax="13" autocomplete="off" class="span4" placeholder="รหัสประจำตัว"/></td>
  </tr>
  <tr>
    <th align="right" valign="top">ชื่อ :</th>
    <td><input name="firstn" type="text" class="span4" id="firstn" placeholder="ชื่อ" size="40"/></td>
  </tr>
  <tr>
    <th align="right" valign="top">นามสกุล :</th>
    <td><input name="lastn" type="text" class="span4" id="lastn" placeholder="นามสกุล" size="40"/></td>
  </tr>
  <tr>
    <th align="right" valign="top">โทรศัพท์ :</th>
    <td><input name="teln" type="text" class="span4" id="teln" placeholder="โทรศัพท์" size="40"/></td>
  </tr>
  <!-- <tr>
    <th align="right" valign="top">กลุ่มผู้ใช้งาน :</th>
    <td>
    <select class="span5" id="g_id" name="g_id">
        <option value="">-- กลุ่มผู้ใช้งาน --</option>
        <?php $opt = selects("tb_guser","where 1=1 order by g_id");
                foreach($opt as $v){
            ?>
        <option value="<?=$v["g_id"];?>"><?=$v["g_id"]."-".$v["g_name"];?></option>
        <?php
                }
            ?>
        </select>
    </td>
    </tr> -->
  <tr>
    <td colspan="2" align="center"><input type="button" name="save" id="save" value="ปรับปรุง" class="btn btn-success span2">
      &nbsp; <input type="button" name="cancel" id="cancel" value="ยกเลิก" class="btn span2"></td>
  </tr>
</table>
<input name="h_val_id" type="hidden" id="h_val_id" value="">
</form>
<br />
<table width="100%" class="table table-striped table-bordered table-hover" id="tb_pang">
<thead>
	<tr class='alert alert-success'>
		<th style="width:8px;"><!-- input type="checkbox" class="group-checkable" data-set="#tb_pang .checkboxes" -->เลือก</th>
    <th>เลขประจำตัวประชาชน</th>
    <th>ชื่อ</th>
    <th>นามสกุล</th>
		<th width="50">แก้ไข</th>
		<th width="50">ลบ</th>
	</tr>
</thead>
<tbody>
<?PHP
	$sql=selects("tb_user un","order by un.firstname");
	foreach($sql as $data){
    $val = $data['identification']."|".$data['firstname']."|".$data['lastname']."|".$data['u_tel']."|".$data['g_id'];
?>
	<tr class="odd gradeX"  style="cursor:pointer;" src="<?=$data['user_id'];?>">
		<td><input type="checkbox" name="chk[]" class="checkboxes" value="<?=$data['user_id'];?>" /></td>
		<td><?=$data['identification'];?></td>
    <td><?=$data['firstname'];?></td>
    <td><?=$data['lastname'];?></td>
		<td align='center'><a href="javascript:void(0)" id='edit' value="<?=$data['user_id'];?>" name="<?=$val;?>"><i class="icon-edit"></i> แก้ไข</a></td>
		<td align='center'><a href="javascript:void(0)" id='del' value="<?=$data['user_id'];?>"><i class="icon-trash"></i> ลบ</a></td>
	</tr>
<?PHP
	}
?>
</tbody>
</table>
<script type="text/javascript">
$(function(){
	$("a[id='edit']").click(function(){
				var user_id = $(this).attr('value');
				
				var data = $(this).attr('name').split("|");
                $("#h_val_id").val(user_id);
                $("#identification").val(data[0]);
                $("#firstn").val(data[1]);
                $("#lastn").val(data[2]);
                $("#teln").val(data[3]);
                $("#g_id").val(data[4]);
              //  console.log($(this).attr('name'));
	});

	$("a[id='del']").click(function(){
				var selectedItems = new Array(); //สร้าง Array เพื่อเก็บข้อมูล Checkbox
				var user_id = $(this).attr('value'); //Id ของ แถวที่ต้องการลบ
				$("input[name='chk[]']:checked").each(function() {selectedItems.push($(this).val());}).get().join(",");

				if(selectedItems != ''){
					if(confirm('คุณต้องการลบข้อมูลที่เลือกหรือไม่ ?')==true){
					$.post('action.php?op=del_user_all',{'user_id':selectedItems},function(data){
						$("#res").html(data);
					});
					}else{
						return false;
					}
				}else{
				if(confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่ ?')==true){
				$.post('action.php?op=del_user',{'user_id':user_id},function(data){
					$("#res").html(data);
				});
				}else{
					return false;
				}
				}
				$('#frmAdd').trigger("reset");
				$('#frmAdd')[0].reset();
	});

    $('#frmAdd input:text, input:password, textarea, select').blur(function(){
          var check = $(this).val();
          if(check == ''){
                $(this).css({'background-color':'#FFC0C0'});
          }else{
                $(this).css({'background-color':'#FFFFFF'});
          }
       });

	$("#save").live('click',function(){
		
        $('#frmAdd input:text, input:password, textarea, select').each(function(index, obj){
         if($(obj).val().length === 0) {
            $(obj).css({'background-color':'#FFC0C0'});
         }else{
            $(obj).css({'background-color':'#FFFFFF'});
         }
         });

		if( $('#firstn').val().length == 0 || $('#lastn').val().length == 0 ){
			$('.alert-error').fadeIn(1000);
			return false;
		}else{
			$('.alert-error').fadeOut(1000);
		var chk_mt = $("#h_val_id").val();
		
		if(chk_mt == ''){
			$.post('action.php?op=add_user',$("#frmAdd").serialize(),function(data){
				$("#res").html(data);
			});
			$('#frmAdd').trigger("reset");
			$('#frmAdd')[0].reset();
		}else{
			var hid = $("#h_val_id").val();
			//alert(hid);
			
			$.post('action.php?op=edit_user',$("#frmAdd").serialize(),function(data){
				//$("#res").html(data);
			});
			$('#frmAdd').trigger("reset"); //แบบนี้จะเคลียร์ input hidden ด้วย
			$('#frmAdd')[0].reset();
		}
		}
	});

	$("#cancel").click(function(){
		parent.location.reload();
	});

	var oTable = $('#tb_pang').dataTable({
            "aLengthMenu": [
                [50,100,150,300,500,1000, -1],
                [50,100,150,300,500,1000, "ทั้งหมด"]
            ],

            "iDisplayLength": 50,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
				"sProcessing": "กำลังประมวลผล...",
                "sLengthMenu": "แสดง _MENU_ รายการ",
                "sZeroRecords": "<font color='red'><center>ไม่พบข้อมูลที่คุณต้องการ ค้นหา</center></font>",
                "sEmptyTable": "<font color='red'><center>ไม่มีข้อมูลในตาราง</center></font>",
                "sLoadingRecords": "Loading...",
                "sInfo": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                "sInfoFiltered": "(ค้นหา จากทั้งหมด _MAX_ รายการ)",
				"sSearch": "ค้นหา:",
                "oPaginate": {
                    "sFirst":    "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext":     "ถัดไป",
                    "sLast":     "หน้าสุดท้าย"
                }
            },
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
                //"aaSorting":[[0, "asc"]]
            }]
        });
	//new FixedHeader(oTable);

});
</script>
