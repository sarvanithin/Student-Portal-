<?php
   include("config.php");
   session_start();
   $errorflag=true;
   $mypassword="";
   $cpassword="";
   $errordept =" ";
	$error=" ";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
    global  $errorflag,$mypassword,$cpassword,$errordept,$error;
	  //echo  $errorflag;
	  $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
      $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
	  $department = mysqli_real_escape_string($db,$_POST['department']);

	  $address = mysqli_real_escape_string($db,$_POST['Address']);
	  $phone = mysqli_real_escape_string($db,$_POST['phone']);
	  $email = mysqli_real_escape_string($db,$_POST['email']);
	  $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  $cpassword = mysqli_real_escape_string($db,$_POST['confirm_password']);

	validation();

      if (!$errorflag){


	 $sql = "SELECT email FROM userdetail WHERE email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //   $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
		 $error="User already exists!";

      }else {
		  try{

		   $sql = "insert into userdetail(firstname,lastname,address,phone, email, password, department) values('$firstname','$lastname','$address',$phone,'$email','$mypassword','$department')";

             $result = mysqli_query($db,$sql);
             $error = "registration Successful";
		     }catch(PDOException $e)
             {
			 echo $sql . "<br>" . $e->getMessage();
			}
			}
		}


   }

   function validation(){
	 global $mypassword;
		 global $cpassword;
		 global $errordept,$errorflag,$error;

if ($mypassword == $cpassword){
$errorflag=faLSE;
}
else{

	$error= "Password and Confirm Password not matched ";
	$errorflag=true;
}

	}



?>
<html>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 550px;
  padding: 4% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 550px;
  margin: 0 auto 100px;
  padding: 35px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form select,.form select-selected {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.heb {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
 text-align:center;
  outline: 0;
  background: #4CAF50;
  max-width: 550px;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 18px;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .messageerror {
  margin: 0px 0 0;
  color: red;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: ;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {

  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$('#password, #confirm_password').on('keyup', function () {
	alert("sd");
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else
    $('#message').html('Not Matching').css('color', 'red');
})
//$('.message a').click(function(){
  // $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
//});
//oninvalid="setCustomValidity('Enter correct phone number')" onchange="try{setCustomValidity('')}catch(e){}"
</script>
<body>
   <div class="login-page">
     <div class="heb">Registration</div>
	 <div class="form">

       <form class="register-form" method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" placeholder="First Name" name = "firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>" />
        <input type="text" placeholder="Last Name" name = "lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>"/>
		<input type="text" placeholder="Address" name = "Address" value="<?php echo isset($_POST["Address"]) ? $_POST["Address"] : ''; ?>" />
		<input type="tel" pattern="[0-9]{10}" title="Enter correct phone number"  placeholder="Phone Number" name = "phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>"/>
		<select name="department" id="department" required>
			<option value="">Select Department</option>
		    <option value="Computer Science">Computer Science</option>
			<option value="Data science">Data Science</option>
		</select>
		<input type="email"  placeholder="Email" name = "email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"/>
		<input type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="try{setCustomValidity('')}catch(e){}" oninvalid="setCustomValidity('Password must contain one uppercase letter, one lowercase letter and a numeric value')"  placeholder="Password" name = "password" required/>
		<input type="password" placeholder="Confirm Password" id="confirm_password" name = "confirm_password" required/>
        <span id='message'></span>
        <button type = "submit">create</button>
        <p class="message">Already registered? <a href="login.php">Sign In</a></p>
		<br/>
		 <p class="messageerror"><?php echo $error; ?></p>

       </form>

     </div>
   </div>
</body>
</html>
