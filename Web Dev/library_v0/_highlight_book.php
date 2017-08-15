 
<style>
.dg-container{
	width: 100%;
	height: 450px;
	position: relative;
}
.dg-wrapper{
	width: 481px;
	height: 316px;
	margin: 0 auto;
	position: relative;
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	-o-transform-style: preserve-3d;
	-ms-transform-style: preserve-3d;
	transform-style: preserve-3d;
	-webkit-perspective: 1000px;
	-moz-perspective: 1000px;
	-o-perspective: 1000px;
	-ms-perspective: 1000px;
	perspective: 1000px;
}
.dg-wrapper a{
	width: 482px;
	height: 316px;
	display: block;
	position: absolute;
	left: 0;
	top: 0;
	/*background: transparent url(../images/browser.png) no-repeat top left;*/
	background-color:#cecece;
	box-shadow: 0px 10px 20px rgba(0,0,0,0.3);
}
.dg-wrapper a.dg-transition{
	-webkit-transition: all 0.5s ease-in-out;
	-moz-transition: all 0.5s ease-in-out;
	-o-transition: all 0.5s ease-in-out;
	-ms-transition: all 0.5s ease-in-out;
	transition: all 0.5s ease-in-out;
}
.dg-wrapper a img{
	display: block;
	padding: 20px 10px 10px 10px;
	widht:220px;
	height:100%;
}
.dg-wrapper a div{
	font-style: italic;
	text-align: center;
	line-height: 50px;
	text-shadow: 1px 1px 1px rgba(255,255,255,0.5);
	color: #333;
	font-size: 16px;
	width: 100%;
	bottom: -55px;
	display: none;
	position: absolute;
}
.dg-wrapper a.dg-center div{
	display: block;
}
.dg-container nav{
	width: 58px;
	position: absolute;
	z-index: 1000;
	bottom: 40px;
	left: 50%;
	margin-left: -29px;
}
.dg-container nav span{
	text-indent: -9000px;
	float: left;
	cursor:pointer;
	width: 24px;
	height: 25px;
	opacity: 0.8;
	background: transparent url(images/arrows.png) no-repeat top left;
}
.dg-container nav span:hover{
	opacity: 1;
}
.dg-container nav span.dg-next{
	background-position: top right;
	margin-left: 10px;
}
</style>

			<?php
			
 $highlight_book = selects("tb_book", "where highlight='1' order by highlight_no desc");
			
			?>
			
			<section id="dg-container" class="dg-container">
				<div class="dg-wrapper">
				<?php
				for($k = 0; $k < count( $highlight_book ) ; $k++){
					$h_item = $highlight_book[$k];
					?>
					
					<a style="text-decoration:none;" href="std_detail.php?page=main&cat=<?= $h_item['category_id'];?>&b_no=<?= $h_item['book_id'];?>" >
						
						<img style="float:left;"   src="<?=$h_item['file_path'] ;?><?=$h_item['cover'] ;?>" />
						<p style="float:left; margin-top:20px;">
						<h3><?=$h_item['bookname'] ;?></h3>
							<h4>ผู้แต่ง : <?=$h_item['author'] ;?> <br/>
							<h4>สำนักพิมพ์ : <?=$h_item['publisher'] ;?> <br/>
							<h4>ปีที่พิมพ์ : <?=$h_item['publish_year'] ;?></h4>
						</p>
						
						<div></div>
						
					</a>
					
					<?php
					
				}
				?>
				
				
				
					 
					
					
					
				</div>
				<nav>	
					<span class="dg-prev">&lt;</span>
					<span class="dg-next">&gt;</span>
				</nav>
			</section>
        
		
		
	
    
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->