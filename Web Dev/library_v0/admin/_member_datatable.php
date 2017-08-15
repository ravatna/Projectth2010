<div class="row">
<div class="col-md-8">
	<a class="btn btn-lg btn-primary" href="admin_update_member.php"><span class="glyphicon glyphicon-plus"></span>เพิ่มรายการ</a>
	     <a class="btn btn-lg btn-primary" onclick="printCard();" href="#" ><span class="glyphicon glyphicon-print"></span> พิมพ์ บัตร</a>

</div>

 
</div>
   
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
	$sql=selects("tb_user un where g_id = 1 ","order by un.firstname");
	foreach($sql as $data){
    
?>
	<tr class="odd gradeX"  style="cursor:pointer;" >
		<td><input type="checkbox" class="chks" value="<?=$data['user_id'];?>" /></td>
		<td><?=$data['identification'];?></td>
        <td><?=$data['firstname'];?></td>
        <td><?=$data['lastname'];?></td>
		<td align='center'>
                            
                            </td>
                        <td align='center'>
                            <a class="btn btn-sm btn-danger" href="admin_update_member_del.php?book_id=<?= $data['book_id']; ?>"><span class="glyphicon glyphicon-trash"></a>
                            </td>
	</tr>
<?PHP
	}
?>
</tbody>
</table>
       <script type="text/javascript">

        function printCard() {
            var vstr = "";
           $(".chks").each(function(i,e){ 
               if(e.checked == true){
                   vstr += e.value + "|";
               }
                //console.log(e.value);
                
            });

            window.open("admin_member_card.php?members=" + vstr);
        }

</script>