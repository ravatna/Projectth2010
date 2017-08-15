<?PHP

error_reporting(E_ALL);
session_start();
include "include/config.php";
include "include/function.php";
include "class/phpqrcode/qrlib.php";

$op = $_GET['op'];
if ($op === 'signin') {
    signIn();
} else if ($op === 'add_book') {//
    add_book();
} else if ($op === 'edit_book') {//
    edit_book();
} else if ($op === 'del_book') {//
    del_book();
} else if ($op === 'save_cat') {//
    save_cat();
} else if ($op === 'save_sub_cat') {//
    save_sub_cat();
} else if ($op === 'select_borrow') {//
    select_borrow();
}else if ($op === 'del_select_borrow') {//
    del_select_borrow();
}else if ($op === 'del_select_book') {//
    del_select_book();
} else if ($op === 'select_book') {//
    select_book();
}else if($op === 'search_user'){//
    search_user();
}else if ($op === 'save_profile') {
    save_profile();
}else if ($op === 'save_password') {
    save_password();
}else if ($op === 'regiter') {//
    regiter();
    ///=====================new version
} else if ($op === 'add_user') {
    add_user();
} else if ($op === 'edit_user') {
    edit_user();
} else if ($op === 'del_user') {
    del_user();
} else if ($op === 'del_user_all') {
    del_user_all();
} else if ($op === 'find_dept') {
    find_dept();
} else if ($op === 'add_borrow') {
    add_borrow();
} else if ($op === 'add_booking') {
    add_booking();
} else if ($op === 'reading') {
    find_emp_id();
} else if ($op === 'get_empname') {
    get_empname();
} else if ($op === 'get_empname2') {
    get_empname2();
} else if ($op === 'get_empname3') {
    get_empname3();
} else if ($op === 'edit_borrow') {
    edit_borrow();
} else if ($op === 'del_borrow') {
    del_borrow();
} else if ($op === 'del_br_dtlid') {
    del_br_dtlid();
} else if ($op === 'del_dtlid') {
    del_dtlid();
}else if ($op === 'un_approve') {
    un_approve();
} else if ($op === 'approve') {
    approve();
} else if ($op === 'search_po') {
    search_po();
} else if ($op === 'search_borrow') {
    search_borrow();
} else if ($op === 'save_setting') {
    save_setting();
} else if ($op === 'return_borrow') {
    return_borrow();
}

function signIn() {
    $username = trim($_POST['user_id']);
    $password = trim($_POST['password']);
    $chk = (isset($_POST['remember']) ? $_POST['remember'] : '');
    //เช็ค user และ password จาก ฟอร์ม
    if ((!empty($username)) and ( !empty($password)) or $password == '') {
        $sql = sprintf("select * from tb_user where username='%s' and password='%s'", mysql_real_escape_string($username), mysql_real_escape_string($password));
        $query = mysql_query($sql) or die(mysql_error());
        $num_rows = mysql_num_rows($query);
        $login = mysql_fetch_assoc($query);
        if ($num_rows === 0) {
            echo "<br><p class='alert alert-danger'>ผิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน.</p>";
            exit();
        } else if ($num_rows != 0) {
            $uid = $login['user_id'];
            $row = select("tb_user", "where user_id='$uid'");
            $_SESSION['logon'] = 1;
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["firstname"] = $row['firstname'];
            $_SESSION["lastname"] = $row['lastname'];
            $_SESSION["identification"] = $row['identification'];
            $_SESSION["u_tel"] = $row['u_tel'];
            $_SESSION['password'] = $row['password'];
            $_SESSION["is_librarian"] = $row['is_librarian'];
            if ($chk == 'on') { // ถ้าติ๊กถูก Login ตลอดไป ให้ทำการสร้าง cookie
                setcookie("username_log", $username, time() + 3600 * 24 * 356);
            }
            echo "<br><p class='alert alert-success'>กำลังเข้าสู่ระบบ กรุณารอสักครู่ ...</p>";
//            echo "<script type='text/javascript'>
//							$(function(){
//								setTimeout(function() {
//									window.location.href='main.php?page=home';
//                                    }, 2000);
//				});
//				  </script>";
            echo "1";
            exit();
        } else {
            echo "<br><p class='alert alert-danger'>ผิดพลาด! ไม่สามารถเข้าใช้งานระบบได้.</p>";
            exit();
        }
    }
}

