<?php session_start();
if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Student Activity Website</title>
</head>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="main.php">&nbsp; Student Activity</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Account
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="orderhistory.php">Order History</a>
              <a class="dropdown-item" href="updateinformation.php">Details</a>
              <a class="dropdown-item" href="contact.php">Contact Us</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
      </ul>
    </div>
  </nav>

<!-- Poll container -->
<div class="container">
  <div class=" card text-center mt-4 shadow p-3 mb-5 bg-white rounded">
    <div class=" text-center card-header">
      <h3>Texas State Univeristy Student Organization Head Voting - Vote Your Favorite</h3>
    </div>
      <div class="card-body all-divs" id="card-body">
        <form class="pollForm" action="" method="post">
          <?php include 'config.php';
          $stmt=$conn->prepare("select * from poll_contestants");
          $stmt->execute();
          $r = $stmt->get_result();
          while($row = $r->fetch_assoc()):
          ?>
            <div class="custom-control custom-checkbox">
              <input type="radio" name="poll" class="custom-control-input" value="<?=$row['id'] ?>" id="customCheck<?=$row['id']?>">
              <label class="custom-control-label" for="customCheck<?=$row['id']?>"><?=$row['name'] ?></label>
            </div>
        <?php endwhile ?>
        </form>
      </div>
      <div class="card-footer text-muted">
        <button  class="btn btn-info" id="submit" type="submit">Vote</button>
        <button class="btn btn-info" id="view">View Results</button>
      </div>
</div>

<div class="alldivs">

</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $("#submit").click(function(e){
      console.log("entered");
      e.preventDefault();
      var a = $("input[name=poll]:checked").val();
      console.log(a);
      if(a== undefined){
        alert('Select a valid Choice');
      }
      else {  $.ajax({
        method:'POST',
        url:'action.php',
        data: {a:a},
        success: function(response){
          console.log("In poll ",response);
          $("#card-body").html(response);
          $("#submit").replaceWith('<a class="btn btn-info" href="main.php">Back to Home</a>');
          console.log("response");
        }
      });}
    });
    $("#view").on('click',function(e){
      var a = document.getElementById("view");
      $('#submit').prop('disabled', true);
      $('#view').prop('disabled', true);
      $.ajax({
        url: 'action.php',
        method: 'GET',
        data: {view: "viewResults"},
        success: function(response){
          console.log(response);
          $("#card-body").html(response);
          $("#submit").replaceWith('<a class="btn btn-info" href="main.php">Back to Home</a>');
        }
      })
    });
		update_cart();
		function update_cart(){
			$.ajax({
				url: 'action.php',
				method: 'GET',
				data: {counter: "cart_item"},
				success: function(response){
					$("#cart-item").html(response);
				}
			});
		}
	})
</script>
</body>
</html>
