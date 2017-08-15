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

$_p = 0; // page number
if(isset($_GET['_p'])){
	if($_GET['_p'] != "0" || $_GET['_p'] == ""){
			$_p = $_GET['_p'];
	}
}
if($_p < 1){
	$_p = 1;
}

$display_per_page = 8;
$all_book_num_rows = num_rows("tb_book", " where is_ebook = '". ((@$_GET['filter'] == "") ? "1" : $_GET['filter']) ."' and category_id='".((@$_GET['cat'] == "") ? "000" : $_GET['cat']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page);







$category = selects("tb_category", "");
$sub_category = selects("tb_category", "");
$bookdata = selects("tb_book", " where is_ebook = '". ((@$_GET['filter'] == "") ? "1" : $_GET['filter']) ."' and category_id='".((@$_GET['cat'] == "") ? "000" : $_GET['cat']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page);

//echo " where is_ebook = '". ((@$_GET['filter'] == "") ? "1" : $_GET['filter']) ."' and category_id='".((@$_GET['cat'] == "") ? "000" : $_GET['cat']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page;

if((@$_GET['cat'] != "")){
	$data = selects("tb_book", " where is_ebook = '". ((@$_GET['filter']) == "" ? "1" : $_GET['filter']) ."' and category_id='".((@$_GET['cat'] == "") ? "000" : $_GET['cat']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page);
}else{
	$data = selects("tb_book", " where is_ebook = '". ((@$_GET['filter']) == "" ? "1" : $_GET['filter']) ."' limit ". ($display_per_page * ($_p-1)) .",". $display_per_page);	
}


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
<a href="std_category.php?page=main&cat=<?=@$value['category_id'];?>&filter=<?=((@$_GET['filter']) == "" ? "1" : $_GET['filter']);?>&category_name=<?=$value['category_name'];?>"><?=$value['category_name'];?></a>
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
							<h3 style="float:left;"><?=@$_GET['category_name'];?></h3>
							<div style="float:left; margin-top:14px; margin-left:100px; margin-bottom:10px;">
								<ul >
								<?php
								
								if(@$_GET['_p'] == "" && isset($_GET['_p']) == ""){
									$_p = 1;
								}
								
								if($_p < 2){
									//echo '<li style="float:left; list-style:none; padding:10px;"> ย้อนกลับ </li>';
								}else{
									
								
									
									echo '<li style="float:left; list-style:none; padding:10px;">
									<a href="std_category.php?page=main&filter='.((@$_GET['filter']) == "" ? "1" : $_GET['filter']).'&cat='.((@$_GET['cat']) == "" ? "000" : $_GET['cat']).'&category_name='.((@$_GET['category_name']) == "" ? "หนังสือพระราชนิพนธ์" : $_GET['category_name']).'&_p='. ($_p-1) .'"> <img src="images/left_arrow.png" style="border:0px; width:25px;" alt="left" /> </a></li>';
								}								 
									for($i = 0; $i < ceil($all_book_num_rows / $display_per_page); $i ++){
										//echo "($_p-1) == $i";
										if(($_p-1) == $i){
											echo '<li style="color:#cecece;float:left; list-style:none; padding:10px;">['. ($i+1) .']</li>';
										}else{
											echo '<li style="color:#cecece; float:left; list-style:none; padding:10px;"><a href="std_category.php?page=main&filter='.((@$_GET['filter']) == "" ? "000" : $_GET['filter']).'&cat='.((@$_GET['cat']) == "" ? "1" : $_GET['cat']).'&category_name='.((@$_GET['category_name']) == "" ? "หนังสือพระราชนิพนธ์" : $_GET['category_name']).'&_p='. ($i+1) .'">'. ($i+1) .'</a></li>';
										}
										
									}
													
								if($_p == ceil($all_book_num_rows / $display_per_page)){ 
								}else{
									echo '<li style="float:left; list-style:none; padding:10px;"><a href="std_category.php?page=main&filter='.((@$_GET['filter']) == "" ? "1" : $_GET['filter']).'&cat='.((@$_GET['cat']) == "" ? "000" : $_GET['cat']).'&category_name='.((@$_GET['category_name']) == "" ? "หนังสือพระราชนิพนธ์" : $_GET['category_name']).'&_p='. ($_p+1) .'"> <img src="images/right_arrow.png" style="border:0px; width:25px;" alt="right" /> </a></li>';
								}
													
													?>
													
													</ul>
								</div>
						</div>
						<div style="clear:both;" ></div>
						<div style="">
								<?php 
                                                    for($i = 0; $i < count($data); $i++){
                                                        $item = $data[$i];
                                ?>
                                                    
								<div style="padding:2px; border:solid thin #ffffff; width:166px; height:322px; float:left; margin-right:20px; margin-bottom:20px;">
								
									<img style="width:160px; height:220px;" src="img/books/<?=$item['cover'] ;?>" alt="<?=$item['bookname'] ;?>"> 
									<div style="font-weight:700; padding:4px; text-align:center;"><h4 style="word-wrap:break-word;">
									<a href="std_detail.php?page=main&cat=<?=$item['category_id'] ;?>&filter=<?=@$_REQUEST['filter'] ;?>&category_name=<?=$value['category_name'];?>&b_no=<?=$item['book_id'] ;?>"><?=$item['bookname'] ;?></a>
									</h4></div>
									
									<!-- avirable 
									<span>คงเหลือ: 8/10</span>
									 avirable -->
									 
								</div>
                                                    <?php
                                                    }
                                                    ?>
													<div style="clear:both;"></div>
													<!-- paginator section -->	
							</div>
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
			$('#dg-container').gallery({
					autoplay	:	true
				});
		});
	</script/>
</html>