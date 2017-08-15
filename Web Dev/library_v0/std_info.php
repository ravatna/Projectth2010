<?PHP
error_reporting(E_ALL);
session_start();
include "include/config.php";
include "include/function.php";

$url = @$_GET['page'];
$sett = select("tb_setting", "where 1=1");

if ($url != 'home' && $url != 'search' && $url != 'book_detail' && $url != 'book_detail' && $url != 'ebook') {
    chk_std_login();
}

if ($_SESSION) {
    $user = select("tb_user", "where user_id='$_SESSION[user_id]'");

    if ($user['avartar'] != "") {
        $avartar = "<img src='avartar/$user[avartar]' class='profile_image'>";
    } else {
        $avartar = "<img src='avartar/person.png' class='profile_image'>";
    }
}
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

        </style>




    </head>
    <body style="background-color:white !important;">

        <div style="width:1024px; margin-left:auto;margin-right:auto;">
            <div style="width:1024px; ">
                <?php include_once("_top_header.php"); ?>				
                <!-- height light -->
                <div   style="width:1024px;">
                    <div   style="float:left; width:1024px;">
                        



                        


                        <!-- scroll top section end -->

                        <div style="width:1024px;">
                            <!-- left panel -->
                            <div  style="float:left; width:240px;     border-top-style:dashed">

                                <div style="border-right:dashed medium gray; width:230px; height:900px; ">

                                    <div style="padding-top:20px;">
                                        <h2 style="background-image:url(images/user_menu2.png);background-repeat: no-repeat;text-indent: 1em;height: 60px;/* text-align: center; */padding-top: 15px;color: white;font-size: 28;">เมนูผู้ใช้งาน</h2>
                                    </div>
                                    
                                    <ul class="" style="padding:10px; font-size:16px;">
                                      <li style="padding:8px;">
                                                <a href="std_info.php">ข้อมูลส่วนตัว</a>
                                      </li>
                                            
                                            <li style="padding:8px;">
                                                <a href="std_handles.php">รายการจอง และค้างส่งคืน</a>
                                            </li>
                                         
                                    </ul>
                                </div>
                            </div>

                            <!-- right panel -->
                            <div style="float:left; width:784px; padding:20px 0px 0px 20px; border-top-style:dashed">

                                <div class="" style="padding:4px;">
                                    <div style="margin-bottom:30px;">
                                        <h3 style="float:left;"><?= @$_GET['category_name']; ?></h3>

                                    </div>
                                    <div style="clear:both;" ></div>


                                    <!-- form -->

                                    <div class="loginmodal-container" style="max-width:500px;">
                                        <h1>ข้อมูลส่วนตัว</h1><br>
                                        <form action="std_info_update.php" method="post">
                                            <input type="hidden" name="identification" readonly placeholder="รหัสประจำตัว" value="<?= $_SESSION["identification"]; ?>" />
                                            <input type="text" name="firstname" placeholder="ชื่อ" required value="<?= $_SESSION["firstname"]; ?>" />
                                            <input type="text" name="lastname" placeholder="สกุล" required value="<?= $_SESSION["lastname"]; ?>" />

                                            <input type="submit" name="submit_info" class="login loginmodal-submit" value="บันทึก">
                                        </form>
                                    </div>
<br/> <br/>
                                    <div class="loginmodal-container" style="max-width:500px;">
                                        <h1>ข้อมูลส่วนตัว</h1><br>
                                        <form action="std_info_update.php" method="post">
                                            <input type="hidden" name="identification" readonly placeholder="รหัสประจำตัว">
                                            

                                            <input type="text" name="user" placeholder="ชือผู้ใช้งาน" readonly value="<?=$_SESSION['username']; ?>">
                                            <input type="password" name="pass" placeholder="รหัสผ่าน" required value="">
                                            <input type="password" name="re_pass" placeholder="ยืนยันรหัสผ่าน" required>
                                            <input type="submit" name="submit_password" class="login loginmodal-submit" value="บันทึก">
                                        </form>
                                    </div>

                                    <!-- ./ form -->


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </body>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

    </script>
</html>