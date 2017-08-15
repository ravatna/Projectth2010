<?PHP
$FormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $FormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$br = "";
if($_SESSION['is_librarian']==TRUE){
    
    if($_POST){
        if($_POST['borrow_status']){
           $br = "and br.br_status=$_POST[borrow_status]";
        }
        if($_POST['sel_by']=='br_no'){
            $br_sql = "select * from tb_borrow br inner join tb_user un on br.user_id=un.user_id where br.br_status=$_POST[borrow_status] and br.br_no=$_POST[sel_des] $br ";
        }elseif ($_POST['sel_by']=='br_date') {        
            $br_sql = "select * from tb_borrow br inner join tb_user un on br.user_id=un.user_id WHERE br_date BETWEEN ".convFormatDate($_POST['st_date'])." AND ".convFormatDate($_POST['en_date'])." and br.br_no=$_POST[sel_des] $br";
        }else{
            if($_POST['borrow_status']){
               $br = "where br.br_status=$_POST[borrow_status]";
            }
            
            $br_sql = "select * from tb_borrow br inner join tb_user un on br.user_id=un.user_id $br";
        }
    }else{
        $br_sql = "select * from tb_borrow br inner join tb_user un on br.user_id=un.user_id ORDER BY br_id DESC";
    }
    
}else{

    $br_sql = "select * from tb_borrow br inner join tb_user un on br.user_id=un.user_id where br.user_id=$_SESSION[user_id]";
    if($_POST){
        $br_sql = "select * from tb_borrow br inner join tb_user un on br.user_id=un.user_id where br.br_status=$_POST[borrow_status] and br.user_id=$_SESSION[user_id] ORDER BY br_id DESC";
    }
}

