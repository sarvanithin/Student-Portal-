<?php
   include("config.php");
  include("index.php");

if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}

 header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
 header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); //HTTP/1.1
header("Pragma: no-cache");

   $errorflag=true;
   $mypassword="";
   $cpassword="";
   $errordept =" ";
	$error=" ";
	$changepass=0;;
  $login = $_SESSION['loginid'];
	//$_POST["firstname"]="mohit";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
    global  $errorflag,$mypassword,$cpassword,$errordept,$error;
	//  echo  $errorflag;
	  $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
      $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
	  $department = mysqli_real_escape_string($db,$_POST['department']);
	  $address = mysqli_real_escape_string($db,$_POST['Address']);
	  $phone = mysqli_real_escape_string($db,$_POST['phone']);
	  $email = mysqli_real_escape_string($db,$_POST['email']);
	  $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  $cpassword = mysqli_real_escape_string($db,$_POST['confirm_password']);
	  $changepass = mysqli_real_escape_string($db,isset($_POST['changepass']));

	 // $cpassword = mysqli_real_escape_string($db,$_POST['confirmpassword']);
	if ($changepass==1){
	validation();
	}
	else{
		$errorflag=false;
	}
      // echo "If result matche, table row must be 1 row";

  if (!$errorflag){
			try{
		     $sql = "update userdetail set firstname='$firstname',lastname='$lastname',address='$address',phone=$phone";
             if ($changepass==1){
//echo "pas";
			$sql =$sql.",password='$mypassword'";
			 }
			 $sql=$sql." where email='$email'";
             $result = mysqli_query($db,$sql);
             $error = "Information Updated Successful";
		     }catch(PDOException $e)
             {
			 echo $sql . "<br>" . $e->getMessage();
			}
		  }

       // $db.close;
   }else
   {// get the all the details of the loged in user as set that value to the textbox.
 $sql = "select * from userdetail where id='$login'";// addd session varible when integration is done
   $retval = mysqli_query( $db, $sql);
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysqli_fetch_array($retval)) {
      // echo "EMP ID :{$row['email']}  <br> ";
     $_POST['firstname'] = $row['firstname'];
     $_POST['lastname']= $row['lastname'];
	 $_POST['department'] = $row['department'];
	 $_POST['Address'] = $row['address'];
	 $_POST['phone'] = $row['phone'];
	 $_POST['email']= $row['email'];

   }
   }

   function validation(){
	 	 global $mypassword;
		 global $cpassword;
		 global $errordept,$errorflag,$error;
 //echo "chnage ".$mypassword . $cpassword;
if ($mypassword == $cpassword){
$errorflag=false;
//echo "same";
}
else{
//echo "not same";
	$error= "Password and Confirm Password not matched ";
	$errorflag=true;
}

	}
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Student Activity Website</title>
</head>
<style>
<?php
include('updateinformation.css');

?>
</style>
<script>
//$('.message a').click(function(){
  // $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
//});
</script>
<body>
<form method="post" enctype="multipart/form-data" autocomplete="off">



   <div class="detail-page">
   <center>
     <div class="heb">personal details</div>
  </center>
	 <div class="form">
       <form class="register-form" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p>First Name</p>
		<input type="text" placeholder="First Name" name = "firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>"  required/>
        <p>Last Name</p>
		<input type="text" placeholder="Last Name" name = "lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>" required/>
		<p>Address</p>
		<input type="text" placeholder="Address" name = "Address" value="<?php echo isset($_POST["Address"]) ? $_POST["Address"] : ''; ?>" required/>
		<p>Phone Number</p>
		<input type="text" placeholder="Phone Number" pattern="[0-9]{10}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('Enter correct phone number')"  name = "phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" required/>
		<p>Department</p>
		<input type="text" placeholder="Department" name = "department" value="<?php echo isset($_POST["department"]) ? $_POST["department"] : ''; ?>" readonly />
		<p>Email</p>
		<input type="email"  placeholder="Email" name = "email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" readonly/>
		<p></p>
		<p style="display: block"><input type="checkbox" style="width:auto"name="changepass" value="good"/><label style="block:inline">Check the box to Change Password</label></P>
		<p>Password</p>
			<input type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('Password must contain one uppercase letter, one lowercase letter and a numeric value')" placeholder="Password" name = "password"/>
		<p>Confirm Password</p>
		<input type="password" placeholder="Confirm Password" id="confirm_password" name = "confirm_password" />
        <button type = "submit">Update Details</button>

		 <p class="messageerror"><?php echo $error; ?></p>

       </form>

     </div>
   </div>
   </form>
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
