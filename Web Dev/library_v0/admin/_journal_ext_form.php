      <form name="frm_add" action="admin_update_journal_ext_action.php" id="frm_add" method="post" enctype="multipart/form-data">
            <table width="100%" class="table table-striped table-bordered table-hover" style="margin-top:10px;">
            <thead>
                <tr class='alert alert-success'>
                    <th>URL</th>
                    <th>ชื่อวารสาร</th>
                    <th>ภาพประกอบ</th>
                </tr>
            </thead>
            <tbody>

<?PHP
           
                $statement = "tb_journal_ext  order by id asc";
                $cont = "SELECT *  FROM {$statement} ;";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
                while ($data = mysql_fetch_array($query)) {
                     
                        ?>
                    <tr style="cursor:pointer;" >
                        
                        <td>
                            <input  type="hidden" name="id[]" value="<?= $data['id']; ?>" />
                            <input style="width:100%;" type="text" name="url[]" value="<?= $data['url']; ?>" />
                        </td>
                        
                        <td>
                           <input style="width:100%;" type="text" name="title[]" value="<?= $data['title']; ?>" />
                        </td>

                         <td>
                           <input style="width:100%;" type="file" name="cover[]" />
                           <?php if($data['cover']!="") : ?>
                           
                           <img class="thumpnail" src="../img/<?= $data['cover']; ?>" style="width:150px; " alt="<?= $data['title']; ?>"/>
                        <?php endif; ?>
                        </td>

                      </tr>
                    <?PHP
                }
                ?>
</tbody>
</table>
<center> 
                <input id="btn_saved" name="btn_saved" type="submit" value="บันทึกข้อมูล" class="btn btn-primary">
                <input id="btn_cancel" name="btn_cancel" type="reset" value="ยกเลิก" class="btn btn-danger"> 
                
            </center>
 </form>