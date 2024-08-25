<?php
session_start();
if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html style="height: 100%; width: 100%">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
	<title>Student Activity Website</title>
</head>
<body style="margin: 0;padding: 0;font-family: sans-serif; height:100%; width:100%" class="purple-gradient">
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
			<li class="nav-item">
					<a class="nav-link" onclick="goToCheck(this)" href="#">Checkout</a>
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
<!-- Section: Pricing table -->
<section id="four" class="pricing-table align-items-center mt-4">

<div class="container">

  <div class="row">
  <?php include 'config.php';
    $stmt=$conn->prepare("select * from mealplan");
    $stmt->execute();
    $r = $stmt->get_result();
    while($row = $r->fetch_assoc ()):
    $name = $row['name'];
     ?>
    <div class="col-lg-6">
      <div class="card mb-5 mb-lg-0">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center"><?=$row['name']; ?></h5>
          <?php if ($row['name']=='Month Plan'): ?>
            <h6 class="card-price text-center"><b>$<?=$row['price'] ?></b><span class="term">/Semester</span></h6>
          <?php else: ?>
            <h6 class="card-price text-center"><b style="text-decoration: line-through; font-size: 20px">$3000</b><b>$<?=$row['price']*(85/100) ?></b><span class="term">/Semester</span></h6>
          <?php endif; ?>
          <!-- <h6 class="card-price text-center">$9<span class="term">/month</span></h6> -->
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Meal Swipes</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Dining Dollars:</strong> 300</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Meal Equivalency:</strong> 2/Day</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Guest Passes</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Mobile Ordering</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Loyalty Program</li>
            <?php if ($row['name']=='Month Plan'): ?>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Limited</strong> Free Delivery</li>
              <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Rollover</li>
            <?php else: ?>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Delivery</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Rollover</li>
            <?php endif; ?>
            <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Delivery</li>
            <li class="grey-text"><span class="fa-li"><i class="fas fa-times"></i></span>Rollover</li> -->
          </ul>
          <a href="#" id="<?=$row['id'] ?>" class="btn btn-block btn-purple z-depth-0 btn-rounded my-2">purchase</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
    <!-- Pro Tier -->
    <!-- <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title grey-text text-uppercase text-center">Monthly Plan</h5>
          <h6 style="font-size: 20px;" class="card-price text-center">$<b class="price">600</b><span class="term">/month</span></h6>
          <hr class="my-4">
          <ul class="fa-ul">
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Meal Swipes</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Dining Dollars:</strong> 300</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Meal Equivalency:</strong> 2/Day</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Guest Passes</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Mobile Ordering</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Loyalty Program</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Limited</strong> Free Delivery</li>
            <li><span class="fa-li"><i class="fas fa-check"></i></span>Rollover</li>
          </ul>
          <a href="individual_checkout.php" id="month" class="btn btn-block btn-purple z-depth-0 btn-rounded my-2">purchase</a>
        </div>
      </div>
    </div> -->
  </div>
</div>

</section>
<!-- Section: Pricing table -->

<!-- Scrollspy -->
 <div class="dotted-scrollspy">
   <ul class="nav smooth-scroll clearfix d-none d-sm-flex flex-column">
    <li class="nav-item"><a class="nav-link" href="#one"><span></span></a></li>
    <li class="nav-item"><a class="nav-link" href="#two"><span></span></a></li>
    <li class="nav-item"><a class="nav-link" href="#three"><span></span></a></li>
    <li class="nav-item"><a class="nav-link" href="#four"><span></span></a></li>
  </ul>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript">
function goToCheck(e){
	window.location.href='individual_checkout.php?name=meal&type=meal';
}
$(document).ready(function(){
  $(".btn").click(function(e){
    e.preventDefault();
    console.log("clicked");
    var id = e.target.id;
    var type = "meal";
    var $near = $(this).closest(".card-body");
    var name = $near.find(".card-title").html();
    console.log(name);
    // console.log(price).innerText;
    $.ajax({
      url: "action.php",
      method: "post",
      data: {id:id,type:type},
      success: function(response){
        // console.log(response);
        if(response==type){
              window.location.href = 'individual_checkout.php?name='+type+'&type='+type;
          }
				if(response=="Already"){
					alert("Already in cart!");
					window.location.href = 'individual_checkout.php?name='+type+'&type='+type;
				}
				if (response=="Present"){
					alert("A Semester/ Month Plan is already added to the cart, You can either purchase Monthly/ Semester wise plan");
				}
        }
      })
    })
  // initialize scrollspy
  $('body').scrollspy({
  target: '.dotted-scrollspy'
  });
})
</script>
</body>
</html>
