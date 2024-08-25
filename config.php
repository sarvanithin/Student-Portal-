<?php
	$servername = "localhost";
    $username = "root";
    $password="";
    $dbname = "cart_system";
    // $dbport = 3302;

$conn = new mysqli($servername, $username,$password, $dbname);
if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
}

 $db = new mysqli($servername, $username,$password, $dbname);
 if($conn->connect_error){
 	die("Connection Failed".$conn->connect_error);
 }

 ?>
