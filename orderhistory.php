<?php include 'index.php';
// session_start();
if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
table, td, th {
  border: 1px solid #ddd;
  text-align: left;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  margin: 0 auto auto;
  text-align: center;
  width:100%;
   background: #f2f2f2;
    padding: 15px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
</head>
<body>
<div class="form">
    <center>
<h3><b>Order History</b></h3>
</center>
</div>
<?php
include("config.php");
 // session_start();
// Create connection
// Check connection
$userid=$_SESSION['loginid'];

$sql = "select * from orderhistory where userid=$userid order by orderdate desc";
 $retval = mysqli_query( $db, $sql);
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

     $display_string = "<table class="."table".">";
   $display_string .= "<thead class="."thead-dark".">";
   $display_string .= "<tr>";
   $display_string .= "<th>Name</th>";
   $display_string .= "<th>Shipping Address</th>";
   $display_string .= "<th> Email</th>";
   $display_string .= "<th>Order Details</th>";
   $display_string .= "<th>Order Date</th>";
  $display_string .= "<th>Payment Method</th>";
  $display_string .= "<th>Totat Amount</th>";
  $display_string .= "</tr>";
   $display_string .= "</thead>";


    echo "$display_string";
    // output data of each row

    while($row = mysqli_fetch_array($retval)) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["address"]. "</td><td>" . $row["email"]. "</td><td>" . $row["orderdetail"]. "</td><td>" . $row["orderdate"]. "</td><td>" . $row["paymethod"]. "</td><td>" . $row["total"]. "</td></tr>";
    }
    echo "</table>";



?>

</body>
</html>
