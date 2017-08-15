<?PHP
session_start();
include "include/config.php";
include "include/function.php";
$status = select("tb_setting","where sett_id=1");
if($status['sett_status'] == 'off'){
echo "<center><img src='img/Page_01.png'><br><h3>ขออภัยปิดปรับปรุงระบบ ชั่วคราว<br>หากมีข้อสงสัยกรุณาติดต่อฝ่ายโรงงาน</h3></center>";
}else{
?>
<!doctype html>
<html>
<head>
	<title><?=$title;?></title>
	<meta charset="utf-8">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="author" content="">
	
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>        
	<link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
	
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.js"></script>
	<script type="text/javascript" src="js/ytLoad.jquery.js"></script>
        
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			
			
				<div class="container-fluid m-reg-container" style="margin-left:10px;margin-top:10px;">
					<div class="page-header">
                                            <h2><center><img src="img/ico/library.png"> <h2>หนังสือในห้องสมุด</h2></center>
					<div class="loading"></div>
					<div id="res"></div>
					</div>
					
                                    
                                    <!-- book -->
                                    <div style=" height:500px; overflow-y:auto;">
                                    
                                    <?php
                                        $books = selects("tb_book","");
                                       // print_r($books);
                                        for($i =0; $i < count($books) ;$i ++){
                                            ?>
                                         <div style="border:solid thin #ececec; float:left; width:120px; height:220px; margin-top:20px; margin-left:4px; margin-rigth:4px;">
                                        <div style="padding:2px;">
                                            <center><a href="bookshelf_detail.php?b_no=<?=$books[$i]['book_id']?>" target="_BLANK"><img style="width:100%; height:100%;" src="img/books/<?=$books[$i]['cover'] ?>" /></a></center>
                                            <span><a href="bookshelf_detail.php?b_no=<?=$books[$i]['book_id']?>" target="_BLANK"><strong>Title: <?=$books[$i]['bookname']?></strong></a></span>
                                        </div>
                                    </div>   
                                            
                                    <?php        
                                        }
                                    
                                    ?>
                                    
                                    </div>
                                    
                                    
                                    <!-- book -->
                                    
				</div>
			
		</div>
	</div>
	<div class="foot">
	
	</div>
	<script type="text/javascript">
	$(function(){
		$.ytLoad();
		$('#flogin').validate({
            errorElement: 'label', // default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                user_id: {
                    required: true
                },
                password: {
                    required: false
                },
                remember: {
                    required: false
                }
            },

				messages: {
                user_id: {
                    required: "กรุณาป้อน Username ด้วยครับ."
                },
                password: {
                   required: "กรุณาป้อน Password ด้วยครับ."
                }
            },

			highlight: function(element) {
				$(element).closest('.control-group').addClass('error');
			},

			success: function(element) {
				 element.closest('.control-group').removeClass('error');
                 element.remove();
		    },

           submitHandler: function (form) {
			$(".loading").html("<br><center><img src='img/blue_ani_bar.gif' style='width:100%;'></center>");
			$.post("action.php?op=signin",$("#flogin").serialize(),function(data){
				$("#res").html(data);
				$(".loading").html('');
			});
           }
        });

    $('#flogin input:text, input:password, textarea, select').blur(function(){
          var check = $(this).val();
          if(check == ''){
                $(this).css({'background-color':'#FFC0C0'});
          }else{
                $(this).css({'background-color':'#FFFFFF'});
          }
       });

    $("#SLogin").live('click',function(){
        $('#flogin input:text, input:password, textarea, select').each(function(index, obj){
         if($(obj).val().length === 0) {
            $(obj).css({'background-color':'#FFC0C0'});
         }else{
            $(obj).css({'background-color':'#FFFFFF'});
         }
         });
     });
	 //$('.foot').css('position', $(document).height() > $(window).height() ? "inherit" : "fixed");
	});
	</script>
</body>
</html>
<?PHP
}
?>
