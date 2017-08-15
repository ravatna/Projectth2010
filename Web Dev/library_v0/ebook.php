<?php 
	/* Set locale to Dutch */
	setlocale(LC_ALL, 'Thai');

	include "include/config.php";
	include "include/function.php";
	insert("book_id,read_at_date", "'$_GET[id]','".Date('Y-m-d H:s:i')."'", "tb_views");
?>
<iframe width="100%" height="650" src="web/viewer.html?file=../ebook/<?=$_GET['ebook']?>#magazineMode=true"></iframe>   
<br><br>
