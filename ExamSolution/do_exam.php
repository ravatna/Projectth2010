<?php
session_start();
// require need database.
require_once("include/include_mysql.php");

// if not see any 
 if($_SESSION['doing_exam'] == 0)
     {
        header("location:dashboard_student.php");
     }
	 
	 $sql_exam = "SELECT id,title,teacher_id,for_class_level,start_date,end_date,status,created_at,description,count_down_time FROM tbl_exam  where  id='". $_SESSION['exam_id'] ."' and status = '1' and for_class_level='". $_SESSION['class_level'] ."';";
	$result_exam = mysqli_query($conn,$sql_exam);
	
	$exam = mysqli_fetch_array($result_exam);
	
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

        <title>ทำข้อสอบ</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
		
		<style>
			.choise_active
			{
				background-color:black;
				border-radius:100%;
				width:30px;
				
				padding-top:6px;
				padding-bottom:6px;
			}
		</style>

    </head>

    <body oncontextmenu="return false;">

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div style="color:white; font-size:24px;" >เวลา :<span id="time"></span></div>
                    <!--<a class="navbar-brand" href="#">Exam</a>-->
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right"  style="color:white; font-size:20px;" >
                        <li><a href="#">ชุดข้อสอบ: <?=$_SESSION['exam_title'];?></a></li>
                        <li><a href="#">ชื่อผู้ทดสอบ: <?=$_SESSION['fullname'] ;?> ชั้น <?=$_SESSION['class_level'];?></a></li>
                        <li><a href="dologout.php">[ออกจากระบบ]</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                
                <div class="col-sm-3 col-md-2 sidebar"  style="background-color:black !important;padding-left:0px !important;padding-right:0px !important;  width:320px !important;">
                    <div>
                        <?php
                        $sql = "SELECT id,exam_id,choise_pic1,choise_pic2,choise_pic3,choise_pic4,choise_pic5 ,exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,answer_choise,answer_description,created_date FROM tbl_exam_detail where (exam_id  ='". $_SESSION['exam_id'] ."');";
                        $result = mysqli_query($conn,$sql);

                        // get number from query
                        $inum = mysqli_num_rows($result);

			for ($i = 0; $i < $inum; $i++): ?>
                            <div style="float:left; margin-bottom:1px;" onclick="$('.carousel').carousel(<?=$i;?>); current_question = <?=$i;?>;currentChoise();" >
                                <table cellpadding="2" cellspacing="2">
                                    <tr>
                                        <td style="background-color:orange; color:black; width:40px; text-align:center; font-size:16px; font-weight:bold;"><?= $i+1 ?></td>
                                        <td style="text-align:center; background-color:#bcbcbc; color:black; width:35px; font-size:16px;" id="choise_<?= $i ?>" ><span style="" id="text_color_<?= $i ?>"></span></td>
                                    </tr>
                                </table>
                            </div>
                            <?php
                        endfor;
                        ?>

                    </div>
                </div>

                <div style="margin-left:320px !important;">

                    <!-- Carousel
            ================================================== -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" >                        
                        <div class="carousel-inner" role="listbox">
                            <?php for ($i = 0; $i <  $inum; $i++):
                            $a = mysqli_fetch_array($result); ?>
							
                            <div class="item <?=($i==0) ? "active" : "" ;?>">
                                <div class="containe r" style="padding:0px !important;">
                                    <h3 class="page-header" style="font-size:24px !important;"><?=$i+1;?>. <?=$a['question'];?></h3>
                                  
									<?php if($a['q_picture'] !="") { 
									echo "<center>";
									if(substr($a['q_picture'],strlen($a['q_picture']) - 3,3) == "mp4"){
										echo '<video width="320" height="240" controls>
  <source src="res/'.$a['q_picture'].'" type="video/mp4">
</video>';
									}else if(substr($a['q_picture'],strlen($a['q_picture']) - 3,3) == "wmv"){
										echo '<video width="320" height="240" controls>
  <source src="res/'.$a['q_picture'].'" type="video/wmv">
</video>';
									}else if(substr($a['q_picture'],strlen($a['q_picture']) - 3,3) == "mp3"){
										echo '<audio width="320" height="240" controls>
  <source src="res/'.$a['q_picture'].'" type="video/wmv">
</audio>';
									}else{ 
										echo "<img  style='height:200px' src=\"res/{$a['q_picture']}\" alt='{$a['question']}' />";
										
									 } 
									 echo "</center>";
									}else{?>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
									<?php } ?>
									
									
                                    <div style="background-color:black; height:214px; padding-top:6px;" >

				
                                    
									<?php if($a['choise_1']!="" || $a['choise_pic1']!=""){ ?>
                                        <div style="width:49%; float:left;background-color:black; margin-bottom:4px; margin-left:4px;">
                                            <a onclick="updateChoise(<?=$i;?>,'1',<?=$a['id'];?>);" class="btn btn-success btn-block btn-lg"  
											style="white-space:normal !important;text-align: left; height:100px; margin-right:2px;font-size:20px !important; background-color:#0DBFBD;" href="#myCarousel" role="button" data-slide-to="<?=$i+1;?>">
                                                <span style="
    float: left; " id="<?=$i;?>_1" class=""  >&nbsp;&nbsp;ก.)</span>
                                                <span  style="
    float: left;
    width: 85%;
	margin-left:5px;" ><?php if($a['choise_pic1'] !="") { 
										
										echo "<img style='height:75px' src=\"res/{$a['choise_pic1']}\" alt='{$a['choise_pic1']}' />";
										
									 }  ?> <?=$a['choise_1'];?></span>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                        
                                        <?php
                                        if($a['choise_2']!="" || $a['choise_pic2']!=""){
                                        ?>
                                        <div style="width:49%; float:left;background-color:black;; margin-bottom:4px; margin-left:4px;">
                                             <a onclick="updateChoise(<?=$i;?>,'2',<?=$a['id'];?>);"  
											 class="btn btn-warning btn-block btn-lg" 
											 style="white-space:normal !important;text-align: left; height:100px;margin-right:2px;font-size:20px !important; background-color:#C716C9;" href="#myCarousel" role="button"   data-slide-to="<?=$i+1;?>" >
                                                <span style="
    float: left; " id="<?=$i;?>_2" class=""   >&nbsp;&nbsp;ข.) </span>
                                                <span style="
    float: left;
    width: 85%;
	margin-left:5px;" >
	<?php if($a['choise_pic2'] !="") { 
										
										echo "<img style='height:75px' src=\"res/{$a['choise_pic2']}\" alt='{$a['choise_pic2']}' />";
										
									 }  ?> <?=$a['choise_2'];?></span>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
<?php
                                        if($a['choise_3']!="" || $a['choise_pic3']!=""){
                                        ?>
                                        <div style="width:49%;  float:left;background-color:black; margin-bottom:4px; margin-left:4px;">
                                             <a onclick="updateChoise(<?=$i;?>,'3',<?=$a['id'];?>);"  class="btn btn-primary btn-block btn-lg"  
											 style="white-space:normal !important;text-align: left; height:100px; margin-right:2px;font-size:20px !important; background-color:#0DAA1F;" href="#myCarousel" role="button"  data-slide-to="<?=$i+1;?>" >
                                                <span  style="
    float: left;"  id="<?=$i;?>_3" class=""   >&nbsp;&nbsp;ค.)</span>
                                                <span style="
    float: left;
    width: 85%;
	margin-left:5px;
"> 
<?php if($a['choise_pic3'] !="") { 
										
										echo "<img style='height:75px' src=\"res/{$a['choise_pic3']}\" alt='{$a['choise_pic3']}' />";
										
									 }  ?> <?=$a['choise_3'];?></span>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
<?php
                                        if($a['choise_4']!="" || $a['choise_pic4']!=""){
                                        ?>
                                        <div style="width:49%; float:left;background-color:black; margin-bottom:4px; margin-left:4px;">
                                             <a onclick="updateChoise(<?=$i;?>,'4',<?=$a['id'];?>);" 
											 class="btn btn-danger btn-block btn-lg"  
											 style="white-space:normal !important; text-align: left; height:100px; margin-right:2px;font-size:20px !important;  background-color:#FF0B0B;"
											 href="#myCarousel" role="button" 
											 data-slide-to="<?=$i+1;?>" >
                                                <span style="
    float: left; "
 id="<?=$i;?>_4" class=""  >&nbsp;&nbsp;ง.) </span>
                                                <span style="
    float: left;
    width: 85%;
	margin-left:5px;"
 >
 <?php if($a['choise_pic4'] !="") { 
										
										echo "<img style='height:75px' src=\"res/{$a['choise_pic4']}\" alt='{$a['choise_pic4']}' />";
										
									 }  ?> <?=$a['choise_4'];?></span>
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        
<?php
                                        if($a['choise_5']!="" || $a['choise_pic5']!=""){
                                        ?>
                                        <div style="width:45%; float:left;background-color:black; margin-bottom:4px; margin-left:4px;">
                                             <a onclick="updateChoise(<?=$i;?>,'5',<?=$a['id'];?>);"  class="btn btn-danger btn-block btn-lg"  style="white-space:normal !important;text-align: left; height:80px; margin-right:2px;font-size:20px !important; background-color: #e6c300;" href="#myCarousel" role="button"   data-slide-to="<?=$i+1;?>" >
                                                <span style="
    float: left; " id="<?=$i;?>_5" class=""  >&nbsp;&nbsp;จ.) </span>
                                                <span style="
    float: left;
    width: 85%;
	margin-left:5px;" >
	<?php if($a['choise_pic5'] !="") { 
										
										echo "<img style='height:75px' src=\"res/{$a['choise_pic5']}\" alt='{$a['choise_pic5']}' />";
										
									 }  ?> <?=$a['choise_5'];?></span>
                                            </a>
                                        </div>
                                        <?php
                                        }
										  ?>
		 

		<?php
	
                                        ?>
                                    </div> <!-- end block answer choise -->
									
                                </div>
                            </div>
                            <?php endfor; ?>
                            
                        </div>

                    </div><!-- /.carousel  -->




                    <div style="clear:both; margin-bottom:10px;background-color:black;padding-top:4px;" >

                        <a  onclick="back();"  class="btn btn-default btn-lg" style="background-color:#0036e6;width:24.2%; color:white;margin-right:2px;" href="#myCarousel" role="button" >
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span>ย้อนกลับ</span>
                        </a>



                        <a  onclick="next(-1);"  class="btn btn-default btn-lg" style="background-color:#0036e6;width:24.2%;  color:white;margin-right:2px;" href="#myCarousel" role="button" >
                            <span>ข้อแรก</span>
                        </a>
                        
                      
                         <a  onclick="show_error();" class="btn btn-default btn-lg" style="background-color:#0036e6;width:24.2%; color:white; margin-right:2px;" href="#myCarousel" role="button">
                            <span class="">ข้อที่ยังไม่ได้ทำ</span>
                            

                        </a>
                        
                        <a onclick="next_choise();"  class="btn btn-default btn-lg" style="background-color:#0036e6;width:24.2%;  color:white;margin-right:2px;" href="#myCarousel" role="button" >
                            <span class="">ถัดไป</span>
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

                        </a>


                        <br/>
                        <div style="padding-top:4px;" ></div>
                        <a onclick="sendSubmit();" class="btn btn-default btn-block  btn-lg" style=" color:white;background-color:#ff008a; margin-right:2px;" href="#" role="button" >
                            <span class="">ส่งคำตอบ</span>
                        </a>
                        <!-- end student -->	  
                    </div>
                </div>
            </div>
			</div>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="bootstrap/dist/js/jquery.min.js"></script>
            <script src="bootstrap/dist/js/bootstrap.min.js"></script>
            

            <script type="text/javascript">
                
                
                $('.carousel').carousel('pause');
                /////////////////////////////////////////
                // Set the date we're counting down to
                var countDownDate = <?=$exam['count_down_time']; ?>;
	document.getElementById("time").innerHTML =  countDownDate + " นาที ";
	
	//var countDownDate = new Date();			
	
	// Update the count down every 1 second
	var x = setInterval(function() {
	$('.carousel').carousel('pause');
    
    // Output the result in an element with id="demo"
    document.getElementById("time").innerHTML =  (--countDownDate) + " นาที ";
    
    // If the count down is over, write some text 
    if (countDownDate < 1) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "หมดเวลา";
        
        alert("หมดเวลาทำข้อสอบแล้ว");
        forceClose();
    }
}, 60000);

//////////////////////////////////////////////////////////////////
var current_question = 0;
var a_listAnswer = new Array();
for(var i = 0 ;i < <?=$inum;?>; i++){
    a_listAnswer[i] = {
        id:null,
        choise:""
    };    
}

function forceClose(){
	window.location = "dashboard_student.php";
}

function sendSubmit(){    

	var c = confirm("ต้องการส่งคำตอบใช่หรือไม่?");
	if(c==false){
		return;
	}
	
    var str = "";
    for(var i =0; i < a_listAnswer.length; i++)
    {
        str += a_listAnswer[i].id+"-"+ a_listAnswer[i].choise + "|";
    }
    // alert(str);
    $.ajax({
        type: "POST",
        url: "do_send_choise.php",
        data: {
            "v":str
        },
        success: function(res){
            
            //alert("do_send_result.php?s="+ res.score);
            
        if(res.message=="success"){
                window.location = "do_send_result.php?s="+ res.score;
            }
            
            
        },
        dataType: "json"
    });

}

function updateChoise(index,choise,id){
	current_question = index+1;
	
	a_listAnswer[index].id=id;
	a_listAnswer[index].choise=choise;
	
	renderChoise();
	currentChoise();
        $('.carousel').carousel('pause');
}


function next(index){
	current_question = index+1;
	
	renderChoise();
	currentChoise();
	$('.carousel').carousel(current_question);
        $('.carousel').carousel('pause');
}

function next_choise(){
	current_question++;
	
	renderChoise();
	currentChoise();
	$('.carousel').carousel(current_question);
        $('.carousel').carousel('pause');
}


function back(){
	current_question--;
	if(current_question < 0 ){
		current_question =0;
	}
	renderChoise();
	currentChoise();
	$('.carousel').carousel(current_question);
        $('.carousel').carousel('pause');
}

function renderChoise(){
	for(var i = 0 ;i < <?=$inum;?>; i++){
				
		var c = "green";
		 		
		if(a_listAnswer[i].choise=="1"){
			c = "#0D69BF";    
			document.getElementById("text_color_"+i).innerText = "ก";
			
			
			document.getElementById("text_color_"+i).style = "color:" + c+";";
			document.getElementById("text_color_"+i).style.color= c;
			
		}else if(a_listAnswer[i].choise=="2"){
			c = "#C716C9";    
			document.getElementById("text_color_"+i).innerText = "ข";
			
			document.getElementById("text_color_"+i).style = "color:" + c+";";
			document.getElementById("text_color_"+i).style.color= c;
		}else if(a_listAnswer[i].choise=="3"){
			c = "#0B931B";    
			document.getElementById("text_color_"+i).innerText = "ค";
			
			document.getElementById("text_color_"+i).style = "color:" + c+";";
			document.getElementById("text_color_"+i).style.color= c;
		}else if(a_listAnswer[i].choise=="4"){
			 
			 c = "#FF0B0B";    
			document.getElementById("text_color_"+i).innerText = "ง";
			
			document.getElementById("text_color_"+i).style = "color:" + c +";";
			document.getElementById("text_color_"+i).style.color= c;
		}else if(a_listAnswer[i].choise=="5"){
			 c = "#e6c300";   
			document.getElementById("text_color_"+i).innerText = "จ";
			
			document.getElementById("text_color_"+i).style = "color:" + c+";";
			document.getElementById("text_color_"+i).style.color= c;
		}
		
		
		if(current_question < <?=$inum;?>){
		
			if(i == current_question){
				document.getElementById("choise_"+i).style = "text-align:center; font-weight:700; background-color:white; width:35px; font-size:16px; ";
				document.getElementById("choise_"+i).style.backgroundColor = "white";
				document.getElementById("choise_"+i).style.fontWeight="bold";
			}else{
				document.getElementById("choise_"+i).style = "text-align:center; font-weight:700; background-color:#bcbcbc; width:35px; font-size:16px; ";
				document.getElementById("choise_"+i).style.backgroundColor = "#bcbcbc";
				document.getElementById("choise_"+i).style.fontWeight="bold";
			}
		}
	}
}
	
function currentChoise(){
	
	for(var i = 0; i < <?=$inum;?>;i++){
		
	  if(i == current_question){		 
				document.getElementById("choise_"+i).style = "text-align:center; font-weight:700; background-color:white; width:35px; font-size:16px; ";
				document.getElementById("choise_"+i).style.backgroundColor = "white";
			}else{
				document.getElementById("choise_"+i).style = "text-align:center; font-weight:700; background-color:#bcbcbc; width:35px; font-size:16px; ";
				document.getElementById("choise_"+i).style.backgroundColor = "#bcbcbc";
				
			}
	}
}

function show_error(){
	
	
	
	for(var i = 0; i < <?=$inum;?>;i++){
		
	  if(a_listAnswer[i].choise=="" || a_listAnswer[i].choise== null){
				document.getElementById("choise_"+i).style = "text-align:center; font-weight:700; background-color:white; width:35px; font-size:16px; ";
				document.getElementById("choise_"+i).style.backgroundColor = "white";
			}else{
				document.getElementById("choise_"+i).style = "text-align:center; font-weight:700; background-color:#bcbcbc; width:35px; font-size:16px; ";
				document.getElementById("choise_"+i).style.backgroundColor = "#bcbcbc";
			}
	}
}

renderChoise();
 $('.carousel').carousel('pause');
 currentChoise();
            </script>

    </body>
</html>
