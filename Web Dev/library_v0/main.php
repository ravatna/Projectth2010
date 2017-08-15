<?PHP
error_reporting(E_ALL);
session_start();
include "include/config.php";
include "include/function.php";

$url = $_GET['page'];
$sett = select("tb_setting", "where 1=1");

if($url!='home'&&$url!='search'&&$url!='book_detail'&&$url!='book_detail'&&$url!='ebook'){
    chk_login();
}
if($_SESSION){
    $user = select("tb_user", "where user_id='$_SESSION[user_id]'");

    if ($user['avartar'] != "") {
        $avartar = "<img src='avartar/$user[avartar]' class='profile_image'>";
    } else {
        $avartar = "<img src='avartar/person.png' class='profile_image'>";
    }
}
?>
<!doctype html>
<html>
    <head>
        <title><?= $title; ?></title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"/>
        <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
        <link href="css/ytLoad.jquery.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/formToWizard.css" />
        <link rel="stylesheet" href="css/validationEngine.jquery.css" />
        <link rel="stylesheet" href="plugins/data-tables/DT_bootstrap.css" />
        <link href="plugins/jquery-autocomplete/jquery.autocomplete.css" rel="stylesheet"/>
        <link type="text/css" href="plugins/jquery-ui/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="plugins/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <link rel="stylesheet" href="css/A_green.css" />
        <link rel="stylesheet" href="css/pagination.css" />
        <link rel="stylesheet" href="css/morris.css" />
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
        <script src="js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="plugins/jquery-ui/assets/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/echarts.min.js"></script>
        <script type="text/javascript" src="js/morris.min.js"></script>
        <script type="text/javascript" src="js/raphael.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.transit.js"></script>
        <script type="text/javascript" src="js/ytLoad.jquery.js"></script>
        <script src="js/jquery.formToWizard.js"></script>
        <script src="js/jquery.validationEngine.js"></script>
        <script src="js/jquery.validationEngine-en.js"></script>
        <script src="js/jquery.autotab-1.1b.js"></script>
        <script src="js/jasny-bootstrap.js"></script>
        <script type="text/javascript" src="plugins/data-tables/jquery.dataTables_NEW.js"></script>
        <script type="text/javascript" src="plugins/data-tables/DT_bootstrap.js"></script>
        <script type="text/javascript" src="plugins/data-tables/FixedColumns.min.js"></script>
        <script src="plugins/jquery-autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="plugins/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="plugins/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="plugins/js/jquery.webcamqrcode.js"></script>
        <script src="plugins/js/corgi.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top m-header">
            <div class="navbar-inner m-inner">
                <div class="container-fluid">                    
                    <form class="form-search m-search span5">ระบบงานห้องสมุด</form>					
                    <div class="nav-collapse collapse">
                        <div class="btn-group pull-right">
                           <?php if(isset($_SESSION['logon'])): ?> 
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-user"></i> <?= $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?>
                                    <span class="caret"></span>
                                </a>
								
                                <ul class="dropdown-menu">
                                    <li><center><?= $avartar; ?></center></li>
                                    <li class="divider"></li>
                                    <li><a href="main.php?page=profile"><i class="icon-user"></i> ข้อมูลส่วนตัว</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php"><i class="icon-off"></i> ออกจากระบบ</a></li>
                                </ul>
								
                            <?php else: ?>
                                <a class="btn" href="login.php">
                                    <i class="icon-lock"></i> เข้าสู่ระบบ
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="m-top"></div>		
        <div class="sidebar" <?php
			if(!isset($_SESSION['logon'])):
				echo " style='display:none !important;'";
			endif;
		?> >
		
            <ul class="nav nav-tabs nav-stacked">
                <li class="<?= ($url == "home" ? 'active' : ''); ?>">
                    <a href="main.php?page=home">
                        <div>
                            <div class="ico">
                                <img src="img/ico/icon.png">
                            </div>
                            <div class="title">
                                หน้าหลัก
                            </div>
                        </div>

                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>

                <li class="<?= ($url == "search" ? 'active' : ''); ?>">
                    <a href="main.php?page=search">
                        <div>
                            <div class="ico">
                                <img src="img/ico/search.png">
                            </div>
                            <div class="title">
                                สืบค้นหนังสือ
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>
 
                <?php if(isset($_SESSION['logon'])): ?> 
                 <li class="<?= ($url == "borrow" ? 'active' : ''); ?>">
                    <a href="main.php?page=borrow">
                        <div>
                            <div class="ico">
                                <img src="img/ico/transfer.png">
                            </div>
                            <div class="title">
                                ยืม/คืนหนังสือ
                            </div>
                        </div>

                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>

                <li class="<?= ($url == "borrow_list" || $url == "borrow_detail" ? 'active' : ''); ?>">
                    <a href="main.php?page=borrow_list">
                        <div>
                            <div class="ico">
                                <img src="img/ico/clipboard.png">
                            </div>
                            <div class="title">
                                รายการยืม/คืน
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>    
                <?php if($_SESSION['is_librarian'] == true): ?>
                <li class="<?= ($url == "user" ? 'active' : ''); ?>">
                    <a href="main.php?page=user">
                        <div>
                            <div class="ico">
                                <img src="img/ico/user.png">
                            </div>
                            <div class="title">
                                ผู้ใช้งาน
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>
                <li class="<?= ($url == "books" ? 'active' : ''); ?>">
                    <a href="main.php?page=books">
                        <div>
                            <div class="ico">
                                <img src="img/ico/books.png">
                            </div>
                            <div class="title">
                                หนังสือ
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>
                <?php  endif; ?>
                <?php  endif; ?>
                <?php if(isset($_SESSION['logon'])): ?> 
                <li class="<?= ($url == "report" ? 'active' : ''); ?>">
                    <a href="main.php?page=report">
                        <div>
                            <div class="ico">
                                <img src="img/ico/bar-chart.png">
                            </div>
                            <div class="title">
                                รายงาน
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>

                <li class="<?= ($url == "setting" ? 'active' : ''); ?>">
                    <a href="main.php?page=setting">
                        <div>
                            <div class="ico">
                                <img src="img/ico/three-gears.png">
                            </div>
                            <div class="title">
                                ตั้งค่าระบบ
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>      
                <?php  endif; ?>   
                <li class="<?= ($url == "manual" ? 'active' : ''); ?>">
                    <a href="main.php?page=manual">
                        <div>
                            <div class="ico">
                                <img src="img/ico/duplicate.png">
                            </div>
                            <div class="title">
                                คู่มือระบบ
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>      
                <?php if(isset($_SESSION['logon'])): ?> 
                <li class="">
                    <a href="logout.php">
                        <div>
                            <div class="ico">
                                <img src="img/ico/key-hole.png">
                            </div>
                            <div class="title">
                                ออกจากระบบ
                            </div>
                        </div>
                        <div class="arrow">
                            <div class="bubble-arrow-border"></div>
                            <div class="bubble-arrow"></div>
                        </div>
                    </a>
                </li>
                <?php  endif; ?>
                <li class="">
                    <a href="#" id="btn-more">
                        <div>
                            <div class="ico">
                                <img src="img/ico/menu.png">
                            </div>
                            <div class="title">
                                อื่นๆ
                            </div>
                        </div>
                    </a>

                </li>
            </ul>
        </div>
        <div class="m-sidebar-collapsed">
            <ul class="nav nav-pills">

            </ul>

            <div class="arrow-border">
                <div class="arrow-inner"></div>
            </div>
        </div>
        <div class="main-container" 
		<?php
			if(!isset($_SESSION['logon'])):
				echo " style='margin-left:0px; !important;'";
			endif;
		?>
		
		>
            <div class="container-fluid">
                <div class="res">
                    <legend>
                        <?PHP
                        switch ($_GET['page']) {
                            case "home":
                                echo "หน้าหลัก";
                                break;
                            case "borrow":
                                echo "ทำรายการยืม / คืนหนังสือ";
                                break;
                            case "borrow_list":
                                echo "รายการยืม / คืนหนังสือ";
                                break;
                            case "borrow_detail":
                                echo "รายละเอียดการยืมหนังสือ เลขที่อ้างอิง [ $_GET[br_no] ]";
                                break;
                            case "book_detail":
                                echo "รายละเอียดหนังสือ เลขที่อ้างอิง [ $_GET[b_no] ]";
                                break;
                            case "user":
                                echo "จัดการข้อมูลผู้ใช้งาน";
                                break;
                            case "books":
                                echo "จัดการข้อมูลหนังสือ";
                                break;
                            case "profile":
                                echo "ข้อมูลส่วนตัว";
                                break;
                            case "search":
                                echo "สืบค้นหนังสือ";
                                break;
                            case "manual":
                                echo "คู่มือการใช้งานระบบ";
                                break;
                            case "contact":
                                echo "ติดต่อเรา (ฝ่ายโรงงาน)";
                                break;
                            case "report":
                                echo "รายงาน";
                                break;
                            case "setting":
                                echo "ตั้งค่าระบบ";
                                break;
                            default:
                                echo "หน้าหลัก";
                        }
                        ?>
                    </legend>
                </div>
                <?PHP
                /*
                  switch ($_GET['page']) {
                  case "home":
                  include("home.php");
                  break;
                  default:
                  include "404.php";
                  }
                 */
                include $_GET['page'] . ".php";
                ?>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $.ytLoad();
            });
        </script>
    </body>
</html>
