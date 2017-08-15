<h2>หนังสือ แนะนำ</h2>
<div  style="margin-top:20px; width:100%; height:330px; overflow:auto;">
<div  style="width:1800px;">
	<?php
$i = 0;
	foreach (selects("tb_book","") as $key => $value) : 
	?>
	  <div style="width:135px; float:left; margin-left:8px;box-shadow: 0px 1px 2px; #ededed; border-color:solid thin #ededed;height:270px;">
		      <?php 
		      	if(empty($value['cover'])){
		      		$img = "img/default.png";
		      	}else{
		      		$img = "img/books/".$value['cover'];
		      	}		      	 
		      ?>
			  <center>
		      	<img src="<?=$img?>" style="margin-left:auto; margin-right:auto; min-width:120px; max-width:120px; min-height:140px;" class="thumbnails">
		      	<div style="overflow:hidden; width:90%;margin-top:5px;"><?=$value['bookname']?></div>
		      	<div style="margin-bottom: 5px;margin-top:15px;">
		      	
				<?php if($value['is_ebook']==TRUE): ?>
		      		
					<a href="#" onclick="reading('<?=$value['file_path']?>',<?=$value['book_id']?>)">อ่านหนังสือ</a>  | 
					
		      	<?php endif ?>
		      		
					<a href="#" onclick="showdatail(<?=$value['book_id']?>)">รายละเอียด</a>
		      	</div>
		      </center>
				<!-- /. end  -->
	  </div>	  
  	<?php 
	if(++$i == 9){
		break;
	}
	endforeach; ?>
</div>
</div>


<?php
	foreach (selects("tb_category","") as $k => $v) : 
	?>
	<br/><br/>
<h2><?=$v['category_name']?></h2>
<div  style="margin-top:20px; width:100%; height:330px; overflow:auto;">
<div  style="width:1800px;">
	<?php
$i = 0;
	foreach (selects("tb_book","where category_id='". $v['category_id'] ."'") as $key => $value) : 
	?>
	  <div class="span2" style="box-shadow: 0px 1px 2px; #cecece;">
		      <?php 
		      	if(empty($value['cover'])){
		      		$img = "img/default.png";
		      	}else{
		      		$img = "img/books/".$value['cover'];
		      	}
		      ?>
			  <center>
		      	<img src="<?=$img?>" style="margin-left:auto; margin-right:auto; min-width:120px; max-width:120px; min-height:180px;" class="thumbnails">
		      	<h3 style="overflow:hidden; word-wrap:normal;"><?=$value['bookname']?></h3>
		      	<div style="margin-bottom: 5px;margin-top:15px;">
		      	<?php if($value['is_ebook']==TRUE): ?>
		      		<a href="#" onclick="reading('<?=$value['file_path']?>',<?=$value['book_id']?>)">อ่านหนังสือ</a> | 
		      	<?php endif ?>
					<a href="#" onclick="showdatail(<?=$value['book_id']?>)">รายละเอียด</a>
		      	</div>
		      </center>
				<!-- /. end  -->
	  </div>	  
  	<?php 
	if(++$i == 9){
		break;
	}
	endforeach; ?>
</div>
</div>
<?php
endforeach;
?>

<script type="text/javascript">
	function reading(path,id){
        var ebook = path;
        $.fancybox({
            'width': '90%',
            'height': '100%',
            'autoScale': true,
            'transitionIn': 'fadein',
            'transitionOut': 'fadeout',
            'type': 'iframe',
            'href': 'ebook.php?ebook=' + ebook +"&id=" + id
        });
    };
    function showdatail(id)
    {
    	document.location.href = "main.php?page=book_detail&b_no="+id;
    }
</script>
