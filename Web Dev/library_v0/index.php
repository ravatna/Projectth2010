<?php 
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'std_index.php?page=home';
    header("Location: http://$host$uri/$extra");
    exit;
?>