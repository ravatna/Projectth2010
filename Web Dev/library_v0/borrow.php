<?PHP
$max_no = auto_inc("tb_borrow");
$br_no = "LIS-" . str_pad($max_no, 6, '0', STR_PAD_LEFT);
$firstname = ($_SESSION['is_librarian'] == FALSE) ? $_SESSION['firstname'] : '';
$lastname = ($_SESSION['is_librarian'] == FALSE) ? $_SESSION['lastname'] : '';
$identification = ($_SESSION['is_librarian'] == FALSE) ? $_SESSION['identification'] : '';
$u_tel = ($_SESSION['is_librarian'] == FALSE) ? $_SESSION['u_tel'] : '';
?>
<div id="resp"></div>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">ทำรายการยืมหนังสือ</a></li>
        <?php if($_SESSION['is_librarian']==false): ?>
        <li><a href="#tabs-3">ทำรายการจองหนังสือ</a></li>
        <?php endif ?>
        <?php if($_SESSION['is_librarian']==true): ?>
            <li><a href="#tabs-2">ทำรายการคืนหนังสือ</a></li>
        <?php endif ?>
    </ul>
    <div id="tabs-1">
        <form name="frm_add" id="frm_add" method="post">            
            <div class="ui-toolbar">
                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">

                    <tr>
                        <th width="12%" align="right" valign="middle" c>เลขที่อ้างอิง : </th>
                        <td width="20%" valign="middle">
                            <input type="text" name="br_no" id="br_no" value="<?= $br_no; ?>" readonly=""/>                         
                        </td>
                        <th width="10%" align="right" valign="middle"></th>
                        <td width="20%" valign="middle"></td>
                        <th width="10%" align="right" valign="middle"></th>
                        <td width="20%" valign="middle"></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="middle" c>เลขประจำตัวประชาชน : </th>
                        <td width="20%" valign="middle">
                            <input name="identification" type="text" id="identification" maxlength="13" placeholder="ระบุเลขประจำตัวประชาชน" value="<?= $identification ?>" <?=($_SESSION['is_librarian']==true)?"":"class='wt' readonly=''"?>/>
                            <?php if($_SESSION['is_librarian']==true): ?>
                                <button class="btn" type="button" id="search-user" style="padding: 4px 5px 4px;min-width: 50px !important;margin-bottom: 9px;"><i class="icon-search"></i></button>
                            <?php endif; ?>
                            <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user_id'] ?>">
                        </td>
                        <th width="10%" align="right" valign="middle">ชื่อ - นามสกุล : </th>
                        <td width="20%" valign="middle"><input type="text"  id="emp_name" class="wt" placeholder="ชื่อ - นามสกุล" value="<?= $firstname . " " . $lastname ?>" readonly=""/></td>
                        <th width="10%" align="right" valign="middle">เบอร์โทรศัพท์ : </th>
                        <td width="20%" valign="middle"><input type="text" name="u_tel" id="u_tel" class="wt" placeholder="เบอร์โทรศัพท์" value="<?= $u_tel ?>"/></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="top" c>วันที่ทำเอกสาร : </th>
                        <td width="20%" valign="middle"><input name="doc_date" type="text" class="wt" id="doc_date" placeholder="วันที่ทำเอกสาร" value="<?= date('d-m-Y') ?>" readonly=""/></td>
                        <th width="10%" align="right" valign="top">วันที่ยืม : </th>
                        <td width="20%" valign="middle"><input name="br_date" type="text" class="wt" id="br_date" placeholder="วันที่ยืม" /></td>
                        <th width="10%" align="right" valign="top">วันที่คืนหนังสือ : </th>
                        <td width="20%" valign="middle"><input name="ret_date" type="text" class="wt" id="ret_date" placeholder="วันที่คืนหนังสือ" /></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="middle">เหตุผลในการยืมหนังสือ : </th>
                        <td colspan="5" valign="middle"><textarea name="remark" rows="3" class="wtt" id="remark" placeholder="เหตุผลในการยืมหนังสือ"></textarea></td>
                    </tr>
                    <tr>
                        <th colspan="6" align="center" valign="top">รายการหนังสือ</th>
                    </tr>                    
                </table>
                <h4>รายการยืมหนังสือ</h4>
                <div class="well">
                    <?php $true = (isset($_SESSION['borrow'])) ? (count($_SESSION['borrow']['book_id']) != 0) ? TRUE : '' : FALSE ?>
                    <?php if ($true): ?>
                        <table width="80%" border="0" align="center" class="table table-striped table-bordered table-hover" cellpadding="3" cellspacing="3">
                            <tr>
                                <th style="width:8px;"><!-- input type="checkbox" class="group-checkable" data-set="#tb_pang .checkboxes" -->ลำดับ</th>
                                <th>รูป</th>
                                <th>ISBN</th>
                                <th>ชื่อหนังสือ</th>                                    
                                <th>ผู้แต่ง</th>
                                <th>ประเภท</th>
                                <th>สถานะ</th>
                                <th style="width:40px;">ลบ</th>
                            </tr>

                            <?php foreach (selects('tb_book', 'WHERE book_id IN (' . implode(',', array_map('intval', $_SESSION['borrow']['book_id'])) . ')') as $key => $borrow): ?>
                                <tr style="cursor:pointer;" src="<?= $borrow['book_id']; ?>">
                                    <td><?= ++$key ?>
                                        <input type="hidden" name="book_id[]" value="<?= $borrow['book_id']; ?>">   
                                        <input type="hidden" name="br_status[]" value="<?= $borrow['copy'] - num_rows("tb_borrow_btl", "where book_id =$borrow[book_id] and is_return IS NULL"); ?>">
                                    </td>
                                    <td align="center" valign="middle"><img width="100" src='img/books/<?= $borrow['cover']; ?>'></td>
                                    <td><?= $borrow['isbn']; ?></td>
                                    <td><?= $borrow['bookname']; ?></td>
                                    <td><?= $borrow['author']; ?></td>
                                    <td><?= $borrow['is_ebook']; ?></td>
                                    <td style="background-color:<?= $data['row_color']; ?>;"><?= dataStatus(check_status($borrow['book_id'])) ?></td>
                                    <td align='center'><a href="javascript:void(0)" id='del' value="<?= array_search($borrow['book_id'], $_SESSION["borrow"]["book_id"]) ?>"><i class="icon-trash"></i> ลบ</a></td>
                                </tr>                                        
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                    <p class="text-center">ยังไม่มีรายการยืม</p>
                    <?php endif; ?>
                </div>
            </div>
            <br />
            <center>
                <a href="main.php?page=search" class="btn btn-warning">สืบค้นหนังสือ</a>
                <input id="btn_saved" name="btn_saved" type="button" value="บันทึกข้อมูล" class="btn btn-primary" <?= (!$true) ? 'disabled=""' : '' ?> />
                <input id="btn_cancel" name="btn_cancel" type="button" value="ยกเลิก" class="btn btn-danger"  <?= (!$true) ? 'disabled=""' : '' ?>/>
            </center>
        </form>

        <br />
        <br />
        <br />
    </div>
    <?php if($_SESSION['is_librarian']==false): ?>
    <div id="tabs-3">
        <form name="frm_add_book" id="frm_add_book" method="post">            
            <div class="ui-toolbar">
                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">

                    <tr>
                        <th width="12%" align="right" valign="middle" c>เลขที่อ้างอิง : </th>
                        <td width="20%" valign="middle">
                            <input type="text" name="br_no" id="br_no" value="<?= $br_no; ?>" readonly=""/>                            
                        </td>
                        <th width="10%" align="right" valign="middle"></th>
                        <td width="20%" valign="middle"></td>
                        <th width="10%" align="right" valign="middle"></th>
                        <td width="20%" valign="middle"></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="middle" c>เลขประจำตัวประชาชน : </th>
                        <td width="20%" valign="middle">
                            <input name="identification" type="text" class="wt" id="identification" maxlength="13" placeholder="ระบุเลขประจำตัวประชาชน" readonly="" value="<?= $identification ?>"/>
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                        </td>
                        <th width="10%" align="right" valign="middle">ชื่อ - นามสกุล : </th>
                        <td width="20%" valign="middle"><input type="text"  id="emp_name" class="wt" placeholder="ชื่อ - นามสกุล" value="<?= $firstname . " " . $lastname ?>" readonly=""/></td>
                        <th width="10%" align="right" valign="middle">เบอร์โทรศัพท์ : </th>
                        <td width="20%" valign="middle"><input type="text" name="u_tel" id="u_tel" class="wt" placeholder="เบอร์โทรศัพท์" value="<?= $u_tel ?>"/></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="top" c>วันที่ทำเอกสาร : </th>
                        <td width="20%" valign="middle"><input name="doc_date" type="text" class="wt" id="doc_date" placeholder="วันที่ทำเอกสาร" value="<?= date('d-m-Y') ?>" readonly=""/></td>
                        <th width="10%" align="right" valign="top">  </th>
                        <td width="20%" valign="middle"></td>
                        <th width="10%" align="right" valign="top"> </th>
                        <td width="20%" valign="middle"></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="middle">เหตุผลในการจองหนังสือ : </th>
                        <td colspan="5" valign="middle"><textarea name="remark" rows="3" class="wtt" id="remark" placeholder="เหตุผลในการยืมหนังสือ"></textarea></td>
                    </tr>                
                </table>
                <h4>รายการจองหนังสือ</h4>
                <div class="well">
                    <?php $true = (isset($_SESSION['book'])) ? (count($_SESSION['book']['book_id']) != 0) ? TRUE : '' : FALSE ?>
                    <?php if ($true): ?>
                        <table width="80%" border="0" align="center" class="table table-striped table-bordered table-hover" cellpadding="3" cellspacing="3">
                            <tr>
                                <th style="width:8px;"><!-- input type="checkbox" class="group-checkable" data-set="#tb_pang .checkboxes" -->ลำดับ</th>
                                <th>รูป</th>                                
                                <th>ชื่อหนังสือ</th>                                    
                                <th>เลขที่อ้างอิง</th>
                                <th>ผู้แต่ง</th>
                                <th>ประเภท</th>
                                <th>สถานะ</th>
                                <th style="width:40px;">ลบ</th>
                            </tr>

                            <?php foreach (selects('tb_book', 'WHERE book_id IN (' . implode(',', array_map('intval', $_SESSION['book']['book_id'])) . ')') as $key => $borrow): ?>
                                <tr style="cursor:pointer;" src="<?= $borrow['book_id']; ?>">
                                    <td><?= ++$key ?>
                                        <input type="hidden" name="book_id[]" value="<?= $borrow['book_id']; ?>">   
                                        <input type="hidden" name="br_status[]" value="<?= $borrow['copy'] - num_rows("tb_borrow_btl", "where book_id =$borrow[book_id] and is_return IS NULL"); ?>">
                                    </td>
                                    <td align="center" valign="middle"><img width="100" src='img/books/<?= $borrow['cover']; ?>'></td>
                                    <td><?= $borrow['bookname']; ?></td>
                                    <td><?= "LIS-" . str_pad($max_no+$key, 6, '0', STR_PAD_LEFT); ?></td>
                                    <td><?= $borrow['author']; ?></td>
                                    <td><?= $borrow['is_ebook']; ?></td>
                                    <td style="background-color:<?= $data['row_color']; ?>;"><?= dataStatus(check_status($borrow['book_id'])) ?></td>
                                    <td align='center'><a href="javascript:void(0)" id='delbook' value="<?= array_search($borrow['book_id'], $_SESSION["book"]["book_id"]) ?>"><i class="icon-trash"></i> ลบ</a></td>
                                </tr>                                        
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                    <p class="text-center">ยังไม่มีรายการจอง</p>
                    <?php endif; ?>
                </div>
            </div>
            <br />
            <center>
                <a href="main.php?page=search" class="btn btn-warning">สืบค้นหนังสือ</a>
                <input id="btn_saved2" name="btn_saved2" type="button" value="บันทึกข้อมูล" class="btn btn-primary" <?= (!$true) ? 'disabled=""' : '' ?> />
                <input id="btn_cancel" name="btn_cancel" type="button" value="ยกเลิก" class="btn btn-danger"  <?= (!$true) ? 'disabled=""' : '' ?>/>
            </center>
        </form>

        <br />
        <br />
        <br />
    </div>
