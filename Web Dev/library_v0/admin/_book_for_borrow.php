
<div class="modal " 
     id="login-modal" tabindex="-1" 
     role="dialog" 
     aria-labelledby="myModalLabel" 
     aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
				
					<h1>รายการหนังสือ และสื่ออื่นๆ</h1><br>
				  <!-- start -->
				  
    <center>
            <?PHP
                $statement = "tb_book  where is_ebook <> '3' order by bookname desc";
                $cont = "SELECT *  FROM {$statement}";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
			
			?>
        </center>
		
		<div style="height:450px; overflow:scroll;">
<table width="100%" class="table table-striped table-bordered table-hover" style="">
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
                        <td><input type="checkbox" class="chk_borrow_books" value="<?=$data['book_id'];?>=<?=$data['isbn'];?>=<?=$data['bookname'];?>=<?=$data['author'];?>" /></td>
                        <td align="center" valign="middle"><img alt="<?=$data['bookname'];?>" width="70" src='<?= $path?>'></td>
                        <td><?= $data['isbn']; ?></td>
                        <td><?= $data['bookname']; ?></td>
                        <td><?= $data['publish_year']; ?></td>
                        <td><?= $data['edition']; ?></td>
                        <td><?= $data['keyword']; ?></td>
                        <td><?= $data['author']; ?></td>                                                
                         
                        
                    </tr>
                    <?PHP
                }
                ?>
            </tbody>
        </table>
         </div>
<div >
<br/>
<input type="button"   class="btn btn-primary pull-right" value="ตกลง" data-toggle="modal" data-target="#login-modal"  />
</div>
        <script type="text/javascript">
var selectItem = array();
        function selectItem(json) {
            var vstr = "";
           $(".chk_borrow_books").each(function(i,e){ 
               if(e.checked == true){
                   selectItem.push(e.value);
               }
			   
                //console.log(e.value);
            });
        }
</script>

				  
				  
				  
				  <!-- end -->
				</div>
				 
			</div>
		  </div>

		  