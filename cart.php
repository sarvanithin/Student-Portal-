<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Cart</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><i class="fas fa-gift"></i>&nbsp; Student Activity</a>

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
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger">3</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div style="display: <?php if(isset($_SESSION['showAlert'])){ echo $_SESSION['showAlert']; } else{ echo 'none'; } unset($_SESSION['showAlert'])?>;" class="alert alert-success alert-dismissible mt-3">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong><?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];} unset($_SESSION['message']) ?></strong>
			</div>
	<!-- 		<div  class="alert alert-success alert-dismissable mt-3">
				<button type="button" class="close" data-dismiss="alert">
		  			<strong></strong>
				</button>
			</div> -->
			<div class="table-responsive mt-2">
				<table class="table table-bordered table-striped text-center">
					<thead>
						<tr>
							<th colspan="7"> <!--colspan set number of colums-->
								<h4 class="text-center text-info m-0">Cart Summary</h4>
							</th>
						</tr>
						<tr>
							<th>ID</th>
							<th>Image</th>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total Price</th>
							<th>
								<a href="action.php?clear-all" onclick="return confirm('Do you want to clear all the products in your cart?')" class="badge badge-danger p1"><i class="fas fa-trash"></i>Clear Cart</a>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require 'config.php';
							$stmt = $conn->prepare("SELECT * FROM cart");
							$stmt->execute();
							$result = $stmt->get_result();
							$grand_total = 0;
              // echo $result->fetch_assoc()['id'];
							while($row = $result->fetch_assoc()):
						 ?>
						 <tr>
						 	<td><?= $row['id'] ?></td>
              <input type="hidden" class="pid" value="<?= $row['id']?>">
						 	<td><img src="<?= $row['product_image'] ?>" height="75"></td>
						 	<td><?= $row['product_name'] ?></td>
						 	<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= $row['product_price'] ?></td>
              <input type="hidden" class="pprice" value="<?= $row['product_price']?>">
						 	<td><input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width: 75px;"></td>
						 	<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= $row['total_price'] ?></td>
						 	<td>
						 		<a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead"><i class="fas fa-trash-alt" onclick="return confirm('Do you want to clear this product in your cart?')"></i></a>
						 	</td>
						 	<?php $grand_total+= $row['total_price'] ?>
						 </tr>
						<?php endwhile; ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3"><a class="btn btn-success" href="index.php"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Continue Shopping</a></th>
							<td colspan="2"><b>Grand Total</b> </td>
							<td colspan="1"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= $grand_total ?></td>
							<td><a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>" ><i class="fas fa-credit-card"></i>&nbsp;&nbsp;Credit Card</a></td>
						</tr>
					</tfoot>
				</table>
			</div>

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
    $(".itemQty").on('change', function(){
        var $l = $(this).closest('tr');
        var pid = $l.find(".pid").val();
        var pprice = $l.find(".pprice").val();
        var qty = $l.find(".itemQty").val();
        // console.log(qty);
        // e.preventDefault();
        location.reload(true);
        $.ajax({
          url:'action.php',
          method: 'POST',
          cache: 'false',
          data: {qty:qty, pid:pid, pprice:pprice},
          success: function(response){
            console.log('Success after itemQty update')
            // console.log(response);
          }
        })
    })
		update_cart();
		function update_cart(){
			$.ajax({
				url: 'action.php',
				method: 'GET',
				data: {counter: ""},
				success: function(response){
					$("#cart-item").html(response);
				}
			});
		}
	})
</script>
</body>
</html>