<?php endif; ?>
    <?php if($_SESSION['is_librarian']==true): ?>
        <div id="tabs-2">
            <form name="frm_return" id="frm_return" method="post">
                <div class="ui-toolbar">
                    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
                        <tr>
                            <td width="50%" valign="top">
                                <?PHP
                                if ($sett['sett_qr'] == 'on') {
                                    ?>
                                    <div style="width: 350px; height: 350px;" id="qrcodebox"></div>
                                    <br />
                                    <p style="margin-left:10%;">
                                        <input type="button" value="เริ่ม" id="btn_start" class="btn btn-info"/>
                                        <input type="button" value="หยุด" id="btn_stop" class="btn btn-danger"/>
                                    </p>
                                    <?PHP
                                } else {
                                    ?>
                                    <img src="img/documents2.png" style="margin-top:-5px;">
                                    <?PHP
                                }
                                ?>
                            </td>
                            <td align="left" valign="top">
                                <label><b>เลขที่อ้างอิง</b></label>
                                <input type="text" name="borrow_no" id="borrow_no" class="wtt" placeholder="ระบุเลขที่อ้างอิง">
                        <center><input type="button" name="btn_search" id="btn_search" value="รายการหนังสือ" class="btn btn-warning"></center>
                        </td>
                        </tr>
                    </table>
                    <br>
                    <h4>ตรวจสอบรายการคืนหนังสือ</h4>
                    <div id="callBack" class="well"></div>
                    <h4>รายละเอียดการขอยืมหนังสือ</h4>
                    <div class="well">
                        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
                            <tr>
                                <th width="12%" align="right" valign="middle">เลขประจำตัวประชาชน : </th>
                                <td width="20%" valign="middle">
                                    <input name="txt1" type="text" class="wt" id="txt1" maxlength="4" placeholder="ระบุเลขประจำตัวประชาชน"/>
                                </td>
                                <th width="10%" align="right" valign="middle">ชื่อ - นามสกุล : </th>
                                <td width="20%" valign="middle"><input type="text" name="txt2" id="txt2" class="wt" placeholder="ชื่อ - นามสกุล"/></td>
                                <th width="11%" align="right" valign="middle">เบอร์โทรศัพท์ : </th>
                                <td width="20%" valign="middle"><input type="text" name="txt5" id="txt5" class="wt" placeholder="เบอร์โทรศัพท์"/></td>
                            </tr>
                            <tr>
                                <th width="12%" align="right" valign="top" c>วันที่ทำเอกสาร : </th>
                                <td width="20%" valign="middle"><input name="doc_date" type="text" class="wt" id="doc_date" placeholder="วันที่ทำเอกสาร" value="<?= date('d-m-Y') ?>" readonly=""/></td>
                                <th width="10%" align="right" valign="top">วันที่ยืม : </th>
                                <td width="20%" valign="middle"><input name="br_date" type="text" class="wt" id="txt6" placeholder="วันที่ยืม" /></td>
                                <th width="10%" align="right" valign="top">วันที่คืนหนังสือ : </th>
                                <td width="20%" valign="middle"><input name="ret_date" type="text" class="wt" id="txt7" placeholder="วันที่คืนหนังสือ" /></td>
                            </tr>
                            <tr>
                                <th width="15%" align="right" valign="top">เหตุผลในการยืมหนังสือ : </th>
                                <td colspan="5" valign="middle"><textarea name="txt7" rows="3" class="wtt" id="txt8" placeholder="เหตุผลในการยืมหนังสือ"><?= $data['remark']; ?></textarea></td>
                            </tr>
                        </table>
                    </div>
                    <h4>ทำรายการคืนหนังสือ</h4>
                    <div class="well">
                        <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2">
                            <tr>
                                <th width="15%" align="right">เลขประจำตัวประชาชน : </th>
                                <td width="25%">
                                    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                                    <input name="txt9" type="text" class="wt" id="txt9" placeholder="เลขประจำตัวประชาชน" maxlength="4"/>
                                </td>
                                <th width="15%" align="right">ชื่อ - นามสกุล : </th>
                                <th width="25%" align="left"><input type="text" name="txt10" id="txt10" class="wt" placeholder="ชื่อ - นามสกุล"/></th>
                            </tr>
                            <tr>
                                <th width="15%" align="right"></th>
                                <td width="25%"></td>
                                <th width="15%" align="right">วันที่คืน : </th>
                                <th width="25%" align="left"><input type="text" name="txt11" id="txt11" class="wt" placeholder="รุะบุวันที่คืน"/></th>
                            </tr>
                            <tr>
                                <th width="15%" align="right"> </th>
                                <td width="25%"></td>
                                <th width="15%" align="right">รับคืนวันที่ : </th>
                                <th width="25%" align="left"><input type="text" name="txt12" id="txt12" class="wt" placeholder="รุะบุวันที่รับคืน"/></th>
                            </tr>
                            <tr>
                                <th width="15%" align="right" valign="top">ความเห็นผู้รับคืน : </th>
                                <td colspan="5" valign="middle">
                                <textarea name="txt13" rows="3" class="wtt" id="txt13" placeholder="ความเห็นผู้รับคืน"></textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <center>
                    <input id="btn_return" name="btn_return" type="button" value="บันทึกข้อมูล" class="btn btn-primary"/>
                    <input id="btn_cancel_2" name="btn_cancel" type="button" value="ยกเลิก" class="btn btn-danger"/>
                </center>
            </form>
        </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    $(function () {
        $("#callBack").html("<center><font color='red'>ยังไม่มีรายการ</font></center>");
        $("#tabs").tabs();
        $('.mat_no,.po_no').live('keyup', function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
        $("#br_date,#ret_date,#ret_realdate,#txt11,#txt12").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
            firstDay: 1,
        });
        $("#btn_saved2").click(function () {
            var wf = false;
            $('#frm_add_book input:text, input:password, select').each(function (index, obj) {
                console.log($(obj).val())
                if ($(obj).val().length === 0) {
                    wf = false;
                    $(obj).css({'background-color': '#FFC0C0', 'border': '1px solid #7F0000'});
                } else {
                    wf = true;
                    $(obj).css({'background-color': '#FFFFFF'});
                }
            });
            if (!wf) {
                return false;
            } else {
                $.post('action.php?op=add_booking', $("#frm_add_book").serialize(), function (data) {
                    $("#resp").html(data);
                });
            }
        });
        $("#btn_saved").click(function () {
            var wf = false;
            $('#frm_add input:text, input:password, textarea, select').each(function (index, obj) {
                console.log($(obj).val())
                if ($(obj).val().length === 0) {
                    wf = false;
                    $(obj).css({'background-color': '#FFC0C0', 'border': '1px solid #7F0000'});
                } else {
                    wf = true;
                    $(obj).css({'background-color': '#FFFFFF'});
                }
            });
            if (!wf) {
                return false;
            } else {
                $.post('action.php?op=add_borrow', $("#frm_add").serialize(), function (data) {
                    $("#resp").html(data);
                });
            }
        });
        $('#frm_add input:text, input:password, textarea, select').live('blur', function () {
            var check = $(this).val();
            if (check == '') {
                $(this).css({'background-color': '#FFC0C0', 'border': '1px solid #7F0000'});
            } else {
                $(this).css({'background-color': '#FFFFFF', 'border': '1px solid #007F00'});
            }
        });

        $("#btn_search").live('click', function () {
            var borrow_no = $('#borrow_no').val();
            if (borrow_no != "") {
                $.post('action.php?op=search_borrow', {'br_no': borrow_no}, function (data) {
                    $("#callBack").html(data);
                });
            }
        });
        $("#search-user").live('click', function () {
            if($("#identification").val().length === 0){
                alert('กรุณากรอกเลขประจำตัวประชาชนผู้ยืม')
                return false;
            }else{
               $.post('action.php?op=search_user', {identification:$("#identification").val()}, function (data) {
                    $("#resp").html(data);
                }); 
            }
            
        });
        $("#chk_all").live('click', function () {
            if ($("#chk_all").is(':checked')) {
                $(".checkboxes").not("[disabled]").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }
        });

        $("#btn_return").click(function () {
            $(".checkboxes").val();
            console.log()
            $('#frm_return input:text, input:password, textarea, select').each(function (index, obj) {
                if ($(obj).val().length === 0) {
                    $(obj).css({'background-color': '#FFC0C0', 'border': '1px solid #7F0000'});
                } else {
                    $(obj).css({'background-color': '#FFFFFF'});
                }
            });

            if (!$(".check").is(':checked')) {
                alert("กรุณาตรวจสอบรายการคืนหนังสือ")
                return false;
            } else {
                $.post('action.php?op=return_borrow', $("#frm_return").serialize(), function (data) {
                    $("#resp").html(data);
                });
            }
        });

    });
    $("a[id='del']").click(function () {
        var index = $(this).attr('value'); //Id ของ แถวที่ต้องการลบ

        if (confirm('คุณต้องการลบข้อมูลที่เลือกหรือไม่ ?') == true) {
            $.post('action.php?op=del_select_borrow', {'index': index}, function (data) {
                console.log(data)
                $("#resp").html(data);
            });
        } else {
            return false;
        }
    });
    $("a[id='delbook']").click(function () {        
        var index = $(this).attr('value'); //Id ของ แถวที่ต้องการลบ       

        if (confirm('คุณต้องการลบข้อมูลที่เลือกหรือไม่ ?') == true) {
            $.post('action.php?op=del_select_book', {'index': index}, function (data) {
                console.log(data)
                $("#resp").html(data);
            });
        } else {
            return false;
        }
    });
    $("#btn_cancel").click(function () {
        if (confirm('คุณต้องการยกเลิกข้อมูลขอยืมหรือไม่ ?') == true) {
            $.post('action.php?op=del_select_borrow', {'index': 'all'}, function (data) {
                $("#resp").html(data);
            });
        } else {
            return false;
        }
    });
</script>
