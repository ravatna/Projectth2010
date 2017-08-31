
<div class="modal " 
     id="booking-modal" tabindex="-1" 
     role="dialog" 
     aria-labelledby="myModalLabel1" 
     aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
				
					<h1>จากผู้ทำรายการจองหนังสือ และสื่ออื่นๆ</h1><br>
				  <!-- start -->
				  
     
		
		<div style="height:450px; overflow:scroll;">
<table width="100%" class="table table-striped table-bordered table-hover" style="margin-top:10px;">
            <thead>
                <tr class='alert alert-success'>
                    <th>เลือก</th>
					<th>ผู้ต้องการยืม</th>
                    <th>รูป</th>
                    <th>ISBN</th>
                    <th>ชื่อหนังสือ</th>
                    <th>ปี่ที่พิมพ์</th>
                    <th>ครั้งทีพิมพ์</th>
                    
                    <th>ผู้แต่ง</th>
                    
                    
                   
                    
                </tr>
            </thead>
            <tbody>
                <?PHP
                
                $statement = " (
(tb_booking left join tb_book on tb_booking.book_id = tb_book.book_id)
 left join tb_user on tb_booking.user_id = tb_user.user_id)  where tb_user.g_id <> '3' order by tb_booking.created_at desc";
                 $cont = "SELECT *  FROM {$statement}  ";
                $query = mysql_query($cont);
                if ($query === FALSE) {
                    die(mysql_error()); // TODO: better error handling
                }
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
                        <td><input type="checkbox" class="chk_borrow_item" value="<?=$data['book_id'];?>=<?=$data['isbn'];?>=<?=$data['bookname'];?>=<?=$data['author'];?>" /></td>
                        <td><?= $data['firstname']; ?> <?= $data['lastname']; ?></td>
						
						<td align="center" valign="middle"><img   width="100" src='<?= $path?>'></td>
                        <td><?= $data['isbn']; ?></td>
                        <td><?= $data['bookname']; ?></td>
                        <td><?= $data['publish_year']; ?></td>
                        <td><?= $data['edition']; ?></td>
                        
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
<input type="button"   class="btn btn-primary pull-right" value="ตกลง" data-toggle="modal" data-target="#booking-modal"  />
</div>
        <script type="text/javascript">
var selectItem = array();
        function selectItem(json) {
            var vstr = "";
           $(".chk_borrow_item").each(function(i,e){ 
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

		  