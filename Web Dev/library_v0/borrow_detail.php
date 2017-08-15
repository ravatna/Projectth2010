<?PHP
$data = select("tb_borrow", "INNER JOIN tb_user ON tb_borrow.user_id=tb_user.user_id where br_no='$_GET[br_no]'"); //where br_no='$_GET[br_no]' INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID
$button = ($data['br_status'] == 0 ||$data['br_status'] == 4 ? "disabled" : "");
//$bttxt = ($data['br_status'] == 1 )? "จัดเตรียมหนังสือเรียบร้อย" : ($data['br_status'] == 2) ?"รับหนังสือแล้ว": "";
switch ($data['br_status']) {
    case 1:
        $bttxt = 'บันทึก';
        $br_status = '2';
        break;
    default: $bttxt = 'บันทึก';
        break;
}
?>
<div id="resp"></div>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">ยืม / คืนหนังสือ เลขที่อ้างอิง [ <?=$_GET['br_no']?> ]</a></li>
    </ul>
    <div id="tabs-1">
        <form name="frm_add" id="frm_add" method="post">
            <input type="hidden" name="br_no" id="br_no" value="<?= $data['br_no']; ?>"/>
            <div class="ui-toolbar">
                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
                    <tr>
                        <th width="12%" align="right" valign="middle">สถานะการยืม : </th>
                        <td width="20%" valign="middle">
                            <?php $status =  select("tb_borrow_status", "where id='$data[br_status]'");                            echo $status['borrow_status_name']; ?>
                        </td>
                        <th width="10%" align="right" valign="middle">
                        <?php 
                             if($data['is_borrow']===null){
                                echo "คิวการจองที่";
                             }
                        ?>
                        </th>
                        <td width="20%" valign="middle">
                            <?php 
                            $queue = 0;

                            if($data['is_borrow']===null){
                                $queue = booking_queue($data['br_no']);                                
                            }
                               echo $queue; 
                            ?>
                        </td>
                        <th width="10%" align="right" valign="middle"> </th>
                        <td width="20%" valign="middle"></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="middle">เลขประจำตัวประชาชน : </th>
                        <td width="20%" valign="middle">
                            <input type="hidden" name="br_status" value="<?=$br_status?>">
                            <input type="text" class="wt" id="identification" maxlength="13" placeholder="เลขประจำตัวประชาชน" value="<?= $data['identification']; ?>" readonly=""/>
                        </td>
                        <th width="10%" align="right" valign="middle">ชื่อ - นามสกุล : </th>
                        <td width="20%" valign="middle"><input type="text" id="name" class="wt" placeholder="ชื่อ - นามสกุล" value="<?= $data['firstname']; ?>  <?= $data['lastname']; ?>" readonly=""/></td>
                        <th width="10%" align="right" valign="middle">เบอร์โทรศัพท์ : </th>
                        <td width="20%" valign="middle"><input type="text" name="u_tel" id="u_tel" class="wt" placeholder="เบอร์โทรศัพท์" value="<?= $data['u_tel']; ?>" readonly=""/></td>
                    </tr>
                    <tr>
                        <th width="15%" align="right" valign="middle">วันที่ทำเอกสาร : </th>
                        <td width="20%" valign="middle"><input type="text" name="doc_date" id="doc_date" class="wt" readonly="" placeholder="วันที่ทำเอกสาร" value="<?= ($data['doc_date'] != '0000-00-00 00:00:00' ? DThai($data['doc_date']) : ''); ?>"/></td>
                        <th width="10%" align="right" valign="middle">วันกำหนดยืม : </th>
                        <td width="20%" valign="middle"><input type="text" name="br_date" id="br_date" class="wt" placeholder="วันที่ยืม" value="<?= ($data['br_date'] != '0000-00-00 00:00:00' ? DThai($data['br_date']) : ''); ?>"/></td>
                        <th width="10%" align="right" valign="middle">วันกำหนดคืนหนังสือ : </th>
                        <td width="20%" valign="middle"><input type="text" name="ret_date" id="ret_date" class="wt" placeholder="วันที่คืนหนังสือ" value="<?= ($data['ret_date'] != '0000-00-00 00:00:00' ? DThai($data['ret_date']) : ''); ?>"/></td>
                    </tr>
                    <tr>
                        <th width="15%" align="right" valign="middle"></th>
                        <td width="20%" valign="middle"></td>
                        <th width="10%" align="right" valign="middle">วันที่รับหนังสือ : </th>
                        <td width="20%" valign="middle"><input type="text" name="rec_realdate" id="rec_realdate" class="wt" readonly="" placeholder="วันที่ยืม" value="<?= ($data['rec_realdate'] != '0000-00-00 00:00:00' ? DThai($data['rec_realdate']) : ''); ?>"/></td>
                        <th width="10%" align="right" valign="middle">วันที่ส่งคืนหนังสือ : </th>
                        <td width="20%" valign="middle"><input type="text" name="ret_realdate" id="ret_realdate" class="wt" readonly="" placeholder="วันที่คืนหนังสือ" value="<?= ($data['ret_realdate'] != '0000-00-00 00:00:00' ? DThai($data['ret_realdate']) : ''); ?>"/></td>
                    </tr>
                    <tr>
                        <th width="12%" align="right" valign="middle">เหตุผลในการยืมเอกสาร : </th>
                        <td colspan="5" valign="middle"><textarea  name="remark" rows="3" class="wtt" id="remark" placeholder="เหตุผลในการยืมเอกสาร"><?= $data['remark']; ?></textarea></td>
                    </tr>
                    <tr>
                        <th align="right" valign="top">รายการยืม : </th>
                        <td colspan="5" valign="middle">
                            <table width="80%" border="0" align="center" class="table table-striped table-bordered table-hover" cellpadding="3" cellspacing="3">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><!-- input type="checkbox" class="group-checkable" data-set="#tb_pang .checkboxes" -->ลำดับ</th>
                                        <th>รูป</th>
                                        <th>ISBN</th>
                                        <th>ชื่อหนังสือ</th>                                    
                                        <th>ผู้แต่ง</th>
                                        <th>ประเภท</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (selects("tb_borrow_btl", "INNER JOIN tb_book ON tb_borrow_btl.book_id=tb_book.book_id where br_no='$_GET[br_no]'") as $key => $item):  ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td align="center" valign="middle"><img width="100" src='img/books/<?= $item['cover']; ?>'></td>
                                            <td><?= $item['isbn']; ?></td>
                                            <td><?= $item['bookname']; ?></td>
                                            <td><?= $item['author']; ?></td>
                                            <td><?= databooktype($item['is_ebook']); ?></td>
                                            <td><?= dataStatus($item['status']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <br />
            <center>      
                <?php if($data['is_borrow']===null): ?> 
                    <?php if($queue==1): ?>       
                        <input id="btn_saved" name="btn_saved" type="button" value="<?=$bttxt?>" class="btn btn-primary" <?= $button; ?>/>
                        <input id="btn_cancel" name="btn_cancel" type="button" value="<?= ($data['is_borrow']===true)?"ยกเลิกยืม":"ยกเลิกการจอง" ?>" class="btn btn-danger" <?= $button; ?>/>
                    <?php endif ?>      
                <?php endif ?>      
            </center>

            <br />
        </form>
    </div>       
</div>



<script type="text/javascript">
    $(function () {
        $("#tabs").tabs();
        $('.mat_no,.po_no').live('keyup', function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
        $("#br_date,#br_return,#resp_date,#ret_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
            firstDay: 1,
        });

        $("#btn_saved").click(function () {
            $('#frm_add input:text, input:password, textarea, select').each(function (index, obj) {
                if ($(obj).val().length === 0) {
                    $(obj).css({'background-color': '#FFC0C0', 'border': '1px solid #7F0000'});
                } else {
                    $(obj).css({'background-color': '#FFFFFF'});
                }
            });

            if ($("input[class='wt'],input[class='wtt']").val().length == 0) {
                return false;
            } else {
                $.post('action.php?op=edit_borrow', $("#frm_add").serialize(), function (data) {
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
        $("#btn_cancel").live('click', function () {
            if (confirm('คุณต้องการ ยกเลิกรายการยืมเอกสารนี้ใช่หรือไม่ ?') == true) {
                var br_no = $("#br_no").val();
                $.post('action.php?op=del_borrow', {'br_no': br_no}, function (data) {
                    $("#resp").html(data);
                });
            } else {
                return false;
            }
        });

    });
</script>