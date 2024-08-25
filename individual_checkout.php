<?php
session_start();
$loginid = $_SESSION['loginid'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
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
<!--Main layout-->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Checkout</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-md-8 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <form class="card-body" autocomplete="off">

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-6 mb-2">

                <!--firstName-->
                <div class="md-form ">
                  <input type="text" id="firstName" class="form-control" placeholder="First name">
                  <label for="firstName" class=""></label>
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6 mb-2">

                <!--lastName-->
                <div class="md-form">
                  <input type="text" id="lastName" class="form-control" placeholder="Last Name">
                  <label for="lastName" class=""></label>
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--email-->
            <div class="md-form mb-5">
              <input type="text" id="email" class="form-control" placeholder="youremail@example.com">
              <label for="email" class=""></label>
            </div>

            <!--address-->
            <div class="md-form mb-5">
              <input type="text" id="address" class="form-control" placeholder="1234 Main St">
              <label for="address" class=""></label>
            </div>

            <!--address-2-->
            <div class="md-form mb-5">
              <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
              <label for="address-2" class=""></label>
            </div>

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-lg-4 col-md-12 mb-4">

                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Select...</option>
                  <option>United States</option>
                  <option>United Kingdom</option>
                  <option>India</option>
                  <option>Germany</option>
                  <option>Australia</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Select...</option>
                  <option>California</option>
									<option>Texas</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="Credit Card" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" value="Debit Card" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" value="PayPal" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button onclick="ajaxFunction()" class="btn btn-primary btn-lg btn-block" type="">Continue to checkout</button>

          </form>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-4 mb-4">

        <!-- Heading -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span id="counter" class="badge badge-secondary badge-pill">3</span>
        </h4>
				<div style="display: <?php if(isset($_SESSION['showAlert'])){ echo $_SESSION['showAlert']; } else{ echo 'none'; } unset($_SESSION['showAlert'])?>;" class="alert alert-success alert-dismissible mt-3">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];} unset($_SESSION['message']) ?></strong>
				</div>
        <!-- Cart -->
        <?php
    			include 'config.php';

          $userid = $_SESSION['loginid'];
    			$stmt = $conn->prepare("SELECT CONCAT(product_name, '(',qty,')') AS itemQty,id,total_price,qty,product_name,product_price FROM cart where type=? and isPurchased=0 and userid=?");
    			if(!$stmt){
           			echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
        		}
          $stmt->bind_param("si",$_GET['type'],$userid);
    			$stmt->execute();
    			$result = $stmt->get_result();
          $total = 0;
          $allIds = '';
          $ids = array();
          $allProducts = '';
          $products = array();
    			while($row = $result->fetch_assoc()):
            $total+=$row['total_price'];
            $ids[] = $row['id'];
            $products[] = $row['itemQty'];
    		 ?>

        <ul class="list-group mb-3 z-depth-1">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"><?=$row['product_name'] ?></h6>
              <small class="text-muted">x<?=$row['qty'] ?></small>
            </div>
            <span class="text-muted">$<?= $row['product_price'] ?></span>
						<a href="action.php?remove=<?= $row['id'] ?>&type=<?= $_GET['type']?>" class=""><i class="fas fa-trash-alt" onclick="return confirm('Do you want to clear this product in your cart?')"></i></a>
          </li>
        <?php endwhile;
        $allIds = implode(",",$ids);
        $allProducts = implode(",",$products);
        ?>
          <?php include 'config.php';
					if(explode(" ",$_GET['name'])[0]=="meal"):
            // echo explode(" ",$_POST['name'])[0];
						$sql = ("select * from cart where userid='$loginid' and type='meal' and product_name='Semester Plan'");
						$chc = mysqli_query($conn, $sql);
						$chck = mysqli_num_rows($chc);
						if($chck>0):
             ?>
	          <li class="list-group-item d-flex justify-content-between bg-light">
	            <div class="text-success">
	              <h6 class="my-0">Discount</h6>
	              <small><?= explode(" ",$_GET['name'])[0];?></small>
	            </div>
	            <span class="text-success">-<?=$total*(15/100)  ?></span>
	          </li>
	          <li class="list-group-item d-flex justify-content-between">
	            <span>Total (USD)</span>
	            <strong><?= $total*(85/100) ?></strong>
	          </li>
	        <?php else: ?>
	            <li class="list-group-item d-flex justify-content-between">
	              <span>Total (USD)</span>
	              <strong>$<?= $total ?></strong>
	            </li>
          <?php endif; ?>
				<?php endif; ?>
					<?php 	if(explode(" ",$_GET['name'])[0]=="book"):
						// echo explode(" ",$_POST['name'])[0];
						$sql = ("select total from orderhistory where userid='$loginid' and type='book' order by orderdate desc LIMIT 1");
						$chc = mysqli_query($conn, $sql);
						// if ($row=mysqli_fetch_array($chc)):
						$row=mysqli_fetch_array($chc);
						$totl = intval($row['total']);
						if($totl>=200):
						 ?>
						<li class="list-group-item d-flex justify-content-between bg-light">
							<div class="text-success">
								<h6 class="my-0">Discount</h6>
								<small>OVER200</small>
							</div>
							<span class="text-success">-<?=$total*(10/100)  ?></span>
						</li>
						<li class="list-group-item d-flex justify-content-between">
							<span>Total (USD)</span>
							<strong><?= $total*(90/100) ?></strong>
						</li>
					<?php else: ?>
							<li class="list-group-item d-flex justify-content-between">
								<span>Total (USD)</span>
								<strong>$<?= $total ?></strong>
							</li>
					<?php endif; ?>
				<?php endif; ?>
				<?php 	if(explode(" ",$_GET['name'])[0]=="bus"): ?>
					<li class="list-group-item d-flex justify-content-between">
						<span>Total (USD)</span>
						<strong>$<?= $total ?></strong>
					</li>
			<?php endif; ?>
        </ul>
        <!-- Cart -->

        <!-- Promo code -->
        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
            </div>
          </div>
        </form> -->
        <!-- Promo code -->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">


  <!--/.Call to action-->

  <hr class="my-4">

  <!-- Social icons -->
  <div class="pb-4">
    <a href="https://www.facebook.com/mdbootstrap" target="_blank">
      <i class="fab fa-facebook-f mr-3"></i>
    </a>

    <a href="https://twitter.com/MDBootstrap" target="_blank">
      <i class="fab fa-twitter mr-3"></i>
    </a>

    <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
      <i class="fab fa-youtube mr-3"></i>
    </a>

    <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
      <i class="fab fa-google-plus-g mr-3"></i>
    </a>

    <a href="https://dribbble.com/mdbootstrap" target="_blank">
      <i class="fab fa-dribbble mr-3"></i>
    </a>

    <a href="https://pinterest.com/mdbootstrap" target="_blank">
      <i class="fab fa-pinterest mr-3"></i>
    </a>

    <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
      <i class="fab fa-github mr-3"></i>
    </a>

    <a href="http://codepen.io/mdbootstrap/" target="_blank">
      <i class="fab fa-codepen mr-3"></i>
    </a>
  </div>
  <!-- Social icons -->

  <!--Copyright-->
  <div class="footer-copyright py-3">
    © 2019 Copyright:
    <a href="" target="_blank"> StudentActivityWebsite </a>
  </div>
  <!--/.Copyright-->

