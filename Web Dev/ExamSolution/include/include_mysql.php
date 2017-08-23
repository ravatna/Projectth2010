<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host = "localhost";
$user= "root";
$password = "12345678";
$database = "examdb";
$conn = mysqli_connect($host, $user, $password, $database);

mysqli_query($conn,"SET character_set_results=utf8");
mysqli_query($conn,"SET character_set_client=utf8");
mysqli_query($conn,"SET character_set_connection=utf8");

if(!$conn){
    die("database down");
}