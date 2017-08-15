
                <?PHP
                header("Content-Type:application/json; charset=utf8");
                include_once ("../include/config.php");
                include_once ("../include/function.php");

                $statement = "tb_book  where book_id='". $_REQUEST['book_id']."' order by book_id asc";
                $cont = "SELECT *  FROM {$statement}";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
                $data = mysql_fetch_array($query);
                     
    echo json_encode($data);


                     ?>