<div class="row">
<div class="col-md-12">
	<div class="row">

        <div class="col-md-4">
            <div class="input-group input-group-lg">
            <span class="input-group-addon" id="basic-addon1">ลำดับที่</span>
            <input type="text" class="form-control" readonly="readonly" aria-describedby="basic-addon1">
            </div>
            <div style="height:15px;"></div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="basic-addon1">สมาชิก</span>
                <input type="text" class="form-control" placeholder="รหัสสมาชิก" aria-describedby="basic-addon1">
            </div>



        </div>
		
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="basic-addon1">วันที่</span>
                <input type="text" class="form-control" value="<?=date("d/m/Y");?>" aria-describedby="basic-addon1">
            </div>
        </div>
    

    </div>
<div style="height:15px;"></div>    
    <div class="row">
        <div class="col-md-6">
            
                <input type="button"   class="form-control" value="เลือกหนังสือ" data-toggle="modal" data-target="#login-modal" />
				 
        </div>
		<div class="col-md-6">
             <input type="button"   class="form-control" value="เลือกหนังสือ จากรายการจอง" data-toggle="modal" data-target="#booking-modal" />
			 
        </div>
    </div>
    <div style="height:15px;"></div>
</div>

   


<table width="100%" class="table table-striped table-bordered table-hover" id="tb_pang">
<thead>
	<tr class='alert alert-success'>
    <th width="80">ลำดับ</th>
    <th>รายการ</th>
    <th width="120">จำนวน</th>
	<th width="120">หยิบออก</th>
	</tr>
</thead>

<tbody id="body_datatable">
<!-- 
	<tr class="odd gradeX"  style="cursor:pointer;" >
	
		<td width="80">1</td>
        <td>xxxxxxx</td>
        <td width="120">1</td>
		
        <td  width="120" align='center'>
            <button type="button" class="btn btn-sm btn-danger" onclick="removeTempStore();">
			<span class="glyphicon glyphicon-trash"></span></button>
        </td>
    </tr>
	-->
</tbody>
</table>

 <center>
                <input type="hidden" id="book_id" name="book_id" value="<?=$data['book_id']?>"> 
                <input id="btn_borrow" name="btn_borrow" type="button" onclick="doBorrow();" value="ยืมหนังสือ" class="btn btn-primary">
				<input id="btn_return" name="btn_return" type="button" onclick="doReturn();" value="คืนหนังสือ" class="btn btn-warnning">
                <input id="btn_cancel" name="btn_cancel" type="button" value="ยกเลิก" class="btn btn-danger">&nbsp;&nbsp;
                
            </center>
       <script type="text/javascript">

var borrowItems = {}
var user_id = ""

// get book info by book id
function getItemInfo_by_book_id(book_id){
   
   $.post( "get_book_info.php?book_id=" + book_id, function( data ) {
    console.log(data.bookd_id);


});

}

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