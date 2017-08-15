<?PHP
error_reporting(E_ALL);
session_start();
include "include/config.php";
include "include/function.php";

$url = @$_GET['page'];
$sett = select("tb_setting", "where 1=1");

if($url!='home'&&$url!='search'&&$url!='book_detail'&&$url!='book_detail'&&$url!='ebook'){
    //chk_login();
}

if($_SESSION){
    $user = select("tb_user", "where user_id='$_SESSION[user_id]'");

    if ($user['avartar'] != "") {
        $avartar = "<img src='avartar/$user[avartar]' class='profile_image'>";
    } else {
        $avartar = "<img src='avartar/person.png' class='profile_image'>";
    }
}

?>
<html><head>
        <title>ห้องสมุด 4.0</title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         

    <!-- Bootstrap core CSS -->
    

   
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="login_form.css">
       
    <style type="text/css">
	.scrollbar { width: 100%; height: 10px; }
.scrollbar .handle {
	width: 100px; /* overriden if dynamicHandle: 1 */
	height: 100%;
	background: #222;
}
.frame { width: 100%; height: 160px; padding: 0; }
.frame .slidee { margin: 0; padding: 0; height: 100%; list-style: none; }
.frame .slidee li { float: left; margin: 0 5px 0 0; padding: 0; width: 120px; height: 100%; }

