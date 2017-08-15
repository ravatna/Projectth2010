<?PHP
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";
?>

<html><head>
        <title>ห้องสมุด 4.0</title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <!-- Bootstrap core CSS --> 

        <link rel="stylesheet" type="text/css" href="../css/login_form.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        
    </head>

    <!-- body -->
    <body >

        <!-- container -->
        <div class="container"  style="width:1024px !important;">

            <?php include_once("_admin_top_header.php"); ?>
 

            <!-- row main -->
            <div class="row">
                
            <!-- colmnu main -->
            <div class="panel-x-container" style="padding: 10px; 
  background-color: #F7F7F7 !important;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden; height:650px; ">

            <!-- row main -->
            <div class="row" style="margin:4px;">

                <!-- left column -->
                <div class=" col-lg-4">

                    <div style="width:310px; background-color:#20a8d8; height:130px; text-align:center;" >
                        <div style="border-color:#20a8d8; color:white;" >
                            
                        <span style="text-align:center; font-size:20px;" >
                            สมาชิกทั้งหมด 
                        </span>
                        <br/>
                        <span style="font-size:40px;">
						
						
						<?PHP
			 
                $statement = "tb_user  where g_id <> '3' ";
                $cont = "SELECT *  FROM {$statement} ";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			
             ?>
						
						
                           <span class="glyphicon glyphicon-user"></span> <?=@mysql_num_rows($query) ?>
                        </span>
                        
                    </div>

                    </div>
                    
                </div> <!-- .End column -->

                <!-- left column -->
                <div class=" col-lg-4">
               <div style="width:310px; background-color:#f86c6b;height:130px; text-align:center;" >
                        <div style="border-color:#f86c6b; color:white;" >
                         <span style="text-align:center; font-size:20px;" >
                            หนังสือ อิเล็กทรอนิกส์ทั้งหมด 
                        </span>
                        <br/>
                        <span style="font-size:40px;">
								<?PHP
			 
                $statement = "tb_book  where is_ebook = '3' ";
                 	$cont = "SELECT *  FROM {$statement} ";
                $ebook = mysql_query($cont);
				
                if ($ebook === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			
             ?>
                           <span class="glyphicon glyphicon-book"></span> <?=@mysql_num_rows($ebook) ?>
                        </span>
                        
                    </div>

                    </div>

                </div> <!-- .End column -->

                <!-- left column -->
                <div class=" col-lg-4">
                <div style="width:310px; background-color:#63c2de;height:130px; text-align:center;"    >
                        <div style="border-color:#63c2de; color:white;" >
                         <span style="text-align:center; font-size:20px;" >
                             หนังสือเล่ม </span>
                        <br/>
                        <span style="font-size:40px;">
						<?PHP
			 
                $statement = "tb_book  where is_ebook = '1' ";
                $cont = "SELECT *  FROM {$statement} ";
                $book = mysql_query($cont);
                if ($book === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			
             ?>
                           <span class="glyphicon glyphicon-book"></span> <?=@mysql_num_rows($book) ?>
                        </span>
                        
                    </div>

                    </div>

                </div> <!-- .End column -->

            </div> <!-- .End row -->


			
			<!-- row main -->
            <div class="row" style="margin:4px;">

                <!-- left column -->
                <div class=" col-lg-4">

                    <div style="width:310px; background-color:#20a8d8; height:130px; text-align:center;" >
                        <div style="border-color:#20a8d8; color:white;" >
                            
                        <span style="text-align:center; font-size:20px;" >
                            สื่อ CD/DVD ทั้งหมด 
                        </span>
                        <br/>
                        <span style="font-size:40px;">
						
						
						<?PHP
			 
                $statement = "tb_book  where is_ebook = '4' ";
                $cont = "SELECT *  FROM {$statement} ";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			
             ?>
						
						
                           <span class="glyphicon glyphicon-user"></span> <?=@mysql_num_rows($query) ?>
                        </span>
                        
                    </div>

                    </div>
                    
                </div> <!-- .End column -->

                <!-- left column -->
                <div class=" col-lg-4">
               <div style="width:310px; background-color:#f86c6b;height:130px; text-align:center;" >
                        <div style="border-color:#f86c6b; color:white;" >
                         <span style="text-align:center; font-size:20px;" >
                            สื่ออื่นๆ ทั้งหมด 
                        </span>
                        <br/>
                        <span style="font-size:40px;">
								<?PHP
			 
                $statement = "tb_book  where is_ebook = '5' ";
                 	$cont = "SELECT *  FROM {$statement} ";
                $ebook = mysql_query($cont);
				
                if ($ebook === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			
             ?>
                           <span class="glyphicon glyphicon-book"></span> <?=@mysql_num_rows($ebook) ?>
                        </span>
                        
                    </div>

                    </div>

                </div> <!-- .End column -->

                 

            </div> <!-- .End row -->
			

             <!-- row main -->
            <div class="row" style="margin:4px;">
                <!-- left column -->
                <div class=" col-lg-4" >
                    <div style="width:310px; background-color:#20a8d8; height:130px; text-align:center;" >
                        <div style="border-color:#20a8d8; color:white;" >
                            
                        <span style="text-align:center; font-size:20px;" >
                            จำนวนยืมหนังสือ <br/> (กรกฎาคม 2560)
                        </span>
                        <br/>
                        <span style="font-size:40px;">
                           <span class="glyphicon glyphicon-paste"></span> <?=120 ?>
                        </span>
                        
                    </div>

                    </div>
                    
                </div> <!-- .End column -->

                <!-- left column -->
                <div class=" col-lg-4">
               <div style="width:310px; background-color:#f86c6b;height:130px; text-align:center;" >
                        <div style="border-color:#f86c6b; color:white;" >
                         <span style="text-align:center; font-size:20px;" >
                            จำนวนเปิดอ่านหนังสือ อิเล็กทรอนิกส์ <br/> (กรกฎาคม 2560)
                        </span>
                        <br/>
                        <span style="font-size:40px;">
                           <span class="glyphicon glyphicon-eye-open"></span> <?=200 ?>
                        </span>
                        
                    </div>

                    </div>

                </div> <!-- .End column -->

                <!-- left column -->
                <div class=" col-lg-4">
               
               
                <div style="width:310px; background-color:#63c2de;height:130px; text-align:center;"    >
                        <div style="border-color:#63c2de; color:white;" >
                         <span style="text-align:center; font-size:25px;" >
                             ค้างส่งคืน (รายการ) </span>
                        <br/>
                        <span style="font-size:40px;">
                           <span class="glyphicon glyphicon-book"></span> <?=10 ?>
                        </span>
                        
                    </div>

                    </div>

                </div> <!-- .End column -->

            </div> <!-- .End row -->



            </div> <!-- .End column -->

            </div> <!-- .End row -->


        </div> <!-- .End container -->
        

    </body>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 	 
    <script type="text/javascript" src="../js/jquery.gallery.js"></script>
</html>