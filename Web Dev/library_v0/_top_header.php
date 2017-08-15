  
<div class="row" style="  width: 1024px;margin-left: 0px;">
    <div style="height:170px;" class="col-md-2">
       
            <img style=" margin-top:10px;" width="80" src="img/logo_obec.png">
         
    </div>

    <div style="height:170px;" class="col-md-9">
        <br/><br/><br/>
        <span style="font-size:40px;"> โรงเรียน</span>
    </div>
    
</div> <!-- .End row obec logo -->
<!-- -------------------------------------------- -->

<div class="row" style="background-image:url(images/main_bar.png);   background-color:#cecece;width: 1024px;margin-left: 0px;">
                    <div style="   width:220px; float:left; height:175px;" class="col-sm-2">
                        <a class="" href="std_index.php?page=main">
                            <!-- <img style=" margin-top:10px;" width="200" src="images/library_logo.png"> -->
                        </a>
                    </div>

                    <div style=" width:804px; float:left; height:175px;" class="col-sm-8">
                        <div style="width:90px; float:left; margin-left:140px;  margin-top:10px; ">
                        <a class="" href="std_index.php?page=main">
                            <img style="" width="90" src="images/home.png">
                        </a>
						
                        </div>
                        
                         
                        
                         <div class="btn-group pull-right" style="margin-top:10px; margin-right:10px;">
                           <?php if(isset($_SESSION['logon'])): ?>
                              <!--- start notify -->
                            <a href="#" 
                               class="btn btn-default dropdown-toggle" 
                               data-toggle="dropdown" 
                               role="button" 
                               aria-haspopup="true" 
                               aria-expanded="true">
                                <img style="width:22px; margin-right:20px;" src="images/notify_icon.png" />
                            <span class="caret"></span></a>
                                <ul  class="dropdown-menu">
                                    <li><a href="std_handles.php">หนังสือ เลยกำหนดคืน 3 เล่ม</a></li>
                                    <li class="divider"></li>
                                    <li><a href="std_handles.php">รายการหนังสือจองไว้ ดำเนินการแล้ว</a></li>
                                    <li class="divider"></li>
                                </ul>
                            <?php endif ?>		
                        </div>
                        
                        <div class="btn-group pull-right" style="margin-top:10px; margin-right:10px;">
                           <?php if(isset($_SESSION['logon'])): ?>
                             
                            <!--- start user menu -->
                            <a href="#" 
                               class="btn btn-default dropdown-toggle" 
                               data-toggle="dropdown" 
                               role="button" 
                               aria-haspopup="true" 
                               aria-expanded="true">
                               <?= $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?> 
                                <span class="caret"></span>
                            </a>
                            
                                <ul class="dropdown-menu">
                                    <li><center><?= $avartar; ?></center></li>
                                    <li class="divider"></li>
                                    <li><a href="std_info.php"><i class="icon-user"></i> ข้อมูลส่วนตัว</a></li>
                                    <li class="divider"></li>
                                    <li><a href="std_handles.php"><i class="icon-user"></i> รายการยืม และจองหนังสือ</a></li>
                                    <li class="divider"></li>
                                    <li><a href="std_logout.php"><i class="icon-off"></i> ออกจากระบบ</a></li>
                                </ul>
                            
                            <?php else: ?> 
                                
				<a class="btn btn-default" href="#"  data-toggle="modal" data-target="#register-modal">
                                    <i class="icon-lock"></i> ลงทะเบียนใหม่
                                </a>
				<a class="btn btn-default" href="#" data-toggle="modal" data-target="#login-modal">
                                    <i class="icon-lock"></i> เข้าสู่ระบบ
                                </a>	
                            <?php endif ?>			
                        </div>
                    <div style="clear:both;"></div>    
                    
          <form action="std_search_result.php?page=main&filter=1" method="get"> 
        <div class="input-group pull-right" style="width:300px; margin-top:-30px;margin-right:10px;">
      
      <input type="text" name="s" class="form-control" placeholder="ชื่อหนังสือ ...">
      <span class="input-group-btn ">
        <button class="btn btn-primary" type="submit">ค้นหา</button>
      </span>
      </div><!-- /input-group -->
      </form>
    
                    </div>
					
					
                </div>
                
                <div style="background-color:#cecece; height:50px;">
                    <div class="col-sm-12">
                        <style>
                            .x {
                                
                            }
							
                            .x > li
                            {
                                list-style:none; float: left; font-size:28px; width:150px; border-right:solid #cccccc; text-align:center;
                            }
                        </style>
                        <ul class="x" style="">
                            <li style="">
								<a href="std_category.php?page=main&filter=1&cat=<?=@$_GET['cat'];?>">หนังสือ</a>
							</li>
							
                            <li style="">
								<a href="std_journal.php?page=main&filter=2&cat=<?=@$_GET['cat'];?>">วารสาร</a>
							</li>
							<li style="">
								<a href="std_news.php?page=main&filter=6&cat=<?=@$_GET['cat'];?>">หนังสือพิมพ์</a>
							</li>
                            <li style="">
								<a href="std_category.php?page=main&filter=3&cat=<?=@$_GET['cat'];?>">E-BOOK</a>
							</li>
							
                            <li style="">
								<a href="std_category.php?page=main&filter=4&cat=<?=@$_GET['cat'];?>">CD-DVD</a>
							</li>
							
                            <li style="">
								<a href="std_category.php?page=main&filter=5&cat=<?=@$_GET['cat'];?>">สื่ออื่นๆ</a>
							</li>
                        </ul>
                    </div>
                </div>
				
				