</footer>
<!--/.Footer-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    console.log("Called");
      $.ajax({
        url: 'action.php',
        method: 'GET',
        data: {count :'cart_individual', type: <?php echo '"'.$_GET['type'].'"' ?>},
        success: function(response){
          $('#counter').html(response);
        }
      })
    // });
  })
  function ajaxFunction(){
              var ajaxRequest;  // The variable that makes Ajax possible!

              try {
                 // Opera 8.0+, Firefox, Safari
                 ajaxRequest = new XMLHttpRequest();
              }catch (e) {
                 // Internet Explorer Browsers
                 try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                 }catch (e) {
                    try{
                       ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e){
                       // Something went wrong
                       alert("Your browser broke!");
                       return false;
                    }
                 }
              }

              // Create a function that will receive data
              // sent from the server and will update
              // div section in the same page.

              ajaxRequest.onreadystatechange = function(){
                 if(ajaxRequest.readyState == 4){
                   // var ajaxDisplay = document.getElementById('ajaxDiv');
// alert("fd");
          // alert("response"+ajaxRequest.responseText);
            if(ajaxRequest.responseText=="success"){
              // console.log("success",queryString);
               window.location.href="confirmation.php";

            }
                 }
              }

              // Now get the value from user and pass it to
              // server script.
         // alert(document.getElementById('gender').value);
              var firstn = document.getElementById('firstName').value;
              var lastn = document.getElementById('lastName').value;
        var mail = document.getElementById('email').value;
        var address = document.getElementById('address').value;
        // address = address+ document.getElementById('address-2').value;
        //alert(firstn);
      // alert ('<?php echo $total; ?>');
        var total="<?php echo $total; ?>";
        var orderdetail = "<?php echo $allProducts; ?>";
        var orderid = "<?php echo $allIds; ?>";
        // alert(orderid);
        var radios = document.getElementsByName('paymentMethod');
				var type=<?php echo '"'.$_GET['type'].'"' ?>;
var paymethod="";
for (var i = 0, length = radios.length; i < length; i++)
{
if (radios[i].checked)
{
 // do whatever you want with the checked radio
 paymethod=radios[i].value;

 // only one radio can be logically checked, don't check the rest
 break;
}
}
       // alert(paymthod);
                    var queryString = "?name=" + firstn+" "+lastn ;

              queryString +=  "&email=" + mail + "&address=" + address + "&paymethd=" + paymethod+"&totalpay=" +total+"&orderdetail="+orderdetail+"&orderid="+orderid+"&type="+type;
            ajaxRequest.open("GET", "individual_checkout-ajax.php" + queryString, true);
              ajaxRequest.send(null);
           }

  if ( window.history.replaceState ) {
             window.history.replaceState( null, null, window.location.href );
           }
</script>
</body>
</html>
