 <?php
 $data = select("tb_book", "where book_id='".@$_GET['book_id']."'");
 
 ?>
 
 
 
 
      <form name="frm_add" action="admin_update_book_action.php" onsubmit="return false;" id="frm_add" method="post" enctype="multipart/form-data">
            

                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
                    <tbody>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">ISBN : </th>
                            <td width="20%" valign="middle">
                                <input name="isbn" type="text" class="wt ac_input" id="isbn" placeholder="999-999-9999-99-9" 
                                placeholder="ISBN" autocomplete="off" value="<?=$data['isbn']?>" required="required"></td>
                            <th width="10%" align="right" valign="top">ชื่อหนังสือ: </th>
                            <td width="20%" valign="middle">
							<input type="text" name="bookname" id="bookname" class="wt" placeholder="ชื่อหนังสือ " value="<?=$data['bookname']?>"></td>
                            <th width="10%" align="right" valign="top">ชื่อผู้แต่ง : </th>
                            <td width="20%" valign="top">
							<input type="text" name="author" id="author" class="wt" placeholder="ชื่อผู้แต่ง  " value="<?=$data['author']?>"></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">จังหวัดที่พิมพ์ : </th>
                            <td width="20%" valign="middle">
							
							<input name="publisher" type="text" class="wt ac_input" 
							id="publisher" placeholder="จังหวัดที่พิมพ์" 
							autocomplete="off" value="<?=$data['publisher']?>">
							
							
							</td>
                            
							
							<th width="10%" align="right" valign="top">สำนักพิมพ์: </th>
                            <td width="20%" valign="middle">
							<input type="text" name="publish_location" id="publish_location" class="wt" placeholder="สำนักพิมพ์ " value="<?=$data['publish_location']?>"></td>
                            <th width="10%" align="right" valign="top">ปีที่พิมพ์ : </th>
                            <td width="20%" valign="top">
							<input type="text" name="publish_year" id="publish_year" class="wt" placeholder="ปีที่พิมพ์  " value="<?=$data['publish_year']?>">
							</td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">พิพม์ครั้งที่ : </th>
                            <td width="20%" valign="middle">
							<input name="edition" type="number" class="wt ac_input" id="edition" maxlength="4" placeholder="พิพม์ครั้งที่" autocomplete="off"></td>
                            <th width="10%" align="right" valign="top">จำนวน/เล่ม: </th>
                            <td width="20%" valign="middle">
							<input type="text" name="copy" id="copy" class="wt" placeholder="จำนวน/เล่ม " value="<?=$data['copy']?>"></td>
                            <th width="10%" align="right" valign="top"> </th>
                            <td width="20%" valign="top"></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">หมวดหนังสือ : </th>
                            <td width="20%" valign="middle">
                                <select class="" id="category_id" name="category_id"  >
                                    <option value="">-- เลือกหมวดหนังสือ --</option>
                                    <?php foreach (selects('tb_category', '') as $key => $cate): ?>
                                        <option value="<?= $cate['category_id'] ?>"><?= $cate['category_name'] ?></option>
                                    <?php endforeach; ?>
                                 
                                </select>
                            </td>
                            <th width="10%" align="right" valign="top"> </th>
                            <td width="20%" valign="middle">
                                
                            </td>
                            <th width="10%" align="right" valign="top">รูปหนังสือ: </th>
                            <td width="20%" valign="top" rowspan="4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
								
								
                                     <img width="150" src="../img/books/<?=$data['cover']?>" alt="<?=$data['bookname']?>" />
									
                                    <div>
                                        <span class="btn btn-default btn-file">
											<span class="fileinput-new">เลือกรูป</span>
											<span class="fileinput-exists">เปลี่ยน</span>
												<input type="file" name="Uploadfile">
											</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">ราคา : </th>
                            <td width="20%" valign="middle"><input name="cover_price" type="number" class="wt ac_input" id="cover_price" value="<?=$data['cover_price'];?>" placeholder="ราคา" autocomplete="off"></td>
                            <th width="10%" align="right" valign="top">ประเภทหนังสือ: </th>
                            <td width="20%" valign="top" colspan="2"> 
                                <span class="inline pull-left"style="margin-right: 5px" >
                                    <select name="is_ebook" onchange="showSelectFile(this.value)">
                                        <option value="1" <?=($data['is_ebook']=="1") ? "selected":"" ?>>หนังสือเล่ม</option>
                                        <option value="3" <?=($data['is_ebook']=="3") ? "selected":"" ?>>E-Book</option>
                                        <option value="4" <?=($data['is_ebook']=="4") ? "selected":"" ?>>CD-DVD</option>
                                        <option value="5" <?=($data['is_ebook']=="5") ? "selected":"" ?>>สื่ออื่นๆ</option>
                                    </select>
                                </span>
                                <span class="inline pull-left hidden" id="selectFile">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="file_name"></span>
                                        <span class="fileinput-filename"></span>
                                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                    </div>
                                </span>

                            </td>                            
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">คำค้นหา : </th>
                            <td width="20%" colspan="4" valign="middle">
							<textarea rows="4" style="width:550px" class="wt ac_input" name="keyword" id="keyword" placeholder="ระบุเลขที่ keyword ชื่อหนังสือ หากต้องการเพิ่มหลาย keyword ให้คั่นด้วยเครื่องหมาย (,) ตัวอย่าง (keyword,keyword,keyword)"><?=$data['bookname']?></textarea></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top">สถานะ</th>
                            <td>
                                <select class="span3" id="status" name="status">
                                    <option value="">-- เลือกสถานะ --</option>
                                    <option value="1" <?=($data['status']=="1") ? "selected":"" ?>>อยู่บนชั้นหนังสือ</option>
                                    <option value="2" <?=($data['status']=="2") ? "selected":"" ?>>ถูกยืม</option>
                                    <option value="3" <?=($data['status']=="3") ? "selected":"" ?>>ซ่อมแซม</option>
                                    <option value="4" <?=($data['status']=="4") ? "selected":"" ?>>จำหน่าย</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            
            <br>
            <center>
                <input type="hidden" id="book_id" name="book_id" value="<?=$data['book_id']?>"> 
                <input id="btn_saved" name="btn_saved" type="button" onclick="doSubmit();" value="บันทึกข้อมูล" class="btn btn-primary">
                <input id="btn_cancel" name="btn_cancel" type="button" value="ยกเลิก" class="btn btn-danger">&nbsp;&nbsp;
                
            </center>
        </form>
 
 <script>
 function doSubmit(){
	 
	 var c = confirm("ต้องการบันทึกข้อมูลใช่หรือไม่");
	 if(c == true){
		document.getElementById('frm_add').onsubmit = '' ; 
		document.getElementById('frm_add').submit() ; 
	 }else{
		 document.getElementById('frm_add').onsubmit = 'return false;' ; 
	 }
	 
	 
	 
 }
 </script>