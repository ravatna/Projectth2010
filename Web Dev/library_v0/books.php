<div id="res"></div>
<div class="alert alert-error hide">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <span>กรุณาป้อน ข้อมูลให้ครบ ด้วยครับ.</span>
</div>
<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
    <div id="tabs-1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <form name="frm_add" id="frm_add" method="post" enctype="multipart/form-data">
            <div class="ui-toolbar">
                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
                    <tbody>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">ISBN : </th>
                            <td width="20%" valign="middle">
                                <input name="isbn" type="text" class="wt ac_input" id="isbn" data-mask="999-999-9999-99-9" placeholder="ISBN" autocomplete="off"></td>
                            <th width="10%" align="right" valign="top">ชื่อหนังสือ: </th>
                            <td width="20%" valign="middle"><input type="text" name="bookname" id="bookname" class="wt" placeholder="ชื่อหนังสือ "></td>
                            <th width="10%" align="right" valign="top">ชื่อผู้แต่ง : </th>
                            <td width="20%" valign="top"><input type="text" name="author" id="author" class="wt" placeholder="ชื่อผู้แต่ง  "></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">จังหวัดที่พิมพ์ : </th>
                            <td width="20%" valign="middle"><input name="publisher" type="text" class="wt ac_input" id="publisher" placeholder="จังหวัดที่พิมพ์" autocomplete="off"></td>
                            <th width="10%" align="right" valign="top">สำนักพิมพ์: </th>
                            <td width="20%" valign="middle"><input type="text" name="publish_location" id="publish_location" class="wt" placeholder="สำนักพิมพ์ "></td>
                            <th width="10%" align="right" valign="top">ปีที่พิมพ์ : </th>
                            <td width="20%" valign="top"><input type="text" name="publish_year" id="publish_year" class="wt" placeholder="ปีที่พิมพ์  "></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">พิพม์ครั้งที่ : </th>
                            <td width="20%" valign="middle"><input name="edition" type="number" class="wt ac_input" id="edition" maxlength="4" placeholder="พิพม์ครั้งที่" autocomplete="off"></td>
                            <th width="10%" align="right" valign="top">จำนวน/เล่ม: </th>
                            <td width="20%" valign="middle"><input type="text" name="copy" id="copy" class="wt" placeholder="จำนวน/เล่ม "></td>
                            <th width="10%" align="right" valign="top"> </th>
                            <td width="20%" valign="top"></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">หมวดหนังสือ : </th>
                            <td width="20%" valign="middle">
                                <select class="" id="category_id" name="category_id" onchange="showState(this.value)">
                                    <option value="">-- เลือกหมวดหนังสือ --</option>
                                    <?php foreach (selects('tb_category', '') as $key => $cate): ?>
                                        <option value="<?= $cate['category_id'] ?>"><?= $cate['category_name'] ?></option>
                                    <?php endforeach; ?>
                                    <?php if ($_SESSION['is_librarian'] == TRUE): ?>
                                        <option value="add_cat">เพิ่มหมวดหนังสือ....</option>
                                    <?php endif; ?>
                                </select>
                            </td>
                            <th width="10%" align="right" valign="top">หมวดย่อยหนังสือ: </th>
                            <td width="20%" valign="middle">
                                <select class="" id="sub_category_id" name="sub_category_id" onchange="showState2(this.value)">
                                    <option value="">-- เลือกหมวดย่อยหนังสือ --</option>
                                </select>
                            </td>
                            <th width="10%" align="right" valign="top">รูปหนังสือ: </th>
                            <td width="20%" valign="top" rowspan="4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file">
											<span class="fileinput-new">เลือกรูป</span>
											<span class="fileinput-exists">เปลี่ยน</span>
												<input type="file" name="Uploadfile">
											</span>
											
										<span class="btn btn-sm btn-warning" onclick="saveImage();">ภาพจากกล้อง</span>

                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบ</a>
										
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top" c="">ราคา : </th>
                            <td width="20%" valign="middle"><input name="cover_price" type="number" class="wt ac_input" id="cover_price" placeholder="ราคา" autocomplete="off"></td>
                            <th width="10%" align="right" valign="top">ประเภทหนังสือ: </th>
                            <td width="20%" valign="top" colspan="2"> 
                                <span class="inline pull-left"style="margin-right: 5px" >
                                    <select name="is_ebook" onchange="showSelectFile(this.value)">
                                        <option value="0">ปกแข็ง</option>
                                        <option value="1">หนังสืออิเล็กทรอนิกส์</option>
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
                            <td width="20%" colspan="4" valign="middle"><textarea row="3" class="wt ac_input" name="keyword" id="keyword" placeholder="ระบุเลขที่ keyword ชื่อหนังสือ หากต้องการเพิ่มหลาย keyword ให้คั่นด้วยเครื่องหมาย (,) ตัวอย่าง (keyword,keyword,keyword)"></textarea></td>
                        </tr>
                        <tr>
                            <th width="12%" align="right" valign="top">สถานะ</th>
                            <td>
                                <select class="span3" id="status" name="status">
                                    <option value="">-- Status --</option>
                                    <?php foreach (dataStatus() as $key => $status): ?>
                                        <option value="<?= $key ?>"><?= $status ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <center>
                <input type="hidden" id="h_val_id" name="h_val_id">
                <!-- input type="button" name="btn_upload" id="btn_upload" value="อัพโหลด Excel" class="btn btn-warning" -->
                <input id="btn_saved" name="btn_saved" type="button" value="บันทึกข้อมูล" class="btn btn-primary">
                <input id="btn_cancel" name="btn_cancel" type="button" value="ยกเลิก" class="btn btn-danger">
            </center>
        </form>

        <br>
        <br>
        <br>
		
		
        <table width="100%" class="table table-striped table-bordered table-hover">
            <thead>
                <tr class='alert alert-success'>
                    <th style="width:8px;"><!-- input type="checkbox" class="group-checkable" data-set="#tb_pang .checkboxes" -->เลือก</th>
                    <th>รูป</th>
                    <th>ISBN</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ปี่ที่พิมพ์</th>
                    <th>ครั้งทีพิมพ์</th>
                    <th>รายละเอียด</th>
                    <th>ผู้แต่ง</th>
                    <th>ประเภท</th>
                    <th>จำนวน</th>
                    <th>จำนวนที่ยืม</th>
                    <th>Status</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                $page = (int) (!isset($_GET["subpage"]) ? 1 : $_GET["subpage"]);
                $limit = 50;
                $startpoint = ($page * $limit) - $limit;
                $statement = "tb_book  where 1=1 order by category_id asc";
                $cont = "SELECT *  FROM {$statement} LIMIT {$startpoint} , {$limit}";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
                while ($data = mysql_fetch_array($query)) {
                    $val = $data['isbn'] . "@" . $data['bookname'] . "@" . $data['author'] . "@" . $data['publisher'] . "@" . $data['publish_location'] . "@" . $data['publish_year'] . "@" . $data['edition'] . "@" . $data['copy'] . "@" . $data['category_id'] . "@" . $data['sub_category_id'] . "@" . $data['cover_price'] . "@" . $data['is_ebook'] . "@" . $data['keyword'] . "@" . $data['status'];
                    ?>
                    <?php 
                            if(!empty($data['cover'])){
                                $path = 'img/books/'.$data['cover'];
                            }else{
                                $path = 'img/default.png';
                            }
                        ?>
                    <tr style="cursor:pointer;" src="<?= $data['book_id']; ?>">
                        <td><input type="checkbox" class="aa" name="chk[]" class="checkboxes" value="<?= $data['book_id']; ?>" /></td>
                        <td align="center" valign="middle"><a href="main.php?page=book_detail&b_no=<?= $data['book_id']; ?>"><img title="คลิกดูรายละเอียด" width="100" src='<?= $path?>'></a></td>
                        <td><?= $data['isbn']; ?></td>
                        <td><?= $data['bookname']; ?></td>
                        <td><?= $data['publish_year']; ?></td>
                        <td><?= $data['edition']; ?></td>
                        <td><?= $data['keyword']; ?></td>
                        <td><?= $data['author']; ?></td>                                                
                        <td><?= databooktype($data['is_ebook']); ?></td>
                        <td><?= $data['copy']; ?></td>
                        <td><?= num_rows("tb_borrow_btl br_b inner join tb_borrow br on br_b.br_no=br.br_no", "where book_id =$data[book_id] and is_return IS NULL AND br.is_borrow='1'"); ?> เล่ม</td>
                        <td style="background-color:<?= $data['row_color']; ?>;"><?= dataStatus(check_status($data['book_id'])) ?></td>
                        <td align='center'><a href="javascript:void(0)" id='edit' value="<?= $data['book_id']; ?>" name="<?= $val; ?>"><i class="icon-edit"></i> แก้ไข</a></td>
                        <td align='center'><a href="javascript:void(0)" id='del' value="<?= $data['book_id']; ?>"><i class="icon-trash"></i> ลบ</a></td>
                    </tr>
                    <?PHP
                }
                ?>
            </tbody>
        </table>
        <center>
            <?PHP
            echo guPagination($statement, $limit, $page, $url = '?page=books&');
            ?>
        </center>
    </div>