body { background: #e8e8e8; }
.container { margin: 0 auto; }

/* Example wrapper */
.wrap {
	position: relative;
	margin: 3em 0;
}

/* Frame */
.frame {
	height: 360px;
	line-height: 360px;
	overflow: hidden;
}
.frame ul {
	list-style: none;
	margin: 0;
	padding: 0;
	height: 100%;
	font-size: 50px;
}
.frame ul li {
	float: left;
	width: 200px;
	height: 100%;
	margin: 0 1px 0 0;
	padding: 0;
	/* background: #333; */
	color: #ddd;
	text-align: center;
	cursor: pointer;
}
.frame ul li.active {
	color: #fff;
	background: #a03232;
}

/* Scrollbar */
.scrollbar {
	margin: 0 0 1em 0;
	height: 2px;
	background: #ccc;
	line-height: 0;
}
.scrollbar .handle {
	width: 100px;
	height: 100%;
	background: #292a33;
	cursor: pointer;
}
.scrollbar .handle .mousearea {
	position: absolute;
	top: -9px;
	left: 0;
	width: 100%;
	height: 20px;
}

/* Pages */
.pages {
	list-style: none;
	margin: 20px 0;
	padding: 0;
	text-align: center;
}
.pages li {
	display: inline-block;
	width: 14px;
	height: 14px;
	margin: 0 4px;
	text-indent: -999px;
	border-radius: 10px;
	cursor: pointer;
	overflow: hidden;
	background: #fff;
	box-shadow: inset 0 0 0 1px rgba(0,0,0,.2);
}
.pages li:hover {
	background: #aaa;
}
.pages li.active {
	background: #666;
}

/* Controls */
.controls { margin: 25px 0; text-align: center; }

/* One Item Per Frame example*/
.oneperframe { height: 300px; line-height: 300px; }
.oneperframe ul li { width: 1140px; }
.oneperframe ul li.active { background: #333; }

/* Crazy example */
.crazy ul li:nth-child(2n) { width: 100px; margin: 0 4px 0 20px; }
.crazy ul li:nth-child(3n) { width: 300px; margin: 0 10px 0 5px; }
.crazy ul li:nth-child(4n) { width: 400px; margin: 0 30px 0 2px; }
	</style>


        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"/>
        <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
        <link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/formToWizard.css" />
        <link rel="stylesheet" href="css/validationEngine.jquery.css" />
        <link rel="stylesheet" href="plugins/data-tables/DT_bootstrap.css" />
        <link href="plugins/jquery-autocomplete/jquery.autocomplete.css" rel="stylesheet"/>
        <link type="text/css" href="plugins/jquery-ui/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="plugins/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <link rel="stylesheet" href="css/A_green.css" />
        <link rel="stylesheet" href="css/pagination.css" />
        <link rel="stylesheet" href="css/morris.css" />
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
        <script src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="plugins/jquery-ui/assets/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/echarts.min.js"></script>
        <script type="text/javascript" src="js/morris.min.js"></script>
        <script type="text/javascript" src="js/raphael.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.transit.js"></script>
        <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
        <script src="js/jquery.formToWizard.js"></script>
        <script src="js/jquery.validationEngine.js"></script>
        <script src="js/jquery.validationEngine-en.js"></script>
        <script src="js/jquery.autotab-1.1b.js"></script>
        <script src="js/jasny-bootstrap.js"></script>
        <script type="text/javascript" src="plugins/data-tables/jquery.dataTables_NEW.js"></script>
        <script type="text/javascript" src="plugins/data-tables/DT_bootstrap.js"></script>
        <script type="text/javascript" src="plugins/data-tables/FixedColumns.min.js"></script>
        <script src="plugins/jquery-autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="plugins/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="plugins/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="plugins/js/jquery.webcamqrcode.js"></script>
        <script src="plugins/js/corgi.js" type="text/javascript"></script>


		
    </head>
    <body style="background-color:white !important;">

        <div style="width:1024px; margin-left:auto;margin-right:auto;">
            
            
            
            <div style="width:1024px; ">
<?php include_once("_top_header.php"); ?>
                
                
                <!-- height light -->
                <div   style="width:1024px;">
                    
   
		<div style="clear:both;"></div>

				<!-- scroll top section end -->
				
                <div style="width:1024px;">
				<!-- left panel -->
                    <div  style="float:left; width:240px;     border-top-style:dashed">
                        
                        <div style="border-right:dashed medium gray; width:230px; height:900px; ">
					
						<div style="padding-top:20px;">
                            <img style="" width="210" src="images/list_category_book.png">
						</div>
							<br>
							<ul class="" style="padding:10px; font-size:16px;">
								<?php 
								$i = 0;
								$left_menu[0] = array('id'=>'0','menu_name'=>'จัดการหนังสือ');
								$left_menu[1] = array('id'=>'1','menu_name'=>'ทำรายการยืมคืนหนังสือ');
								$left_menu[2] =  array('id'=>'2','menu_name'=>'ผู้ใช้งานระบบ');
								
								$left_menu[3] =  array('id'=>'3','menu_name'=>'รายงานผู้ยืมหนังสือ');
								$left_menu[4] =  array('id'=>'4','menu_name'=>'รายงานผูืค้างส่งหนังสือ');
								$left_menu[5] =  array('id'=>'5','menu_name'=>'พิมพ์บัตรสมาชิก');
								
								
								foreach ($left_menu as $key => $value) {
									?>
									<li style="padding:8px;">
									<a href="std_index.php?page=main&cat=<?=$value['id'];?>"><?=$value['menu_name'];?></a>
								</li>
								<?php 
								$i++;
								
								} ?>
								</ul>
                        </div>
                    </div>

					
					<!-- right panel -->
                    <div style="float:left; width:784px; padding:20px 0px 0px 20px; border-top-style:dashed">

                        <div class="" style="padding:4px;">
						
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
                                        <option value="1">หนังสือ</option>
										<option value="2">วารสาร</option>
										<option value="4">หนังสือพิมพ์</option>
										<option value="3">E-Book</option>
										<option value="5">CD-DVD</option>										
										<option value="6">สื่ออื่นๆ</option>
										
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
                        <td><input type="checkbox" name="chk[]" class="checkboxes" value="<?= $data['book_id']; ?>" /></td>
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
						
						
						</div>
                    </div>
                </div>
            </div>
        </div>

</div>

<!-- include login form -->
<?php include_once("_login_and_register.php"); ?>
		  
</body>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js/sly.min.js"></script>	
		<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
		<script type="text/javascript" src="js/jquery.gallery.js"></script>
		<script type="text/javascript">

var options = {
	horizontal: 1,
	itemNav: 'basic',
	speed: 300,
	mouseDragging: 1,
	touchDragging: 1,
	
};

$('.frame').sly(options);
</script>
	<script type="text/javascript">
		$(function() {
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

			
			
			$('#dg-container').gallery({
					autoplay	:	true
				});
		});
	</script/>
</html>

