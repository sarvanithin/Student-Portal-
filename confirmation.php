<?php include("index.php"); 


if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <h5>Thank You!</h5>
      <h6>Your Order has been successfully placed !! </h6>
    </div>
  </body>
</html>
