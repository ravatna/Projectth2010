
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ข่าวสารในสถานศึกษา</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">

   
    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>css/carousel.css" rel="stylesheet">
	
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <?php $this->load->view($master); ?>

<br/><br/><br/><br/>
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        
		
		
		
        
	  <?php 
	  $i = 0;
								foreach ($news as $key => $value) {
									
									?>
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
								foreach ($news as $key => $value) {
									
									?>
		

        <div class="item <?=($i==0) ? "active":"" ;?>">
          
		  <?=anchor('news/news_detail/'.$value['id'],'<img src="'.base_url().'uploads/'.$value['img'].'"    alt="'.$value['title'].'" style="height:300px; margin-left:auto; margin-right:auto;" class="img-thumbnail">',' target="_BLANK"');?>
		  
          <div class="container">
		  
            <div class="carousel-caption"  style="left:5%;right:5%; ">
              <h2><?=substr($value['title'],0,150);?></h2>
              <p><?=substr($value['detail'],0,400);?>...</p>
              <!--<p><?=anchor('news/news_detail/'.$value['id'],'อ่านข่าว','class="btn btn-primary btn-sm" target="_BLANK"');?></p>-->
            </div>
          </div>
        </div>
		
							<?php
							$i++;
									if ($i==5){
										
										break;										
									}
								}
							?>
	  
	  
	  
	  
	 	 		<!-- 
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
	  
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>-->	
	  
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<br/><br/>
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
	  
	  
	  <?php 
	  $i = 0;
								foreach ($news as $key => $value) {
									$i++;
									if ($i<6){
										
										continue;										
									}
									
									if(@$_GET['filter'] != ""){
										if(@$_GET['filter'] != $value['type_news']){
											continue;
										}	
										
									}
									
									
									?>
		
		
		
		
		<div class="col-lg-4">
          <img class="img-circle" src="<?=base_url().'uploads/'.$value['img'];?>"    alt="<?=$value['title'];?>" class="img-thumbnail" width="140" height="140">
          <h2><?=$value['title'];?></h2>
          <p><?=substr($value['detail'],0,80);?>...</p>
          <p>
		  <?=anchor('news/news_detail/'.$value['id'],'รายละเอียด &raquo;','class="btn btn-default btn-sm" target="_BLANK"');?></p>
        </div><!-- /.col-lg-4 -->
		

		
							<?php
									if ($i==11){
										
										break;										
									}
								}
							?>
	  
	  
        
<div style="clear:both;" ></div>
      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 projectth. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>js/jquery-1.11.3.min.js"></script>
   
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
  </body>
</html>