$rs = @mysql_query($br_sql);
?>
<div id="resp"></div>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1" class="active">รายการยืม / คืนหนังสือ</a></li>
        <!-- li><a href="#tabs-2">รายการคืนหนังสือ</a></li -->
    </ul>
    <div id="tabs-1">
        <div class="ui-toolbar">
            <form name="frmFind" id="frmFind" action="<?= $FormAction; ?>" method="post">
                <table width="100%" border="0" cellpadding="5" cellspacing="5">
                    <tr>
                        <th width="15%" align="right">สถานะการยืม/คืน : </th>
                        <td width="35%">
                            <select name="borrow_status" class="wt" id="selby_status">
                                <option value="">---- เลือก ----</option>
                                <?php foreach (selects("tb_borrow_status", '') as $s): ?>
                                <option value="<?=$s['id']?>" <?= $sel = ($_POST) ? ($_POST['borrow_status'] == $s['id'] ? 'selected' : '') : ''; ?>><?=$s['borrow_status_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <th width="15%" align="right"> </th>
                        <td>                           
                        </td>
                    </tr>
                    <tr>
                        <th width="15%" align="right">ค้นจาก : </th>
                        <td width="35%"><select name="sel_by" class="wt" id="sel_by">
                                <option value="">---- เลือก ----</option>
                                <option value="br_no" <?= $sel = ($_POST) ? ($_POST['sel_by'] == 'br_no' ? 'selected' : '') : ''; ?>>เลขที่อ้างอิง</option>
                                <option value="br_date" <?= $sel = ($_POST) ? ($_POST['sel_by'] == 'br_date' ? 'selected' : '') : ''; ?>>วันที่ทำการยืมหนังสือ</option>
                            </select></td>
                        <td colspan="2">
                                <div id="twoin">
                                    <input name="st_date" type="text" id="st_date" placeholder="วันที่ยืม" />
                                    <input name="en_date" type="text" id="en_date" placeholder="วันที่ยืม" />
                                </div>           
                            <div id="onein">
                                <input type="text" name="sel_des" id="sel_des" class="wt" placeholder="ระบุรายละเอียด เพื่อค้นหากลางคำ" value=""/>
                            </div>                            
                        </td>
                    </tr>
                    <tr>
                        <th width="15%" align="right">&nbsp;</th>
                        <td colspan="3">
                        <input type="button" class="btn btn-info span2" id="btnSearch" name="btnSearch" value="ค้นหาข้อมูล"> <input type="button" class="btn btn-danger span2" id="btnCancel" name="btnCancel" value="ยกเลิก">
                    </tr>
                </table>
                <input type="hidden" name="MM_find" value="frmFind" />
            </form>
        </div>
        <div class="ui-toolbar">
            <table width="100%" class="table table-striped table-bordered table-hover" id="tb_pang">
                <thead>
                    <tr class='alert alert-success'>
                        <th>ลำดับ</th>
                        <th>เลขที่อ้างอิง</th>
                        <th>ผู้ขอยืม</th>
                        <th>โทรศัพท์</th>
                        <th>วันที่ทำเอกสาร</th>
                        <th>วันที่ยืม</th>
                        <th>วันที่รับหนังสือ</th>
                        <th>กำหนดคืนหนังสือ</th>
                        <th>วันที่รับคืนหนังสือ</th>
                        <th>รายละเอียด</th>
                        <th>สถานะการคืนหนังสือ</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
                    $i = 1;
                    //foreach($br_list as $list){
                    while ($list = @mysql_fetch_assoc($rs)) {
                        // สถานะการอนุมัติการขอยืมหนังสือ
                        if ($list['br_status'] == "" and $list['resp_assign'] == "") {
                            $br_status = "<img src='img/icon/alarm.png'> รอการตรวจสอบจากแผนก";
                        } else if ($list['br_status'] == "" and $list['resp_assign'] == "Y") {
                            $br_status = "<img src='img/icon/bookmark_folder.png'> รอการตรวจสอบจาก DCC";
                        } else if ($list['br_status'] == "N") {
                            $br_status = "<font color='red' class='example' rel='popover' data-placement='left' data-title='ไม่ได้รับการอนุมัติเนื่องจาก' data-html='true' data-content='$list[br_apptxt]'><img src='img/icon/cross.png'> ไม่อนุมัติ</font>";
                        } else if ($list['br_status'] == "Y") {
                            $br_status = "<font color='green'><img src='img/icon/accept.png'> อนุมัติ</font>";
                        }
                        // สถานะการคืนหนังสือ
                        $br_status =  select("tb_borrow_status", "where id='$list[br_status]'");
                        ?>
                        <tr id="event_br" value="<?= $list['br_no']; ?>">
                            <td><?= $i++; ?></td>
                            <td><?= $list['br_no']; ?></td>
                            <td><?= $list['firstname'] . "  " . $list['lastname']; ?></td>
                            <td><?= $list['u_tel']; ?></td>
                            <td><?= ($list['doc_date'] != '0000-00-00 00:00:00' ? DThai($list['doc_date']) : ''); ?></td>
                            <td><?= ($list['rec_date'] != '0000-00-00 00:00:00' ? DThai($list['rec_date']) : ''); ?></td>
                            <td><?= ($list['rec_realdate'] != '0000-00-00 00:00:00' ? DThai($list['rec_realdate']) : '');?></td>
                            <td><?= ($list['ret_date'] != '0000-00-00 00:00:00' ? DThai($list['ret_date']) : ''); ?></td>
                            <td><?=  ($list['ret_realdate'] != '0000-00-00 00:00:00' ? DThai($list['ret_realdate']) : '');?></td>
                            <td><?= $list['remark']?></td>
                            <td><?= $br_status['borrow_status_name'] ?></td>                          
                        </tr>
                        <?PHP
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- div id="tabs-2">
    <div class="ui-toolbar">
    </div>
    </div -->
</div>

<script type="text/javascript">
    $(function () {
         $("#st_date,#en_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
            firstDay: 1,
        });
        $("#onein").hide()
        $("#twoin").hide()
        $("#tabs").tabs();
        $(".example").popover();

        var oTable = $('#tb_pang').dataTable({
            "sScrollX": "100%",
            "sScrollXInner": "200%",
            "bScrollCollapse": true,
            "aLengthMenu": [
                [50, 100, 150, 300, 500, 1000, -1],
                [50, 100, 150, 300, 500, 1000, "ทั้งหมด"]
            ],
            "iDisplayLength": 50,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sProcessing": "กำลังประมวลผล...",
                "sLengthMenu": "แสดง _MENU_ รายการ",
                "sZeroRecords": "<font color='red'><center>ไม่พบข้อมูลที่คุณต้องการ ค้นหา</center></font>",
                "sEmptyTable": "<font color='red'><center>ไม่มีข้อมูลในตาราง</center></font>",
                "sLoadingRecords": "กำลังโหลด ...",
                "sInfo": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "sInfoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                "sInfoFiltered": "(ค้นหา จากทั้งหมด _MAX_ รายการ)",
                "sSearch": "ค้นหา:",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                }
            },
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                            //"aaSorting":[[0, "asc"]]
                }]
        });

        new FixedColumns(oTable, {
            "iLeftColumns": 0,
            //"iRightColumns": 1
        });

        $("#br_detail").live('click', function () {
            var br_no = $(this).attr('value');
            location.href = "main.php?page=borrow_detail&br_no=" + br_no;
        });

        $("tr[id=event_br]").live('click', function () {
            var br_no = $(this).attr('value');
            location.href = "main.php?page=borrow_detail&br_no=" + br_no;
        });

        $("#btnSearch").live('click', function () {
            $("#frmFind").submit();
        });

        $("#btnCancel").live('click', function () {
            location.reload();
            $('#frmFind').trigger("reset");
        });
        $("#sel_by").change(function(){
            if(this.value=='br_date'){
                $("#onein").hide()                
                $("#twoin").show()
            }else{
                $("#onein").show()
                $("#twoin").hide()
            }
        }).change();

    });
</script>