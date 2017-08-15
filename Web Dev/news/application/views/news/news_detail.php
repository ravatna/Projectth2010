
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

    <title>รายละเอียดข่าว</title>

<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		
						<link href="<?php echo base_url(); ?>css/datatables.min.css" rel="stylesheet">
						

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script> 

    <link href="<?php echo base_url(); ?>css/carousel.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

  </head>

  <body>

    <?php $this->load->view($master); ?>
<br/><br/><br/><br/>
    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title"><?=$news[0]['type_news'];?></h1>
		<p class="blog-post-meta">วันที่ลงข่าว: <?=$news[0]['start'];?></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title"><?=$news[0]['title'];?></h2>
            <img src="<?=base_url().'uploads/'.$news[0]['img'];?>" style="max-width:100%; ;"  class="img-thumbnail">

            <p><?=$news[0]['detail'];?></p>
            <hr>
            
            <h3>เอกสารประกอบ</h3>
            <p>ดาวน์โหลดเอกสารประกอบข่าวได้จากด้านล่างนี้: -</p>
            <ul>
			 <?php
				 if($news[0]['file1'] != ""){
					echo '<li><a href="'.base_url().'uploads/'.$news[0]['file1'].'" target="_blank"  >เอกสารประกอบ 1</a></li>';
				 }
				 
				 if($news[0]['file2'] != ""){
					echo '<li><a href="'.base_url().'uploads/'.$news[0]['file2'].'"   target="_blank" >เอกสารประกอบ 2</a></li>';
				 }
				 
				 if($news[0]['file3'] != ""){
					echo '<li><a href="'.base_url().'uploads/'.$news[0]['file3'].'"  target="_blank"  >เอกสารประกอบ 3</a></li>';
				 }
			 ?>
              
            </ul> 
          </div><!-- /.blog-post -->

           

           

          <nav>
            <ul class="pager">
              <li><?=anchor("news/news_no_login/","ย้อนกลับ") ;?></li>
              
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          
          <div class="sidebar-module">
            <h4>ข่าวอื่น ๆ ในหมวดเดียวกัน</h4>
            <ul class="list-unstyled">
              
			   <?php 
			  $l_news =  $_mnews->listnews_filter_limit($news[0]['type_news'],10);
	  $i = 0;
								foreach ($l_news as $key => $value) {
									$i++;
									?>
		
		
		
		
		<li>
          <img  src="<?=base_url().'uploads/'.$value['img'];?>"    alt="<?=$value['title'];?>" class="img-thumbnail" width="110" >
		  <?=anchor('news/news_detail/'.$value['id'],$value['title'],' target="_SELF"');?></p>
        </li>
		

		
							<?php
									if ($i==11){
										
										break;										
									}
								}
							?>
			  
			   
              
            </ul>
          </div>
          
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		
						<link href="<?php echo base_url(); ?>css/datatables.min.css" rel="stylesheet">
						

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/datatables.min.js"></script>
  </body>
</html>