</div>
<div class="modal fade" id="md-cat-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหนังสือ</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-error hide" id="alert-category">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <span>กรุณาป้อน ข้อมูลให้ครบ ด้วยครับ.</span>
                </div>
                <form id="frm-cat">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">รหัสหมวดหนังสือ:</label>
                        <input type="text" class="form-control" name="category_id" id="category_id">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">ชื่อหมวดหนังสือ:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" id="btn-save-cat">บันทึก</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="md-subcat-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหนังสือ</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-error hide" id="alert-sub-category">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <span id="alert-sub-category-text">กรุณาป้อน ข้อมูลให้ครบ ด้วยครับ.</span>
                </div>
                <form id="frm-sub-cat">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">ชื่อหมวดหนังสือ:</label>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <span id="category-text"></span>
                                <input type="hidden" class="form-control" name="category_id" id="category_id2" readonly="">
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">รหัสหมวดหนังสือ:</label>
                        <input type="text" class="form-control" name="sub_category_id" id="sub_category_id2">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">ชื่อหมวดหนังสือ:</label>
                        <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" width="100%">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" id="btn-save-sub-cat">บันทึก</button>
            </div>
        </div>
    </div>
</div>
<br />

<script type="text/javascript">
    
    function showSelectFile(str)
    {
        if (str == 1) {

            $("#selectFile").removeClass('hidden')
        } else {
            $("#selectFile").addClass('hidden')
        }
    }
    var xmlhttp;
    function showState2(str) {
        if (str=='add'){
            $("#category-text").text($("#category_id :selected").text());
            $("#category_id2").val($("#category_id :selected").val());

            $('#md-subcat-add').modal('show');
        }

    }
    function showState(str)
    {
        if (str == 'add_cat') {
            category_add()
            return false;
        }
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
    function category_add()
    {
        $('#md-cat-add').modal('show');
    }
    $(function () {
         $('#copy,#cover_price,#publish_year,#edition').live('keyup', function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
        $("a[id='edit']").click(function () {
            var user_id = $(this).attr('value');
            var data = $(this).attr('name').split("@");
            showState(data[8])
            console.log(data);
            $("#h_val_id").val(user_id);
            $("#isbn").val(data[0]);
            $("#bookname").val(data[1]);
            $("#author").val(data[2]);
            $("#publisher").val(data[3]);
            $("#publish_location").val(data[4]);
            $("#publish_year").val(data[5]);
            $("#edition").val(data[6]);
            $("#copy").val(data[7]);
            $("#category_id").val(data[8]);
            $("#sub_category_id").val(data[9]);
            $("#cover_price").val(data[10]);
            $("#is_ebook").val(data[11]);
            $("#keyword").val(data[12]);
            $("#status").val(data[13]);

        });

        $("a[id='del']").click(function () {
            var selectedItems = new Array(); //สร้าง Array เพื่อเก็บข้อมูล Checkbox
            var book_id = $(this).attr('value'); //Id ของ แถวที่ต้องการลบ
            $("input[name='chk[]']:checked").each(function () {
                selectedItems.push($(this).val());
            }).get().join(",");

            if (selectedItems != '') {
                if (confirm('คุณต้องการลบข้อมูลที่เลือกหรือไม่ ?') == true) {
                    $.post('action.php?op=del_books_all', {'book_id': selectedItems}, function (data) {
                        $("#res").html(data);
                    });
                } else {
                    return false;
                }
            } else {
                if (confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่ ?') == true) {
                    $.post('action.php?op=del_book', {'book_id': book_id}, function (data) {
                        $("#res").html(data);
                    });
                } else {
                    return false;
                }
            }
            $('#frm_add').trigger("reset");
            $('#frm_add')[0].reset();
        });

        $('#frm_add input:text, input:password, textarea,select').blur(function () {
            var check = $(this).val();
            if (check == '') {
                $(this).css({'background-color': '#FFC0C0'});
            } else {
                $(this).css({'background-color': '#FFFFFF'});
            }
        });

        $("#btn_saved").on('click', function () {

            $('#frm_add input:text, input:password, textarea, select').each(function (index, obj) {
                if ($(obj).val().length === 0) {
                    $(obj).css({'background-color': '#FFC0C0'});
                } else {
                    $(obj).css({'background-color': '#FFFFFF'});
                }
                $('input#isbn').css({'background-color': '#FFFFFF'});
                $('input#keyword').css({'background-color': '#FFFFFF'});
            
            });            
            if ($('#bookname').val().length == 0 || $('#author').val().length == 0 || $('#publisher').val().length == 0 || $('#publish_location').val().length == 0 || $('#edition').val().length == 0 || $('#copy').val().length == 0 || $('#category_id').val().length == 0 || $('#sub_category_id').val().length == 0 || $('#cover_price').val().length == 0 || $('#status').val().length == 0) {
                $('.alert-error').fadeIn(1000);
                return false;
            } else {
                $('.alert-error').fadeOut(1000);
                var chk_mt = $("#h_val_id").val();
                if (chk_mt == '') {
                    console.log('add');
                    var $form = new FormData($("#frm_add")[0]);
                    $.ajax({
                        url: "action.php?op=add_book", // Url to which the request is send
                        type: "POST", // Type of request to be send, called as method
                        data: $form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false, // To send DOMDocument or non processed data file it is set to false
                        success: function (data)   // A function to be called if request succeeds
                        {
                            $("#res").html(data);
                            //$('#frm_add').trigger("reset");
                            //$('#frm_add')[0].reset();
                        }
                    });
                } else {
                    console.log('edit');
                    var hid = $("#h_val_id").val();
                    var $form = new FormData($("#frm_add")[0]);
                    $.ajax({
                        url: "action.php?op=edit_book", // Url to which the request is send
                        type: "POST", // Type of request to be send, called as method
                        data: $form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false, // To send DOMDocument or non processed data file it is set to false
                        success: function (data)   // A function to be called if request succeeds
                        {
                            $("#res").html(data);
                            //$('#frm_add').trigger("reset");
                            //$('#frm_add')[0].reset();
                        }
                    });
//                    $.post('action.php?op=edit_book', $("#frm_add").serialize(), function (data) {
//                        $("#res").html(data);
//                    });
//                    $('#frm_add').trigger("reset"); //แบบนี้จะเคลียร์ input hidden ด้วย
//                    $('#frm_add')[0].reset();
                }
            }            
        });

        $("#btn_cancel").click(function () {
            parent.location.reload();
        });
        $("#btn-save-cat").on("click", function () {

            if ($('#category_name').val().length == 0) {
                $('#alert-category').fadeIn(1000);
                return false;
            }
            $(this).attr('disabled', '')
            $.ajax({
                url: "action.php?op=save_cat", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: $("#frm-cat").serialize(),
                dataType: "json",
                success: function (data)   // A function to be called if request succeeds
                {
                    $("#btn-save-cat").removeAttr('disabled')
                    if (data.r == true) {
                        $("#md-cat-add").modal('hide')
                        $("#category_id option:last").before("<option value=" + data.data[0] + ">" + data.data[1] + "</option>");
                    } else {
                        $("#alert-sub-category").text(data.data)
                    }

                }
            });
        });
        $("#btn-save-sub-cat").on("click", function () {
            alert($('#sub_category_name').val().length)
            if ($('#sub_category_id2').val().length == 0 || $('#sub_category_name').val().length == 0) {
                $('#alert-sub-category').fadeIn(1000);
                return false;
            }
            $(this).attr('disabled', '')
             $('#alert-sub-category').fadeOut(1000);
            $.ajax({
                url: "action.php?op=save_sub_cat", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: $("#frm-sub-cat").serialize(),
                dataType: "json",
                success: function (data)   // A function to be called if request succeeds
                {
                    console.log(data);
                    $("#btn-save-sub-cat").removeAttr('disabled')
                    if (data.r == true) {
                        $("#sub_category_id option:last").before("<option value=" + data.data[0] + ">" + data.data[1] + "</option>");
                        $("#md-subcat-add").modal('hide')
                    } else {
                        $('#alert-sub-category').fadeIn(1000);
                        $("#alert-sub-category").text(data.data)
                    }

                }
            });
        });
    });
	
	//////////////////////////////////////////////
/*	function saveImage() {
    var canvasData = canvas.toDataURL("image/png");
    var xmlHttpReq = false;       
    if (window.XMLHttpRequest) {
        ajax = new XMLHttpRequest();
    }

    else if (window.ActiveXObject) {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
    }
   ajax.open('POST', 'testSave.php', false);
   ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   ajax.onreadystatechange = function() {
        console.log(ajax.responseText);
    }
   ajax.send("imgData="+canvasData);
} */

console.clear();

(function(){

 
  
navigator.getUserMedia  = navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia;

if ( !navigator.getUserMedia ) { return false; }
  
  var width = 0, height = 0;
  
  var canvas = document.createElement('canvas'),
      ctx = canvas.getContext('2d');
  document.body.appendChild(canvas);
  
  var video = document.createElement('video'),
      track;
  video.setAttribute('autoplay',true);
  
  window.vid = video;
  
  function getWebcam(){ 
  
    navigator.getUserMedia({ video: true, audio: false }, function(stream) {
      video.src = window.URL.createObjectURL(stream);
      track = stream.getTracks()[0];
    }, function(e) {
      console.error('Rejected!', e);
    });
  }
  
  getWebcam();
  
  var rotation = 0,
      loopFrame,
      centerX,
      centerY,
      twoPI = Math.PI * 2;
  
  function loop(){
    
    loopFrame = requestAnimationFrame(loop);
    
    //ctx.clearRect(0, 0, width, height);
    
    // ctx.globalAlpha = 0.005;
    // ctx.fillStyle = "#FFF";
    // ctx.fillRect(0, 0, width, height);
    
    ctx.save();
    
    
    // ctx.beginPath();
    // ctx.arc( centerX, centerY, 140, 0, twoPI , false);
    // //ctx.rect(0, 0, width/2, height/2);
    // ctx.closePath();
    // ctx.clip();
    
    //ctx.fillStyle = "#FFF";
    //ctx.fillRect(0, 0, width, height);
    
    // ctx.translate( centerX, centerY );
    // rotation += 0.005;
    // rotation = rotation > 360 ? 0 : rotation;
    // ctx.rotate(rotation);
    // ctx.translate( -centerX, -centerY );
    
    ctx.globalAlpha = 0.1;
    ctx.drawImage(video, 0, 0, width, height);
    
    ctx.restore();

  }
  
  function startLoop(){ 
    loopFrame = loopFrame || requestAnimationFrame(loop);
  }
  
  video.addEventListener('loadedmetadata',function(){
    width = canvas.width = video.videoWidth;
    height = canvas.height = video.videoHeight;
    centerX = width / 2;
    centerY = height / 2;
    startLoop();
  });
  
  canvas.addEventListener('click',function(){
    if ( track ) {
      if ( track.stop ) { track.stop(); }
      track = null;
    } else {
      getWebcam();
    }
  });
})();
	
</script>
