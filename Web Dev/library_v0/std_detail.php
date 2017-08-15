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

$category = selects("tb_category", ""); 
$data = select("tb_book", "where book_id='$_GET[b_no]'");
$borrow_num_rows = num_rows("tb_borrow_btl", "where book_id = '".$_GET['b_no']."' and is_return IS NULL");
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
						<div style="margin-top:20px;" ></div>
<!-- 				
                            <div id="myCarousel" class="slide carousel" style="height:360px; "data-ride="carousel" >
                                    
                             <ol class="carousel-indicators">       
                                    <?php 
                                                                $i = 0;
								foreach ($bookdata as $key => $value) { ?>
					<li data-target="#myCarousel" data-slide-to="<?=$i;?>" class="<?=($i==0) ?"active" :"" ;?>"></li>							
								<?php 
								$i++;
								
								if($i==5){
									break;
								}
								
								} ?>
      </ol>
	  
      <div class="carousel-inner" role="listbox">
		<?php 
            $i = 0;
            foreach ($bookdata as $key => $value) {									
		?>
        <div style="background:#aeaeae; height:360px; " class="item <?=($i==0) ? "active":"" ;?>">	 
          <img  style="margin-left:150px; width:300px; height:360px; float:left;" alt="First slide [1140x300]" src="<?= $value['file_path'] ?><?= $value['cover'] ?>" />
            <div>
                <h2 style="width:300px; margin-left:50px; float:left; color:white; text-align: center;"><?= $value['bookname'] ?></h2>
            </div>
        </div>
		<?php
            $i++;
            if ($i==5){
                break;										
            }
        }
        ?>
      </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
		
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
                                 
				</div> -->
				
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
									<a href="std_category.php?page=main&cat=<?=$value['category_id'];?>&filter=<?=@$_GET['filter'];?>&category_name=<?=$value['category_name'];?>"><?=$value['category_name'];?></a>
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
							
						</div>
						<div style="clear:both;" ></div>
						<div style="">
								<div style="padding:2px; border:solid thin #ececec; width:240px;   float:left; margin-right:20px; margin-bottom:20px;">								
									<img style="width:234px; " src="img/books/<?=$data['cover'] ;?>" alt="<?=$data['bookname'] ;?>"> 
								</div>
								
								<div style="width:300px; float:left;">
								<h3 style="word-wrap:break-word;">
								<?=$data['bookname'] ;?>
									</h3>
								<br/>

								<table width="100%" border="0"  >
                            <!-- <tr>
                                <th valign="top" align="left">สถานะ:</th>
                                <td>                                          
                                    <?= dataStatus(check_status($_GET['b_no'])) ?>
                                </td>                         
                            </tr> -->
							
                            <tr>
                                <th valign="top" align="left"></th>                        
                            </tr>
							
                            <tfoot>

                                <tr>
                                    <td valign="top" align="left" colspan="2">
									<br/>
									<br/>                                        
                                    <form action='std_booking_action.php'>
										<input type='hidden' name='op' value='select_book'>
										<input type='hidden' name='filter' value='<?=$_REQUEST['filter']?>' >
										<input type='hidden' name='cat' value='<?=$_REQUEST['cat']?>' >
                                        <input type='hidden' name='book_id' id="book_id" value="<?= $data['book_id'] ?>">
                                        <input style="width: 40%" type="submit" name="button" id="button" value="จองหนังสือ" class="btn btn-primary"/>
                                    </form>                                        
                                    </td>                               
								</tr>
								
                                <?php if($data['is_ebook']=="3"): ?>
                                <tr>
                                    <td valign="top" align="left" colspan="2">      
                                        <input type="hidden" id="ebook" value="<?=$data['file_path']?>">
                                        <input style="width: 40%" type="button" name="button" id="button_detail" value="อ่านหนังสือ" class="btn btn-success"/>
                                    </td>                               
                                </tr>
								<?php endif; ?>
								
                            </tfoot>
                        </table>
								</div>
                                                    
													<div style="clear:both;"></div>
													<!-- paginator section -->
													
													
								
							</div>
							
							<div>
							<h4 style="word-wrap:break-word;">
								รายละเอียดหนังสือ  
									</h4>
							<p>
							<?=@$data['description']?>
							
							</p>
							
							</div>
							<br/><br/>
							<div class="wrap">
			<h2>หนังสือใกล้เคียง <small></small></h2>
 <?php
 
 
 $random_relation_books = selects("tb_book"," where tag like '".$data['tag']."'");
 
 
 
 ?>

			<div class="frame" id="centered">
				<ul class="clearfix">
				
				<?php
				for($i = 0; $i < count($random_relation_books) ; $i++){
					$relate = $random_relation_books[$i];
					?>
					<li >
					<a href="std_detail.php?page=main&filter=<?=@$_GET['filter'];?>&cat=<?=$item['category_id'] ;?>&category_name=<?=$value['category_name'];?>&b_no=<?=$item['book_id'] ;?>">
					<img style=" " width="160" src="img/books/<?=$relate['cover'] ;?>" alt="<?=$relate['bookname']; ?>" />
                                        </a>
					<div><span style="word-wrap:break-word;"><?=$relate['bookname']; ?></span></div>
					</li>
					<?php
				}
				?>
				 
				</ul>
			</div>

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