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

if(@$_SESSION[user_id]==""){
    header("location:std_index.php?main");
}



if($_SESSION){
    $user = select("tb_user", "where user_id='$_SESSION[user_id]'");

    if ($user['avartar'] != "") {
        $avartar = "<img src='avartar/$user[avartar]' class='profile_image'>";
    } else {
        $avartar = "<img src='avartar/person.png' class='profile_image'>";
    }
}



$display_per_page = 8;
$all_book_num_rows = num_rows("tb_book", " where is_ebook = '". (@$_GET['filter'] == "" ? "1" : $_GET['filter']) ."' ");

$_p = 0; // page number
if(isset($_GET['_p'])){
	if($_GET['_p'] != "0" || $_GET['_p'] == ""){
			$_p = $_GET['_p'];
	}
}

if($_p < 1){
	$_p = 1;
}


$category = selects("tb_category", "");
$sub_category = selects("tb_category", "");
$bookdata = selects("tb_book", " where is_ebook = '". (@$_GET['filter'] == "" ? "1" : $_GET['filter']) ."' and category_id='".(@$_GET['cat'] == "" ? "000" : $_GET['cat']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page);

$data = selects("tb_book", " where is_ebook = '". (@$_GET['filter'] == "" ? "1" : $_GET['filter']) ."' and category_id='".(@$_GET['cat'] == "" ? "000" : $_GET['cat']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page);

 
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

    </head>
    <body style="background-color:white !important;">

        <div style="width:1024px; margin-left:auto;margin-right:auto;">
            
            
            
            <div style="width:1024px; ">

                <?php include_once("_top_header.php"); ?>
				
                <!-- height light -->
                <div   style="width:1024px;">
                    <div   style="float:left; width:1024px;">
                        <img src="images/h_caption.png" width="230"  />
						  
				
				<!-- scroll top section -->

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
								foreach ($category as $key => $value) {
									?>
									<li style="padding:8px;">
									<a href="std_category.php?page=main&cat=<?=$value['category_id'];?>&filter=<?=$_GET['filter'];?>&category_name=<?=$value['category_name'];?>"><?=$value['category_name'];?></a>
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
						<div style="margin-bottom:30px;">
							<h3 style="float:left;">รายการ จองหนังสือ</h3>
							 
						</div>
						<div style="clear:both;" ></div>
						
						<div class="row">
 
 
   
<table width="100%" class="table table-striped table-bordered table-hover" style="margin-top:10px;">
            <thead>
                <tr class='alert alert-success'>
                    
                    <th>รูป</th>
                    <th>ISBN</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ปี่ที่พิมพ์</th>
                    <th>ครั้งทีพิมพ์</th>
                    
                    <th>ผู้แต่ง</th>
                    
                    
                   
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                
                $statement = "tb_booking left join tb_book on tb_booking.book_id = tb_book.book_id where tb_booking.user_id='". $_SESSION['user_id']."' order by tb_booking.created_at desc";
                 $cont = "SELECT *  FROM {$statement}  ";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
                while ($data = mysql_fetch_array($query)) {
                     ?>
                    <?php 
                            if(!empty($data['cover'])){
                                $path = 'img/books/'.$data['cover'];
                            }else{
                                $path = 'img/default.png';
                            }
                        ?>
                    <tr style="cursor:pointer;" >
                        
                        <td align="center" valign="middle"><img   width="100" src='<?= $path?>'></td>
                        <td><?= $data['isbn']; ?></td>
                        <td><?= $data['bookname']; ?></td>
                        <td><?= $data['publish_year']; ?></td>
                        <td><?= $data['edition']; ?></td>
                        
                        <td><?= $data['author']; ?></td>                                                
                        
                         
                        <td align='center'>
                            <a class="btn btn-sm btn-danger" href="std_booking_del.php?id=<?= $data['id']; ?>"><span class="glyphicon glyphicon-trash"></a>
                            </td>
                    </tr>
                    <?PHP
                }
                ?>
            </tbody>
        </table>
        

        <script type="text/javascript">

        function printBarcode() {
            var vstr = "";
           $(".chk_books").each(function(i,e){ 
               if(e.checked == true){
                   vstr += e.value + "|";
               }
                //console.log(e.value);
                
            });

            window.open("book_barcode_a4.php?books=" + vstr);
        }

</script>
						
						
						
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
 

</body>

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		 
		<script type="text/javascript">
 
</script>
</html>