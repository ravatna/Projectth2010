<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host = "localhost";
$user= "root";
$password = "root";
$database = "examdb";
$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("database down");
}