<?php
date_default_timezone_set('Asia/Bangkok');
$upload_dir = "uploads/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . mktime() . ".png";
$success = file_put_contents($file, $data);
header("content-Type:application/json");
print $success ? "{'result':'".$file."'}" : "{'result':'Unable to save the file.'}" ;
?>