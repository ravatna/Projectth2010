<div class="row">
<div class="col-md-8">
    <a class="btn btn-lg btn-primary" href="admin_update_book.php?is_ebook=<?=@$_GET['is_ebook']?>"><span class="glyphicon glyphicon-plus"></span> เพิ่มรายการ</a>
     <a class="btn btn-lg btn-primary" onclick="printBarcode();" href="#" ><span class="glyphicon glyphicon-print"></span> พิมพ์ บาร์โค๊ด</a>
</div>

<div class="col-md-4">
    <form id="search" action="admin_manage_book.php?is_ebook=<?=@$_GET['is_ebook'];?>"> 
        <select id="is_ebook" >
            <option value="1">หนังสือเล่ม</option>
            <option value="3">E-Book</option>
            <option value="4">CD-DVD</option>
            <option value="5">สื่ออื่นๆ</option>
        </select> 

        <span class="glyphicon glyphicon-search" onclick="searchSubmit();"></span>&nbsp; 
        
        <script type="text/javascript">
            function searchSubmit(){
                var f = document.getElementById("search");
                window.location = "admin_manage_book.php?is_ebook=" + document.getElementById("is_ebook").options[document.getElementById("is_ebook").options.selectedIndex].value;
            }
        </script>
    </form>
</div>
</div>
    <center>
            <?PHP
			$page = (int) (!isset($_GET["subpage"]) ? 1 : $_GET["subpage"]);
                $limit = 50;
                $startpoint = ($page * $limit) - $limit;
                $statement = "tb_book  where is_ebook='". $_GET['is_ebook']."' order by book_id desc";
                $cont = "SELECT *  FROM {$statement} LIMIT {$startpoint} , {$limit}";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			
            echo guPagination($statement, $limit, $page, $url = '?page=books&is_ebook='.@$_GET['is_ebook'].'&');
            ?>
        </center>
<table width="100%" class="table table-striped table-bordered table-hover" style="margin-top:10px;">
            <thead>
                <tr class='alert alert-success'>
                     <th style="width:8px;"> เลือก</th>
                    <th>รูป</th>
                    <th>ISBN</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ปี่ที่พิมพ์</th>
                    <th>ครั้งทีพิมพ์</th>
                    <th>รายละเอียด</th>
                    <th>ผู้แต่ง</th>
                    <th>ประเภท</th>
                    <th>จำนวน</th>
                    <th>จำนวนที่ยืม</th>
                    <th>Status</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                
                while ($data = mysql_fetch_array($query)) {
                     ?>
                    <?php 
                            if(!empty($data['cover'])){
                                 $path = '../img/books/'.$data['cover'];
                            }else{
                                $path = '../img/default.png';
                            }
                        ?>
                    <tr style="cursor:pointer;" >
                        <td><input type="checkbox" class="chk_books" value="<?=$data['book_id'];?>" /></td>
                        <td align="center" valign="middle"><img alt="<?=$data['bookname'];?>" width="100" src='<?= $path?>'></td>
                        <td><?= $data['isbn']; ?></td>
                        <td><?= $data['bookname']; ?></td>
                        <td><?= $data['publish_year']; ?></td>
                        <td><?= $data['edition']; ?></td>
                        <td><?= $data['keyword']; ?></td>
                        <td><?= $data['author']; ?></td>                                                
                        <td><?= databooktype($data['is_ebook']);  ?> </td>
                        <td><?= $data['copy']; ?></td>

                        <td><?= num_rows("tb_borrow_btl br_b inner join tb_borrow br on br_b.br_no=br.br_no", "where book_id =$data[book_id] and is_return IS NULL AND br.is_borrow='1'"); ?> เล่ม</td>
                        
                        <td style="background-color:<?= $data['row_color']; ?>;"><?= dataStatus(check_status($data['book_id'])) ?></td>
                        
                        <td align='center'>
                            <a class="btn btn-sm btn-primary" href="admin_update_book.php?is_ebook=<?=@$_GET['is_ebook']?>&book_id=<?= $data['book_id']; ?>"><span class="glyphicon glyphicon-pencil"></a>
                            </td>
                        <td align='center'>
                            <a class="btn btn-sm btn-danger" href="admin_update_book_del.php?is_ebook=<?=@$_GET['is_ebook']?>&book_id=<?= $data['book_id']; ?>"><span class="glyphicon glyphicon-trash"></a>
                            </td>
                    </tr>
                    <?PHP
                }
                ?>
            </tbody>
        </table>
        <center>
            <?PHP
            echo guPagination($statement, $limit, $page, $url = '?page=books&is_ebook='.@$_GET['is_ebook'].'&');
            ?>
        </center>

        <script type="text/javascript">

        function printBarcode() {
            var vstr = "";
           $(".chk_books").each(function(i,e){ 
               if(e.checked == true){
                   vstr += e.value + "|";
               }
                //console.log(e.value);
                
            });

            window.open("book_barcode_a4.php?books=" + vstr);
        }

</script>