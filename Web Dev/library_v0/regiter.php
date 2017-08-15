<?PHP
session_start();
include "include/config.php";
include "include/function.php";
$status = select("tb_setting", "where sett_id=1");
?>
<!doctype html>
<html>
    <head>
        <title><?= $title; ?></title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="author" content="Manussawin Sankam">
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
                <div class="span4"></div>
                <div class="span4 ">
                    <div class="container-fluid m-reg-container">
                        <div class="page-header">
                            <div class="loading"></div>
                            <div id="res"></div>
                        </div>						
                        <form method="post" name="regiter" id="regiter">
                            <div class="page-header">
                                <h4>ข้อมูลผู้ใช้งาน</h4>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b>เลขประจำตัวประชาชน</b></label>
                                <div class="controls">
                                    <input name="identification" type="text" class="span12" id="identification" size="13" maxlength="13" placeholder="ชื่อผู้ใช้งาน" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b>ชื่อ</b></label>
                                <div class="controls">
                                    <input name="firstname" type="text" class="span12" id="firstname" size="20" maxlength="20" placeholder="ชื่อ" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b>นามสกุล</b></label>
                                <div class="controls">
                                    <input name="lastname" type="text" class="span12" id="lastname" size="20" maxlength="20" placeholder="นามสกุล" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b>โทรศัพท์</b></label>
                                <div class="controls">
                                    <input name="u_tel" type="text" class="span12" id="u_tel" size="10" maxlength="20" placeholder="โทรศัพท์" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="page-header">
                                <h4>ข้อมูลเข้าใช้งาน</h4>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b><i class="icon-user"></i> Username</b></label>
                                <div class="controls">
                                    <input name="username" type="text" class="span12" id="username" size="20" maxlength="20" placeholder="ชื่อผู้ใช้งาน" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><b><i class="icon-lock"></i> Password</b></label>
                                <div class="controls">
                                    <input name="password" type="password" class="span12" id="password" size="20" maxlength="20" placeholder="รหัสผ่าน" autocomplete="off"/>
                                </div>
                            </div>
                            <a href="index.php" class="btn btn-default pull-right" style="margin-left: 5px;">เข้าสู่ระบบ</a>	
                            <input name="SLogin" type="submit" class="btn btn-primary pull-right" id="SLogin" value="ลงทะเบียน" />		
                        </form>
                    </div>			
                </div>
            </div>
        </div>
        <div class="foot">

        </div>
        <script type="text/javascript">
            $(function () {
                $.ytLoad();
                $('#regiter').validate({
                    errorElement: 'label', // default input error message container
                    errorClass: 'help-inline', // default input error message class
                    focusInvalid: false, // do not focus the last invalid input
                    rules: {
                        identification: {
                            required: true
                        },
                        firstname: {
                            required: true
                        },
                        firstname: {
                            required: true
                        },
                        lastname: {
                            required: true
                        },
                        u_tel: {
                            required: true
                        },
                        username: {
                            required: false
                        },
                        password: {
                            required: false
                        }
                    },
                    messages: {
                        identification: {
                            required: "กรุณาป้อนเลขประจำตัวประชาชนด้วยครับ."
                        },
                        firstname: {
                            required: "กรุณาป้อนชื่อด้วยครับ."
                        },
                        lastname: {
                            required: "กรุณาป้อนนามสกุลด้วยครับ."
                        },
                        u_tel: {
                            required: "กรุณาป้อนเบอร์โทรด้วยครับ."
                        },
                        username: {
                            required: "กรุณาป้อน Username ด้วยครับ."
                        },
                        password: {
                            required: "กรุณาป้อน Password ด้วยครับ."
                        }
                    },
                    highlight: function (element) {
                        $(element).closest('.control-group').addClass('error');
                    },
                    success: function (element) {
                        element.closest('.control-group').removeClass('error');
                        element.remove();
                    },
                    submitHandler: function (form) {
                        $(".loading").html("<br><center><img src='img/blue_ani_bar.gif' style='width:100%;'></center>");
                        $.post("action.php?op=regiter", $("#regiter").serialize(), function (data) {
                            $("#res").html(data);
                            $(".loading").html('');
                        });
                    }
                });

                $('#regiter input:text, input:password, textarea, select').blur(function () {
                    var check = $(this).val();
                    if (check == '') {
                        $(this).css({'background-color': '#FFC0C0'});
                    } else {
                        $(this).css({'background-color': '#FFFFFF'});
                    }
                });

                $("#SLogin").live('click', function () {
                    $('#regiter input:text, input:password, textarea, select').each(function (index, obj) {
                        if ($(obj).val().length === 0) {
                            $(obj).css({'background-color': '#FFC0C0'});
                        } else {
                            $(obj).css({'background-color': '#FFFFFF'});
                        }
                    });
                });
                //$('.foot').css('position', $(document).height() > $(window).height() ? "inherit" : "fixed");
            });
        </script>
    </body>
</html>
