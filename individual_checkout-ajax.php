<?php
include("config.php");
    session_start();
    $name = $_GET['name'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $paythod = $_GET['paymethd'];
    $totalpay = $_GET['totalpay'];
    $currdate=date("Y/m/d H:i:s");
    $orderdetail = $_GET['orderdetail'];
    $orderid = $_GET['orderid'];
    $type = $_GET['type'];
    $loginid = $_SESSION['loginid'];
    $id= array();
  //  $id = explode($orderid,",");
// echo $currdate;
   // Escape User Input to help prevent SQL Injection
  $error="";
   //echo $pricemin;
   try{
     $sql = "update cart set isPurchased=1 where id in ($orderid)";
     // echo $sql;
     $result = mysqli_query($db,$sql);
   }
   catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
}
//$que
    try{


		   $sql = "insert into orderhistory(name, address, email, paymethod, orderdetail, orderdate, total, userid,type) values('$name','$address','$email','$paythod','$orderdetail','$currdate','$totalpay','$loginid','$type')";

             $result = mysqli_query($db,$sql);
             $error = "success";
		     }catch(PDOException $e)
             {

			 echo $sql . "<br>" . $e->getMessage();
			}
   //$query = "insert into orders()";

   //$query .= " AND gendertype ='$gender'";
  // echo $query;

   //$qry_result = mysqli_query($db,$query) or die(mysqli_error());


   echo $error;
?>
