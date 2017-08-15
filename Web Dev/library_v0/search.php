<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td  valign="top">
	<?PHP
	if($sett['sett_qr'] == 'on'){
	?>
    <div style="width: 350px; height: 350px;" id="qrcodebox"></div>
    <br />
    <center>
    <input type="button" value="เริ่ม" id="btn_start" class="btn btn-info"/> 
    <input type="button" value="หยุด" id="btn_stop" class="btn btn-danger"/>
    </center>
	<?PHP
	 }else{	
	?>
	
	<?PHP
	}	
	?>
    </td>
    <td align="left" valign="top">
    <select class="" id="category_id" name="category_id" onchange="showState(this.value)">
                                    <option value="">-- เลือกหมวดหนังสือ --</option>
                                    <?php foreach (selects('tb_category', '') as $key => $cate): ?>
                                        <option value="<?= $cate['category_id'] ?>"><?= $cate['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select><br/>
                                <select class="" id="sub_category_id" name="sub_category_id" onchange="showState2(this.value)">
                                    <option value="">-- เลือกหมวดย่อยหนังสือ --</option>
                                </select>
								<br/>
								<input type="text" name="txt_isbn" id="txt_isbn" value="" placeholder="เลขที่ ISBN..." />
								<br/>
								<input type="text" name="txt_bookname" id="txt_bookname" value="" placeholder="ชื่อหนังสือ..." />
								<br/>
								<input type="text" name="txt_author" id="txt_author" value="" placeholder="ชื่อผู้แต่ง..." />
								
								
								<!--
    <textarea class="wtt" id="txt_po" name="txt_po" rows="3" placeholder="ระบุเลขที่ ISBN ชื่อหนังสือ หรือชื่อผู้แต่ง ในการสืบค้น และตรวจสอบสถานะเอกสาร หากต้องการสืบค้นหลาย keyword ให้คั่นด้วยเครื่องหมาย (,) ตัวอย่าง (00000001,ชื่อหนังสือ,ชื่อผู้แต่ง)"></textarea>
	-->
	
	<br/>
    &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="btn_search" id="btn_search" value="สืบค้นหนังสือ" class="btn btn-warning">
    </td>
  </tr>
</table>
<br>
<h4>รายการหนังสือที่สืบค้น</h4>
<div id="callBack" class="well"></div>
<script>
	function showState(str)
    {
        xmlhttp = GetXmlHttpObject();
        if (xmlhttp == null)
        {
            alert("Browser does not support HTTP Request");
            return;
        }
        var url = "sub_category.php";
        url = url + "?category=" + str;
        url = url + "&sid=" + Math.random();
        xmlhttp.onreadystatechange = stateChanged;
        xmlhttp.open("GET", url, true);
        xmlhttp.send(null);
    }

    function stateChanged()
    {
        if (xmlhttp.readyState == 1)
        {
            document.getElementById("sub_category_id").innerHTML = "<option selected=\"selected\">...Searching....</option><img src=\"img/ico/spinner.gif\" />";
        }
        if (xmlhttp.readyState == 4)
        {
            document.getElementById("sub_category_id").innerHTML = xmlhttp.responseText;
        }
    }

    function GetXmlHttpObject()
    {
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            return new XMLHttpRequest();
        }
        if (window.ActiveXObject)
        {
            // code for IE6, IE5
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
        return null;
    }
	$('document').ready(function(){
		$("#callBack").html("<center><font color='red'>ยังไม่มีรายการ</font></center>");
		$('#qrcodebox').WebcamQRCode({
			delay : 5000,
			messageNoFlash : "ตรวจสอบไม่พบ Flash Player Plungin บนคอมพิวเตอร์เครื่องนี้ กรุณาติดต่อห้องคอมฯ",
			webcamStopContent : "หยุดการอ่าน QR Code",
			onQRCodeDecode: function(data){
				$('#txt_bookname').append(data+',');
				var prd_order = $('#txt_bookname').val();
				if(prd_order != ""){
					$.post('action.php?op=search_po',{'prd_order':prd_order},function(data){
						$("#callBack").html(data);
					});				
				}
			}
		});
		
		$('#btn_start').click(function(){
			$('#qrcodebox').WebcamQRCode().start();
		});
		
		$('#btn_stop').click(function(){
			$('#qrcodebox').WebcamQRCode().stop();
		});
		
		$("#btn_search").on('click',function(){
			var prd_order = $('#txt_po').val();
			var txt_isbn = $('#txt_isbn').val();
			var txt_bookname = $('#txt_bookname').val();
			var txt_author = $('#txt_author').val();
			console.log($("#category_id").val());
				if((txt_isbn != "")||(txt_bookname != "")||(txt_author != "")||($("#category_id").val()!="")||($("#sub_category_id").val()!="")){
					
					$.post('action.php?op=search_po',
					{'txt_isbn':txt_isbn,
					'txt_isbn':txt_bookname,
					'txt_author':txt_author,
					'category_id':$("#category_id").val(),
					'sub_category_id':$("#sub_category_id").val()},
					function(data){
						$("#callBack").html(data);
					});				
				}	
		});
	});
	
        function selectbook()
        {
            //alert();
        }
        $("a[id='select-book']").click(function () {
            //alert();
        });
</script>