function signIn_STD() {
    
}

function regiter() {
    $chtext = 'มีข้อมูลผู้ใช้นี้มีแล้วในระบบครับ';
    $chk = num_rows("tb_user", "where identification='$_POST[identification]'");
    if ($chk == 0) {
        $add = insert("identification,username,u_tel,lastname,firstname,password", "'$_POST[identification]','$_POST[username]',
			    '$_POST[u_tel]','$_POST[lastname]','$_POST[firstname]','$_POST[password]'", "tb_user");
        if ($add) {
            $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
            echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
        }
    } else {
        $modal = Modal("portlet-error", "error", "แจ้งเตือน", "$chtext");
        echo "<script>
                        $(function(){
                        $('#portlet-error').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}
function search_user()
{
    $user = select("tb_user","where identification=$_POST[identification]");
    if($user){
           echo "<script>
            $(function(){
            $('#emp_name').val('$user[firstname]'+' '+'$user[lastname]');
            $('#u_tel').val('$user[u_tel]');
            $('#user_id').val('$user[user_id]');            
            $('#br_date').val('".Date('d/m/Y')."');
            });
            </script>";
    }else{
        $modal = Modal("portlet-error", "error", "แจ้งเตือน", "ไม่มีสมาชิกหรือยังไม่ได้สมัครสมาชิก");
        echo "<script>
                        $(function(){
                        $('#portlet-error').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}
function add_book() {
    $chk = num_rows("tb_book", "where isbn='$_POST[isbn]' and is_ebook='0'");
    $chtext = 'มีข้อมูลหนังสือนี้แล้วในระบบครับ';
    $ebook = null;
    if (isset($_FILES['Uploadfile']['name'])) {
        $errors = array();
        $pic = $_FILES['Uploadfile']['name'];
        $file_size = $_FILES['Uploadfile']['size'];
        $file_tmp = $_FILES['Uploadfile']['tmp_name'];
        $file_type = $_FILES['Uploadfile']['type'];
        $tmp = explode('.', $_FILES['Uploadfile']['name']);
        $file_ext = strtolower(end($tmp));
        $pic_name = date('dmyHis') . 'L.' . $tmp[1];
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "extension not allowed, please choose a JPEG or PNG file.";
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = 'img/books/';
            move_uploaded_file($file_tmp, $path . $pic_name);
        } else {
            $chk = 1;
        }
    }
    if (isset($_FILES['file_name']['name'])) {
        $errors = array();
        $file_name = $_FILES['file_name']['name'];
        $file_size = $_FILES['file_name']['size'];
        $file_tmp = $_FILES['file_name']['tmp_name'];
        $file_type = $_FILES['file_name']['type'];
        $tmp = explode('.', $_FILES['file_name']['name']);
        $file_ext = strtolower(end($tmp));
        $ebook = date('dmyHis') . 'E.' . $tmp[1];
        $expensions = array("pdf");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "extension not allowed, please choose a ebook pdf file.";
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = 'ebook/';
            move_uploaded_file($file_tmp, $path . $ebook);
        } else {
            $chk = 1;
        }
    }

    if ($chk == 0) {
        $add = insert("isbn,bookname,author,publisher,publish_location,publish_year,edition,copy,category_id,sub_category_id,cover_price,is_ebook,keyword,status,cover,file_path", "'$_POST[isbn]','$_POST[bookname]',
			    '$_POST[author]','$_POST[publisher]','$_POST[publish_location]','$_POST[publish_year]','$_POST[edition]','$_POST[copy]','$_POST[category_id]','$_POST[sub_category_id]','$_POST[cover_price]','$_POST[is_ebook]','$_POST[keyword]','$_POST[status]','$pic_name','$ebook'", "tb_book");
        if ($add) {

            $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
            echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
        }
    } else {
        echo 'fail';
        $modal = Modal("portlet-error", "error", "แจ้งเตือน", "$chtext");
        echo "<script>
                        $(function(){
                        $('#portlet-error').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function edit_book() {
    $pic_name = "";
    $ebook = "";
    if (!empty($_FILES['Uploadfile']['name'])) {
        $errors = array();
        $pic = $_FILES['Uploadfile']['name'];
        $file_size = $_FILES['Uploadfile']['size'];
        $file_tmp = $_FILES['Uploadfile']['tmp_name'];
        $file_type = $_FILES['Uploadfile']['type'];
        $tmp = explode('.', $_FILES['Uploadfile']['name']);
        $file_ext = strtolower(end($tmp));
        $pic_name = date('dmyHis') . 'L.' . $tmp[1];
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "extension not allowed, please choose a JPEG or PNG file.";
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = 'img/books/';
            move_uploaded_file($file_tmp, $path . $pic_name);
        } else {
            $chk = 1;
        }
    }
    if (!empty($_FILES['file_name']['name'])) {
        $errors = array();
        $file_name = $_FILES['file_name']['name'];
        $file_size = $_FILES['file_name']['size'];
        $file_tmp = $_FILES['file_name']['tmp_name'];
        $file_type = $_FILES['file_name']['type'];
        $tmp = explode('.', $_FILES['file_name']['name']);
        $file_ext = strtolower(end($tmp));
        $ebook = date('dmyHis') . 'E.' . $tmp[1];
        $expensions = array("pdf");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "extension not allowed, please choose a ebook pdf file.";
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = 'ebook/';
            move_uploaded_file($file_tmp, $path . $ebook);
        } else {
            $chk = 1;
        }
    }
    $up = update("tb_book", "isbn = '$_POST[isbn]',bookname = '$_POST[bookname]',author ='$_POST[author]',publisher ='$_POST[publisher]',publish_location = '$_POST[publish_location]',publish_year = '$_POST[publish_year]',edition = '$_POST[edition]',copy = '$_POST[copy]',category_id = '$_POST[category_id]',sub_category_id = '$_POST[sub_category_id]',cover_price = '$_POST[cover_price]',is_ebook = '$_POST[is_ebook]',keyword = '$_POST[keyword]',status = '$_POST[status]',cover = '$pic_name',file_path = '$ebook'", "where book_id = '$_POST[h_val_id]'");
    if ($up) {
        echo $_POST['h_val_id'];
        $modal = Modal("portlet-success", "success", "ยินดีด้วย", "แก้ไขข้อมูลเรียบร้อยแล้วครับ");
        // echo "<script>
        //                 $(function(){
        //                 $('#portlet-success').modal();
        //                 });
        //                 setTimeout('parent.location.reload(true);',2000);
        //               </script>";
    }
}

function del_book() {
    $del = del("tb_book", "where book_id = '$_POST[book_id]'");
    if ($del) {
        $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลเรียบร้อยแล้วครับ");
        echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function del_books_all() {
    foreach ($_POST['book_id'] as $val) {
        $del = del("tb_book", "where book_id='$val'");
    }

    if ($del) {
        $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลที่เลือกเรียบร้อยแล้วครับ");
        echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function add_user() {
    $chk = num_rows("tb_user", "where user_id='$_POST[user_id]'");
    if ($chk == 0) {
        $add = insert("user_id,firstname,lastname,dept_id,g_id", "'$_POST[user_id]','$_POST[firstn]',
			    '$_POST[lastn]','$_POST[dept_id]','$_POST[g_id]'", "tb_user");
        if ($add) {
            $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
            echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
        }
    } else {
        $modal = Modal("portlet-error", "error", "แจ้งเตือน", "มีข้อมูลรหัสพนักงานนี้แล้วในระบบครับ");
        echo "<script>
                        $(function(){
                        $('#portlet-error').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function save_cat() {

    $chk = num_rows("tb_category", "where category_id='$_POST[category_id]'");
    if ($chk == 0) {
        $add = insert("category_id,category_name", "'$_POST[category_id]','$_POST[category_name]'", "tb_category");
        if ($add) {
            echo json_encode(array('r' => TRUE, 'data' => array($_POST['category_id'], $_POST['category_name']))); //
        } else {
            echo json_encode(array('r' => FALSE)); //
        }
    } else {
        echo json_encode(array('r' => FALSE, 'data' => 'มีข้อมูลรหัสหมวดหนังสือนี้แล้วในระบบครับ')); //  
    }
}

function save_sub_cat() {

    $chk = num_rows("tb_sub_category", "where sub_category_id='$_POST[sub_category_id]'");
    if ($chk == 0) {
        $add = insert("sub_category_id,sub_category_name,category_id", "'$_POST[sub_category_id]','$_POST[sub_category_name]','$_POST[category_id]'", "tb_sub_category");
        echo json_encode(array('r' => TRUE, 'data' => array($_POST['sub_category_id'], $_POST['sub_category_name']))); //
    } else {
        echo json_encode(array('r' => FALSE, 'data' => 'มีข้อมูลรหัสหมวดย่อยหนังสือนี้แล้วในระบบครับ')); //
    }
}

function edit_user() {
    $up = update("tb_user", "firstname = '$_POST[firstn]',lastname = '$_POST[lastn]',u_tel = '$_POST[teln]'", "where user_id = '$_POST[h_val_id]'");
    if ($up) {
        $modal = Modal("portlet-success", "success", "ยินดีด้วย", "แก้ไขข้อมูลเรียบร้อยแล้วครับ");
        echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function del_user() {
    $del = del("tb_user", "where user_id = '$_POST[user_id]'");
    if ($del) {
        $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลเรียบร้อยแล้วครับ");
        echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function del_user_all() {
    foreach ($_POST['user_id'] as $val) {
        $del = del("tb_user", "where user_id='$val'");
    }

    if ($del) {
        $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลที่เลือกเรียบร้อยแล้วครับ");
        echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
    }
}

function find_dept() {
    $q = trim($_GET["q"]);
    if (!$q)
        return;
    $sql = "SELECT dept_name FROM department WHERE dept_name LIKE '%$q%'";
    $rsd = mysql_query($sql);
    while ($rs = mysql_fetch_array($rsd)) {
        $cname = trim($rs['dept_name']);
        echo "$cname\r\n";
    }
}

function reading() {
    print_r($_POST);
   
}

function add_borrow() {
    $br_status = 3;
    $rec_realdate = date('Y-m-d H:i:s');
    $rec_date = date('Y-m-d H:i:s');
    $br_date = convFormatDate($_POST['br_date']);
    $doc_date = convFormatDate($_POST['doc_date']);
    $ret_date = convFormatDate($_POST['ret_date']);
    $add = insert("br_no,identification,br_date,doc_date,ret_date,remark,u_tel,br_status,rec_date,rec_realdate,user_id,is_borrow", "'$_POST[br_no]','$_POST[identification]','$br_date','$doc_date','$ret_date','$_POST[remark]','$_POST[u_tel]','$br_status','$rec_date','$rec_realdate','$_SESSION[user_id]','1'","tb_borrow");
    insert("br_ret_id,borrow_no","'$add','$_POST[br_no]'","tb_borrow_return");
    foreach ($_POST['book_id'] as $key => $value) {
        insert("br_id,book_id,br_no","'$add','$value','$_POST[br_no]'", "tb_borrow_btl");
        unset($_SESSION['borrow']);
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกการยืมเรียบร้อย");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
}

function add_booking() {
    $br_status = 1;
    $doc_date = convFormatDate($_POST['doc_date']);
    
    foreach ($_POST['book_id'] as $key => $value) {
        $add = insert("br_no,identification,doc_date,remark,u_tel,br_status,user_id", "'$_POST[br_no]','$_POST[identification]','$doc_date','$_POST[remark]','$_POST[u_tel]','$br_status','$_SESSION[user_id]'", "tb_borrow");
        insert("br_id,book_id,br_no", "'$add','$value','$_POST[br_no]'", "tb_borrow_btl");  
        insert("br_ret_id,borrow_no","'$add','$_POST[br_no]'","tb_borrow_return");      
        unset($_SESSION['book']);
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "กำลังจัดเตรียมหนังสือ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
}

function edit_borrow() {
    $br_date = convFormatDate($_POST['br_date']);
    $br_status = 1;
    $ret_date = convFormatDate($_POST['ret_date']);
    update("tb_borrow", "br_status='$br_status',br_date='$br_date',ret_date='$ret_date',is_borrow='1'", "where br_no='$_POST[br_no]'");
    print_r($_POST);
    exit();
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
}

function get_empname() {
    $user_id = $_POST['user_id'];
    $sql = select("tb_user un inner join department dm on un.dept_id	= dm.dept_id", "where user_id = '$user_id'");
    echo $sql['firstname'] . "@" . $sql['lastname'] . "@" . $sql['dept_id'] . "@" . $sql['dept_name'] . "@" . $sql['u_tel'];
}

function get_empname2() {
    $user_id = $_POST['user_id'];
    $sql = select("tb_user un inner join department dm on un.dept_id	= dm.dept_id", "where user_id = '$user_id'");
    echo $sql['firstname'] . "@" . $sql['lastname'];
}

function get_empname3() {
    $user_id = $_POST['user_id'];
    $sql = select("tb_user un inner join department dm on un.dept_id	= dm.dept_id", "where user_id = '$user_id'");
    echo $sql['firstname'] . "@" . $sql['lastname'];
}

function del_borrow() {
//    echo $_POST['br_no'];
//    exit();
//    $br_no = $_POST['br_no'];
    update("tb_borrow", "br_status='0'", "where br_no='$_POST[br_no]'");
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                       setTimeout(function() {
							window.location.href='main.php?page=borrow_list';
						}, 2000);
                      </script>";
}

function del_br_dtlid() {
    foreach ($_POST['br_dtlid'] as $v) {
        $chk = select("tb_borrow_dtl", "where br_dtlid='$v'");
        update("tb_documents", "doc_status=''", "where prd_order='$chk[prd_order]'");
        del("tb_borrow_dtl", "where br_dtlid='$v'");
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลที่เลือกเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('location.reload();',2000);
                      </script>";
}

function del_dtlid() {
    $chk = select("tb_borrow_dtl", "where br_dtlid='$_POST[dtlid]'");
    update("tb_documents", "doc_status=''", "where prd_order='$chk[prd_order]'");
    del("tb_borrow_dtl", "where br_dtlid='$_POST[dtlid]'");
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลที่เลือกเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('location.reload();',2000);
                      </script>";
}

function save_password() {    

    $c_password = $_POST['c_password'];
    $n_password = $_POST['n_password'];
    $r_password = $_POST['r_password'];
    $user_id = $_SESSION['user_id'];
    $chk = select("tb_user", "where user_id='$user_id' and password='$c_password'");
    if($chk){
        if($n_password ==$r_password){
            update("tb_user", "password='$r_password'", "where user_id='$user_id'");        
            $text = "เปลี่ยนาหัสผ้านรัยบรเ้อบ";
        }else{
            $text = "รหัสผ่านเข้ากันไม่ได้";
        }        
    }else{
        $text = "รหัสผ่านไม่ภูกต้อง";
    }
    
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "$text");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
}
function save_profile() {
    $user_id = $_SESSION['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $u_email = $_POST['u_email'];
    $u_tel = $_POST['u_tel'];
    update("tb_user", "firstname='$firstname',lastname='$lastname',u_email='$u_email',u_tel='$u_tel'", "where user_id='$user_id'");
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                        setTimeout('parent.location.reload(true);',2000);
                      </script>";
}

function un_approve() {
    update("tb_borrow", "br_apptxt='$_POST[txtRemark]',br_status='N'", "where br_no='$_POST[br_no]'");
    $docs = selects("tb_borrow_dtl", "where br_no='$_POST[br_no]'");
    foreach ($docs as $d) {
        update("tb_documents", "doc_status=''", "where prd_order='$d[prd_order]'");
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
							$(function(){
							$('#portlet-success').modal();
							});
							setTimeout('parent.location.reload(true);',1000);
						  </script>";
}

function approve() {
    $br_return = convFormatDate($_POST['br_return']);
    update("tb_borrow", "br_return='$br_return',br_approve='$_POST[br_approve]',br_status='Y'", "where br_no='$_POST[br_no]'");
    $docs = selects("tb_borrow_dtl", "where br_no='$_POST[br_no]'");
    foreach ($docs as $d) {
        update("tb_documents", "doc_status='A'", "where prd_order='$d[prd_order]'");
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
							$(function(){
							$('#portlet-success').modal();
							});
							setTimeout('parent.location.reload(true);',2000);
						  </script>";
}

function search_po() {
    $category_id = "";
    $sub_category_id = "";
    if($_POST['category_id']){
        $category_id = "category_id='$_POST[category_id]' and";
    }
    if($_POST['sub_category_id']){
        $sub_category_id = "sub_category_id='$_POST[sub_category_id]' AND";
    }
    $prd_order = explode(',', $_POST['prd_order']);
    $column_search = array('isbn', 'bookname', 'keyword', 'author');
    $result = array();
    if($_POST['prd_order']){
        foreach ($prd_order as $item) { // loop column 
            if ($item) { // if datatable send POST for search
                $r = selects('tb_book', "WHERE ($category_id  $sub_category_id(isbn LIKE '%$item%' OR bookname LIKE '%$item%' OR keyword LIKE '%$item%' OR author LIKE '%$item%')) ORDER BY bookname");
            }
            foreach ($r as $v) {
                $result[] = $v;
            }
        }
    }else{
        echo "ss";
        $result = selects('tb_book', "WHERE ($category_id  $sub_category_id(isbn LIKE '%$_POST[prd_order]%' OR bookname LIKE '%$_POST[prd_order]%' OR keyword LIKE '%$_POST[prd_order]%' OR author LIKE '%$_POST[prd_order]%')) ORDER BY bookname");
    }
    
    if($result==true){
        echo "<table width='100%' class='table table-striped table-bordered table-hover'>
            <tr class='alert alert-success'>
                <th>รูป</th>
                <th>ISBN</th>
                <th>ชื่อหนังสือ</th>
                <th>ปี่ที่พิมพ์</th>
                <th>ครั้งทีพิมพ์</th>
                <th>รายละเอียด</th>
                <th>ผู้แต่ง</th>
                <th>ประเภท</th>
                <th>สถานะ</th>
                <th>เลือก</th>
            </tr>";
        foreach ($result as $v) {

            echo "<tr style='cursor:pointer;'>
          <td align='center' valign='middle'><img width='100' src='img/books/" . $v['cover'] . "'></td>
          <td>$v[isbn]</td>
          <td>$v[bookname]</td>
          <td>$v[publish_year]</td>
          <td>$v[edition]</td>
          <td>$v[keyword]</td>
          <td>$v[author]</td>
          <td>" . databooktype($v['is_ebook']) . "</td>
              <td>" .dataStatus(check_status($v['book_id'])). "</td>
              <td>
              <a href='main.php?page=book_detail&b_no=" . $v["book_id"] . "' class='btn btn-primary'>ดูรายละเอียด</a>
              </td>
          </tr>";
        }
        echo '</table>';
    }else{
        echo "ไม่มีหนังสือที่ต้นหา";
    }
    
    //<a href='javascript:void(0)' onclick='selectbook()' id='select-book' class='btn btn-primary' aria-label=''><i class='fa fa-square-o' aria-hidden='true'></i></a>
}

function select_borrow() {
    $book_id = array();
    if (!empty($_SESSION["borrow"])) {
        $book_id = $_SESSION["borrow"]["book_id"];
    }
    if (!array_search($_GET['book_id'], $_SESSION["borrow"]["book_id"])) {
        $book_id[uniqid()] = $_GET['book_id'];
    }
    $_SESSION["borrow"]["book_id"] = $book_id;
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'main.php?page=borrow';
    header("Location: http://$host$uri/$extra");
    exit;
}

function select_book() {
    $book_id = array();
    if (!empty($_SESSION["book"])) {
        $book_id = $_SESSION["book"]["book_id"];
    }
    if (!array_search($_GET['book_id'], $_SESSION["book"]["book_id"])) {
        $book_id[uniqid()] = $_GET['book_id'];
    }
    $_SESSION["book"]["book_id"] = $book_id;
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'main.php?page=borrow';
    header("Location: http://$host$uri/$extra#tabs-3");
    exit;
}

function del_select_borrow() {
    if ($_POST['index'] == 'all') {
        unset($_SESSION["borrow"]);
    } else {
        unset($_SESSION["borrow"]["book_id"][$_POST['index']]);
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                       setTimeout(function() {
							window.location.href='main.php?page=borrow';
						}, 2000);
                      </script>";
}
function del_select_book() {
    if ($_POST['index'] == 'all') {
        unset($_SESSION["book"]);
    } else {
        unset($_SESSION["book"]["book_id"][$_POST['index']]);
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "ลบข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
                        $(function(){
                        $('#portlet-success').modal();
                        });
                       setTimeout(function() {
                            window.location.href='main.php?page=borrow';
                        }, 2000);
                      </script>";
}

function search_borrow() {
    $br_no = $_POST['br_no'];
    $br = select("tb_borrow br inner join tb_user un on br.user_id=un.user_id", "where br.br_no = '$br_no'");
    $br_dtl = selects("tb_borrow_btl", "where br_no = '$br[br_no]'");
    $ret_data = select("tb_user ur", "where ur.user_id = '$br[user_id]'");
    $br_date = ($br['br_date'] != '0000-00-00' ? DThai($br['br_date']) : '');
    $ret_date = ($br['ret_date'] != '0000-00-00' ? DThai($br['ret_date']) : '');
    $ret_realdate = ($br['ret_realdate'] != '0000-00-00' ? DThai($br['ret_realdate']) : '');
    if (empty($br['br_no'])) {
        echo "<center><font color='red'>ไม่พบรายการ เนื่องจาก มีการคืนรายการเอกสารแล้ว หรือ สถานะเอกสารยังไม่ได้ถูกยืม หรือ ยังไม่ได้รับการอนุมัติให้ยืม</font></center>";
    } else {
        echo "<table width='100%' cellpadding='3' cellspacing='3' class='table table-striped table-bordered table-hover'>
		<tr class='alert alert-success'>
		<th align='left'><input type='checkbox' id='chk_all'></th>
		<th align='left'>ลำดับที่</th>
		<th align='left'>ISBN. #</th>
		<th align='left'>ชื่อหนังสือ</th>
		<th align='left'>ประเภท</th>
		<th align='left'>สถานะหนังสือ</th>
		</tr>";
        $i = 1;
        $status = "";
        foreach ($br_dtl as $v) {
            $chk_doc = select("tb_book", "where book_id='$v[book_id]'");
            if ($v['is_return'] == TRUE) {
                $status = "<font color=green>รับคืนแล้ว</font>";
            } else {
                $status = "<font color=red>ยังไม่ได้รับคืน</font>";
            }
            echo "<tr>
		<td><input type='checkbox' name='chk[]' value='$v[borrow_btl_id]' class='checkboxes check'></td>
		<td>$i</td>
		<td>$chk_doc[isbn]</td>
		<td>$chk_doc[bookname]</td>
		<td>".databooktype($chk_doc['is_ebook'])."</td>
		<td>$status</td></tr>";
            $i++;
        }
        echo "</table>
        <table>
            <tr>
                <td><input type='checkbox' name='chk[]' value='0' class='check'></td>
                <td>ยังไม่คืนหนังสือ</td>
            </tr>
            <tr>
                <td><input type='checkbox' name='chk[]' value='00' class='check'></td>
                <td>เกินกำหนดคืนหนังสือแล้ว</td>
            </tr>
        </table>";
    }
    echo "<script>
$(function(){
$('#txt1').val('$br[identification]');
$('#txt2').val('$br[firstname]'+' '+'$br[lastname]');
$('#txt5').val('$br[u_tel]');
$('#txt6').val('$br_date');
$('#txt7').val('$ret_date');
$('#txt8').val('$br[remark]');
$('#txt9').val('$_SESSION[identification]');
$('#txt10').val('$_SESSION[firstname]  $_SESSION[lastname]');
$('#txt11').val('$ret_date');
$('#txt12').val('".Date('d/m/Y')."');
});
</script>";
}

function save_setting() {
    update("tb_setting", "sett_status='$_POST[sett_status]',sett_qr='$_POST[sett_qr]'", "where sett_id = 1");
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
							$(function(){
							$('#portlet-success').modal();
							});
							setTimeout('parent.location.reload(true);',1000);
						  </script>";
}

function return_borrow() {
    print_r($_POST);
    foreach ($_POST['chk'] as $d) {
        update("tb_borrow_btl", "is_return='1'", "where borrow_btl_id = '$d'");
    }    
    update("tb_borrow_return", "user_id='$_POST[user_id]',comment='$_POST[txt13]'", "where borrow_no = '$_POST[borrow_no]'");
    $num_rows = num_rows("tb_borrow_btl", "where br_no ='$_POST[borrow_no]' and is_return IS NULL");
    if($num_rows == 0){
        $ret_realdate = convFormatDate($_POST['txt12']);
        update("tb_borrow", "br_status='4',ret_realdate='$ret_realdate'", "where br_no ='$_POST[borrow_no]'");
    }else{
        update("tb_borrow", "br_status='7'", "where br_no ='$_POST[borrow_no]'");
    }
    $modal = Modal("portlet-success", "success", "ยินดีด้วย", "บันทึกข้อมูลเรียบร้อยแล้วครับ");
    echo "<script>
							$(function(){
							$('#portlet-success').modal();
							});
							setTimeout('parent.location.reload(true);',2000);
						  </script>";
}

?>
