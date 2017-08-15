<?php
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";
?>
<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ห้องสมุด 4.0 - พิมพ์บาร์โค๊ด</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/dist/css/datepicker.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->

	<style>
		.page {
		   size: 7in 9.25in !important;
		   margin: 16mm 16mm 16mm 16mm !important;
		   /*border:solid thin #ececec;*/
		}

		@font-face {
			font-family: THSarabun;
			src: url('fonts/THSarabun.ttf');
		}
		body {
			font-family: THSarabun; 
		}
	</style>
  </head>

  <body class="page"> 
          <div class="table-responsive">
            <table class="table" border="1" cellspacing="2" cellpadding="2" width="100%" >

                <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
				  <th>บาร์โค๊ด</th>
				  
                </tr>
              </thead>
           
              <tbody>
                  <?php
// get content from exam


// $sql_student = "SELECT id,fullname,class_level FROM tbl_student where class_level='".$_GET['for_class_level']."';";
$a = explode("|",$_GET['books']);
$j = join($a,",");
$j = substr($j,0,strlen($j) - 1);
  $sql_student = "select * from tb_book where book_id in ({$j})";

$result_student = mysql_query($sql_student);
$inum = mysql_num_rows($result_student);

              for($i = 0; $i < $inum; $i++):
                  $b = mysql_fetch_array($result_student);
                  ?>

                        <tr> 
                  <td align="center"><?=$b['book_id'];?></td>
                  <td><?=$b['bookname'];?></td>
				  <td><img src="barcode.php?code=<?=$b['book_id'];?>" /></td>
				  
                  
                </tr>

                <?php endfor;
                // end for
                ?>
              </tbody>
            </table>
			
			</div>
			<!-- / end list question in set exam -->

		
      </div>
          </div>
    </div>

     
  </body>
</html>