<?php
  require 'config.php';
  $grand_total = 0;
  $allItems  = '';
  $items = array();
  $sql = "SELECT CONCAT(product_name, '(',qty,')') AS itemQty, total_price from CART";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  // $i=0;
  while($row = $result->fetch_assoc()){
    $grand_total+=$row['total_price'];
    $items[] = $row['itemQty'];
  }
  // print_r($items);
  $allItems = implode(',',$items);
  // print_r($allItems);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 	<title>Shopping Cart System</title>
 </head>
 <body>
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
   <!-- Brand -->
   <a class="navbar-brand" href="index.php"><i class="fas fa-gift"></i>&nbsp; Student Activity Website</a>

   <!-- Toggler/collapsibe Button -->
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
     <span class="navbar-toggler-icon"></span>
   </button>

   <!-- Navbar links -->
   <div class="collapse navbar-collapse" id="collapsibleNavbar">
     <ul class="navbar-nav ml-auto">
       <li class="nav-item">
         <a class="nav-link active" href="index.php">Products</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Categories</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="checkout.php">Checkout</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger">8</span></a>
       </li>
     </ul>
   </div>
 </nav>
 <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-2" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
            <h6 class="lead"><b>Product(s): </b><?= $allItems; ?></h6>
            <h6 class="lead"><b>Delivery Fee: </b>$0.00</h6>
            <h6 class="lead"><b>Total Amount: </b><?= $grand_total; ?></h6>
        </div>
        <form id="placeOrder" action="" method="post">
          <input type="hidden" name="products" value="<?=$allItems; ?>">
          <input type="hidden" name="grand_total" value="<?=$grand_total ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Enter Email Address" required>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Enter Mobile Number" required>
          </div>
          <div class="form-group">
            <textarea type="text" name="address" class="form-control" rows="3" cols="10" placeholder="Enter Email Address" required></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
              <select class="form-control" name="pmode">
                <option value="" >-Select Payment Mode-</option>
                <option value="cod">Cash On Delivery</option>
                <option value="netbanking" >Net Banking</option>
                <option value="cards">Debit/ Credit Card</option>
              </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>

    </div>
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
    $("#placeOrder").submit(function(e){
      e.preventDefault(); //Stops page refresh
      $.ajax({
        url:'action.php',
        method:'POST',
        data:$('form').serialize()+"&action=order",
        success:function(response){
          console.log(response);
          $("#order").html(response);
        }
      });
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
