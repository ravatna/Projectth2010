<?php
include "include/config.php";
include "include/function.php";
$category='where category_id='.$_GET["category"];
echo '<select name="statename">' . "\n";
echo '<option selected="selected" value="">เลือกหมวดย่อยหนังสือ...</option>' . "\n";
foreach (selects('tb_sub_category',$category) as $link)  {
    echo '<option value="' . $link['sub_category_id'] . '">' . $link['sub_category_name'] . '</option>' . "\n";
    }
    echo '<option value="add">เพิ่มหมวดย่อยหนังสือ...</option>' . "\n";
echo '</select>';
?>
