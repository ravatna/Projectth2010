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

if(@$_SESSION['user_id']){
    $user = select("tb_user", "where user_id='".$_SESSION['user_id']."'");

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

$book1 = selects("tb_book"," where is_ebook = '1' ");
$book2 = selects("tb_book"," where is_ebook = '2' ");
$book3 = selects("tb_book"," where is_ebook = '3' ");
$book4 = selects("tb_book"," where is_ebook = '4' ");
$book5 = selects("tb_book"," where is_ebook = '5' ");

// $data = selects("tb_book", "where book_id='$_GET[b_no]'");
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
				<?php include_once("_highlight_book.php"); ?>
				
				
				<!-- scroll top section -->

				<div class="wrap" style="border-top-style:dashed; height:440px;">
					<h2 style="background-image:url(images/cap_book.png);background-repeat:no-repeat; color:white; padding-left:30px;padding-top:10px; height:60px;">หนังสือ <small class="pull-right " style="margin-top:20px; font-size:14px;"> <a href="std_category.php?page=main&filter=1&cat=<?=@$_GET['cat'];?>">[ ดูทั้งหมด ]</a> </small></h2>
					<div class="frame" id="centered">
					<ul class="clearfix">
				
				<?php
				for($i =0; $i < count($book1); $i++){
					$item = $book1[$i];
					
					// if not set highlight
					if ($item['highlight_no'] == "999")
						continue;
					?>
					<li>
					<a href="std_detail.php?filter=1&page=main&cat=000&b_no=<?= $item['book_id'];?>" >
						<img style="margin-top:0px;" width="180" height="260" src="img/books/<?=$item['cover'] ;?>" />
						</a>
						
						<div style="line-height:25px; word-wrap:break-word; font-size:18px;color:#999999;"><br/><?=$item['bookname'] ;?></div>
						
					</li>
					<?php
				}
				?>
					
				
					
					
				</ul>
			</div>
 
		</div> <!-- /end book -->
		
		<div class="wrap" style="border-top-style:dashed; height:400px;">
<h2 style="background-image:url(images/cap_journal.png);background-repeat:no-repeat; color:white; padding-left:30px;padding-top:10px; height:60px;">วารสาร <small class="pull-right " style="margin-top:20px; font-size:14px;"> <a href="std_category.php?page=main&filter=2&cat=<?=@$_GET['cat'];?>">[ ดูทั้งหมด ]</a> </small></h2>
			 

			<div class="frame" id="centered">
				<ul class="clearfix">
					<?php
				for($i =0; $i < count($book2); $i++){
					$item = $book2[$i];
					?>
					<li>
					<a href="std_detail.php?page=main&cat=000&b_no=<?= $item['book_id'];?>" >
						<img style="margin-top:50px;" width="160" src="img/books/<?=$item['cover'] ;?>" />
						</a>
						<div style="word-wrap:break-word; line-height:40px; font-size:14px;color:#999999;"><?=$item['bookname'] ;?></div>
					</li>
					<?php
				}
				?>
				</ul>
			</div>
 
		</div>
		
		<div class="wrap" style="border-top-style:dashed; height:400px;">
 <h2 style="background-image:url(images/cap_ebook.png);background-repeat:no-repeat; color:white; padding-left:30px;padding-top:10px; height:60px;">E-Book <small class="pull-right " style="margin-top:20px; font-size:14px;"> <a href="std_category.php?page=main&filter=3&cat=<?=@$_GET['cat'];?>">[ ดูทั้งหมด ]</a> </small></h2>

			<div class="frame" id="centered">
				<ul class="clearfix">
					<?php
				for($i =0; $i < count($book3); $i++){
					$item = $book3[$i];
					?>
					<li>
					<a href="std_detail.php?page=main&cat=000&b_no=<?= $item['book_id'];?>" >
						<img style="margin-top:50px;" width="160" src="img/books/<?=$item['cover'] ;?>" />
						</a>
						<div style="word-wrap:break-word; line-height:40px; font-size:14px;color:#999999;"><?=$item['bookname'] ;?></div>
					</li>
					<?php
				}
				?>
				</ul>
			</div>
 
		</div>
		
		
		<div class="wrap" style="border-top-style:dashed; height:400px;"> 

 <h2 style="background-image:url(images/cap_book.png);background-repeat:no-repeat; color:white; padding-left:22px;padding-top:10px; height:60px;">CD-DVD <small class="pull-right " style="margin-top:20px; font-size:14px;"> <a href="std_category.php?page=main&filter=4&cat=<?=@$_GET['cat'];?>">[ ดูทั้งหมด ]</a> </small></h2>
			 

			<div class="frame" id="centered">
				<ul class="clearfix">
					<?php
				for($i =0; $i < count($book4); $i++){
					$item = $book4[$i];
					?>
					<li>
					<a href="std_detail.php?page=main&cat=000&b_no=<?= $item['book_id'];?>" >
						<img style="margin-top:50px;" width="160" src="img/books/<?=$item['cover'] ;?>" />
						</a>
						<div style="word-wrap:break-word; line-height:40px; font-size:14px;color:#999999;"><?=$item['bookname'] ;?></div>
					</li>
					<?php
				}
				?> 
				</ul>
			</div> 
		</div>
		
		<div class="wrap" style="border-top-style:dashed; height:400px;">
			 
 
 <h2 style="background-image:url(images/cap_journal.png);background-repeat:no-repeat; color:white; padding-left:30px;padding-top:10px; height:60px;">Audio <small class="pull-right " style="margin-top:20px; font-size:14px;"> <a href="std_category.php?page=main&filter=4&cat=<?=@$_GET['cat'];?>">[ ดูทั้งหมด ]</a> </small></h2>

			<div class="frame" id="centered">
				<ul class="clearfix">
					<?php
				for($i =0; $i < count($book5); $i++){
					$item = $book5[$i];
					?>
					<li>
					<a href="std_detail.php?page=main&cat=000&b_no=<?= $item['book_id'];?>" >
						<img style="margin-top:50px;" width="160" src="img/books/<?=$item['cover'] ;?>" />
						</a>
						<div style="word-wrap:break-word; line-height:40px; font-size:14px; color:#999999;"><?=$item['bookname'] ;?></div>
					</li>
					<?php
				}
				?> 
				</ul>
			</div> 
		</div>
		
		<div style="clear:both;"></div>

				<!-- scroll top section end -->
				
                 
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
			$('#dg-container').gallery({
					autoplay	:	true
				});
		});
	</script/>
</html>