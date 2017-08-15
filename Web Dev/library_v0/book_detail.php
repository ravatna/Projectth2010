<?PHP
$data = select("tb_book", "where book_id='$_GET[b_no]'");
$num_rows = num_rows("tb_borrow_btl", "where book_id =$data[book_id] and is_return IS NULL");
?>
<div id="resp"></div>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">หนังสือ </a></li>
    </ul>
    <div id="tabs-1">
        <table width="70%" border="0" align="center" cellpadding="2" cellspacing="1">
                <tr>
                    <td width="20%" align="left" valign="middle">
                        <?php 
                            if(!empty($data['cover'])){
                                $path = 'img/books/'.$data['cover'];
                            }else{
                                $path = 'img/default.png';
                            }
                        ?>
                        <img width="200" src="<?= $path ?>">
                    </td>
                    <td width="50%" valign="top" align="left">                        
                        <table width="70%" border="0" cellpadding="2" cellspacing="1">
                            <tr>
                                <th valign="top" align="left">ชื่อหนังสือ</th>
                                <td><?= $data['bookname'] ?></td>
                            </tr>
                            <tr>
                                <th valign="top" align="left">ผู้แต่ง:</th>
                                <td><?= $data['author'] ?></td>
                            </tr>
                            <tr>
                                <th valign="top" align="left">ปีทีพิพม์:</th>
                                <td><?= $data['publish_year'] ?></td>
                            </tr>
                            <tr>
                                <th valign="top" align="left">สำนักพิพม์:</th>
                                <td><?= $data['publisher'] ?></td>
                            </tr>
                            <tr>
                                <th valign="top" align="left">สถานะ:</th>
                                <td>                                          
                                    <?= dataStatus(check_status($_GET['b_no'])) ?>
                                </td>                         
                            </tr>
                            <tr>
                                <th valign="top" align="left"></th>                        
                            </tr>
                            <tfoot>
                                <tr>
                                    <td valign="top" align="left" colspan="2">
                                        <?php if($data['copy']-$num_rows>0): ?>
                                        <form action='action.php'>
                                            <input type='hidden' name='op' value='select_borrow'>
                                            <input type='hidden' name='book_id' value="<?= $data['book_id'] ?>">
                                            <input style="width: 40%" type="submit" name="button" id="button" value="ยืมหนังสือ" class="btn btn-primary"/>
                                        </form>
                                        <?php else: ?>
                                        <form action='action.php'>
                                            <input type='hidden' name='op' value='select_book'>
                                            <input type='hidden' name='book_id' id="book_id" value="<?= $data['book_id'] ?>">
                                            <input style="width: 40%" type="submit" name="button" id="button" value="จองหนังสือ" class="btn btn-primary"/>
                                        </form>
                                        <?php endif ?>

                                    </td>                               
                                </tr>
                                <?php if($data['is_ebook']==TRUE): ?>
                                <tr>
                                    <td valign="top" align="left" colspan="2">      
                                        <input type="hidden" id="ebook" value="<?=$data['file_path']?>">
                                        <input style="width: 40%" type="button" name="button" id="button_detail" value="อ่านหนังสือ" class="btn btn-warning"/>
                                    </td>                               
                                </tr>
                                <?php endif; ?>
                            </tfoot>
                        </table>
                    </td>                    
                </tr>                
            </table>
    </div>    
    
</div>
<script type="text/javascript">
    $("#tabs").tabs();
    $("#button_detail").click(function () {        
        var ebook = $("#ebook").val();
        var id = $("#book_id").val();
        $.fancybox({
            'width': '90%',
            'height': '100%',
            'autoScale': true,
            'transitionIn': 'fadein',
            'transitionOut': 'fadeout',
            'type': 'iframe',
            'href': 'ebook.php?ebook=' + ebook +"&id=" + id
        });
    });
//    $("#button_detail").click(function () {
//        
//        document.location.href = "main.php?page=ebook";
//    });
</script>