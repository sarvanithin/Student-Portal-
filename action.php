<?php
	session_start();
	require 'config.php';
	$loginid = $_SESSION['loginid'];
	if(isset($_POST['pid'])){
		echo "entered";
		$pid = $_POST['pid'];
		$pname = $_POST['pname'];
		$pprice = $_POST['pprice'];
		$pimage = $_POST['pimage'];
		$pcode = $_POST['pcode'];
		$pqty = 1;
		// echo $pid, $pname;
		$stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
		$stmt->bind_param("s",$pcode); //s here is the datatype of the product_code i.e. to_be_binded variable Generally called placeholder
		$stmt->execute();
		$res = $stmt->get_result();
		$r = $res->fetch_assoc();
		$code = $r['product_code'];
		// echo $code;
		$total_price = $pprice*$pqty;
		if(!$code){
			echo"Not code";
			$query = $conn->prepare("INSERT INTO cart (product_name, product_price, product_image, qty, total_price, product_code) VALUES (?,?,?,?,?,?)");
			echo $pname, $pprice, $total_price;
			$query->bind_param("sssiss", $pname, $pprice, $pimage, $pqty, $total_price, $pcode);
			$query->execute();
			echo '<div class="alert alert-success alert-dismissible mt-2">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Item added to your cart!</strong>
				</div>';
		}
		else{
			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Item updated in the cart!!!</strong>
				</div>';
		}
	}
	if(isset($_GET['counter'])=="cart_item"){
			// echo "In Overa";
			$query1 = $conn->prepare("SELECT * from CART");
			$query1->execute();
			$query1->store_result();
			$rows = $query1->num_rows; // TO get count of rows
			// echo "In overall";
			echo $rows;
		}

// Individual counter
if(isset($_GET['count'])=="cart_individual" && isset($_GET['type'])!=null){
	// echo"Enter";
	$type = $_GET['type'];
	$query = $conn->prepare("SELECT * from CART where type=? and userid='$loginid' and isPurchased=0");
	$query->bind_param("s",$type);
	$query->execute();
	$query->store_result();
	$rows = $query->num_rows; // TO get count of rows
	// echo "In individual_checkout";
	echo $rows;
}
		// Apply discount
		if(isset($_GET['discount'])){
			$type = $_GET['discount'];
			$stmt = $conn->prepare("select sum(total_price) AS TOTAL from cart where type=?");
			$stmt->bind_param('s', $type);
			$stmt->execute();
			$amt = $stmt->get_result()->fetch_assoc();
			echo $amt['TOTAL'];
			if($type == 'book'){
				$_SESSION['showAlert'] = 'block';
				$_SESSION['message'] = 'Congratulations! You have earned a coupon of 10% discount which can be applied on your next purchase';
				// header('location: individual_checkout.php');
			}

		}

// Clear cart aprticular item
	if(isset($_GET['remove'])){
		$id = $_GET['remove'];
		$type= $_GET['type'];
		$stmt = $conn->prepare("delete from cart where id=?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from cart';
		header('location: individual_checkout.php?name='.$type.'&type='.$type);
	}

	if(isset($_GET['clear-all'])){
		$stmt = $conn->prepare("delete from cart");
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message']  = 'All Items cleared from the cart!';
		header('location: cart.php');
	}

	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];
		echo $pprice;
		$tprice = $qty*$pprice;
		$stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
		$stmt->bind_param("iis",$qty,$tprice ,$pid);
		$stmt->execute();
	}

	if(isset($_POST['action']) && isset($_POST['action'])=='order'){
		// echo "enetered";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$products = $_POST['products'];
		$grand_total = $_POST['grand_total'];
		$address = $_POST['address'];
		$pmode = $_POST['pmode'];
		$name = $_POST['name'];
		$data = '';
		$stmt = $conn->prepare("INSERT INTO ORDERS(name, email, phone, address, pmode, products, amount_paid) values (?,?,?,?,?,?,?)");
		$stmt->bind_param("issssss",$name, $email, $phone, $address, $pmode, $products, $grand_total);
		$stmt->execute();
		$data .='<div class="text-center">
			<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
			<h2 class="text-success">Your Order has been placed successfully! :D</h2>
			<h4 class="bg-danger text-light rounded p-2">Items Purchased: '.$products.'</h4>
			<h4>Your Name: '.$name.'</h4>
			<h4>Your Email: '.$email.'</h4>
			<h4>Your Phone: '.$phone.'</h4>
			<h4>Total Amount Paid: '.$grand_total.'</h4>
			<h4>Payment Mode: '.$pmode.'</h4>
		</div>';
		echo $data;
	}

	  if(isset($_POST['a'])){
	    $id = $_POST['a'];
			$getTotal = $conn->prepare("select * from poll_results where id=?");
			$getTotal->bind_param("i", $id);
			$getTotal->execute();
			$numVotes = $getTotal->get_result()->fetch_assoc()['votescount'];
			$getName = $conn->prepare("select * from poll_contestants where id=?");
			$getName->bind_param('i',$id);
			$getName->execute();
			$name=$getName->get_result()->fetch_assoc()['name'];
			// echo $name;
			if ($numVotes==0){
				$numVotes=$numVotes+1;
				// echo $numVotes;
				$stmt1 = $conn->prepare("insert into poll_results (id,name,votescount) values (?,?,?)");
				$stmt1->bind_param("isi",$id,$name,$numVotes);
				$stmt1->execute();
				// echo "First Time";
			}
			else{
			$numVotes=$numVotes+1;
			// echo $numVotes;
			$stmt = $conn->prepare("update poll_results set votescount=? where id=?");
			$stmt->bind_param("ii",$numVotes,$id);
			$stmt->execute();
		}
		echo "<h4> Your vote for $name has been successfully casted. Thank You! </h4> 	";
	  }

		if (isset($_GET['view'])=="viewResults"){
			// echo "Heyeye";
			$stmt = $conn->prepare("SELECT sum(votescount) AS totalCount from poll_results");
			if(!$stmt){
						echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
				}
			// echo "123";
			$stmt->execute();
			$res = $stmt->get_result()->fetch_assoc();
			// echo "456";
			$a = $res['totalCount'];
			$stmt2 = $conn->prepare("select * from poll_results");
			$stmt2->execute();
			$stmt2->store_result();
			$num = $stmt2->num_rows;
			$stmt2->free_result();
			$stmt2->close();
			$stmt3= $conn->prepare("select * from poll_results order by votescount desc");
			$stmt3->execute();
			$re = $stmt3->get_result();
			$ress = array();
			$d = '';
			// echo "Hey";
			// echo $re['votescount'];
			// echo ;
			// echo $re['id'];
			$percent =100;
			// $d.="<div class='text-center'>";
			while($r = $re->fetch_assoc()) {
				// <div class="progress">
  			// <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
				// </div>
				// 	$d.="<h4>".round(($r['votescount']/$a)*$percent)."</h4> <br>";
				$d.='<h5 style="text-align: flex-start; font-size: 12px">'.$r['name'].'</h5>';
				$d.=sprintf('<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: %u%%;" aria-valuenow="%u" aria-valuemin="0" aria-valuemax="100">%u%%</div>
</div><br>',round(($r['votescount']/$a)*$percent),round(($r['votescount']/$a)*$percent),round(($r['votescount']/$a)*$percent));
			}
			echo $d;
		}

		// Purchasing Textbooks Online
		if(isset($_POST['book_title'])){
			$qty = 1;
			$title = $_POST['book_title'];
			$price = 50;
			$total = $price*$qty;
			$id = $_POST['book_id'];
			$img = $_POST['book_image'];
			$type = $_POST['type'];
			echo $img;
			echo $_POST['book_image'], $price,$price*$qty;
			$stmt=$conn->prepare("insert into cart(product_name,product_price,product_image,qty,total_price,product_code,type,userid) values (?,?,?,?,?,?,?,?)");
			$stmt->bind_param("sssisssi",$title, $price, $img, $qty, $total, $id,$type,$loginid);
			$stmt->execute();
		}

		if(isset($_GET['first'])){
			$first = $_GET['first'].'%';
			$last = $_GET['last'].'%';
			$dept = $_GET['dept'].'%';
			// echo "Hey I am Query!!!";
			$stmt = $conn->prepare('select * from people where firstname like ? and lastname like ? and department like ?');
			if(!$stmt){
						echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
				}
			$stmt->bind_param("sss",$first,$last,$dept);
			$stmt->execute();
			// $res = array();%$
			$div='';
			$res = $stmt->get_result();
			while ($row = $res->fetch_assoc()) {
				if($row['isStudent']==1)
					$type = 'Student';
				else if($row['isFaculty']==1)
					$type = 'Faculty';
				else
					$type='Admin';
				$div.=('<div class="text-center mr-2 ml-2 pd-2" style="inline-block; float:left;><div className="shadow p-3 mb-5 bg-white rounded bg-light-green dib br3 br3 pa3 ma2 grow bw2 shadow-5">
									<img alt="Robots" height="150" width="150" " src="https://robohash.org/'.$row['id'].'">
									<div>
										<h2>'.$row['firstname'].'</h2>
										<h2>'.$row['lastname'].'</h2>
										<p>'.$row['department'].'</p>
										<p>'.$row['phone'].'</p>
										<p>'.$row['email'].'</p>
										<p>'.$type.'</p>
									</div>
				</div></div>');
		}
		echo $div;
}
// Meal Plan Purchase
if(isset($_POST['type'])=="meal") {
	// echo "In meal Plan";
	$check_mp = $conn->prepare("select * from cart where userid=? and (product_name like 'Month%' or product_name like 'Semester%') and isPurchased=0");
	$check_mp->bind_param("i",$loginid);
	$check_mp->execute();
	$check_mp->store_result();
	$cnt = $check_mp->num_rows;
	if ($cnt>0) {
		echo "Present";
	}
	else{
	$id = $_POST['id'];
	$get_mp = $conn->prepare("select * from mealplan where id=?");
	$get_mp->bind_param("i",$id);
	$get_mp->execute();
	$mp = $get_mp->get_result()->fetch_assoc();
	$name = $mp['name'];
	$price = $mp['price'];
	$type = $_POST['type'];
	$qty = 1;
	$total = $price*$qty;
	$product_code = $mp['pcode'];
	$res = $conn->prepare("select * from cart where product_code=? and userid=? and isPurchased=0");
	$res->bind_param("si",$product_code,$loginid);
	$res->execute();
	$code = $res->get_result()->fetch_assoc()['product_code'];
	if(!$code){
		$a = $name;
		$b= $price;
		$c = $qty;
		$d = $price*$qty;
		$e = $product_code;
		$f = $_POST['type'];
	// echo $a,$b,$c,$d,$e,$f;
		$stmt = $conn->prepare("INSERT INTO cart (product_name, product_price, qty, total_price, product_code,type,userid) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("ssisssi",$a,$b,$c,$d,$e,$f,$loginid);
		$stmt->execute();
		echo $type;
}
else{
	echo "Already";
}
}
}

if(isset($_GET['start'])){
	$title = $_GET['evnt'].'%';
	$category = $_GET['category'].'%';
	$start = $_GET['start']===''?'COALESCE(startdatetime, NOW())':$_GET['start'];
	$end = $_GET['end']===''?"COALESCE(enddatetime, NOW())":$_GET['end'];
	$eventRes = $conn->prepare("select * from events where title like ? and category like ? and startdatetime>=? and enddatetime<=? order by startdatetime");
	if(!$eventRes){
				echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
		}
	$eventRes->bind_param("ssss",$title, $category, $start, $end);
	$eventRes->execute();
	$e = $eventRes->get_result();
	$div='';
	while($event=$e->fetch_assoc()){
			$div.=('<div class="card mt-2 mb-2 ml-2 mr-2" style="display:inline-block; float: left;">
									<div class="view overlay">
										<img src="" class="card-img-top" alt="">
									</div>
									<div class="card-body">
										<p id="'.$event["id"].'" hidden></p>
										<h4 class="card-title">'.$event['title'].'</h4>
										<p class="card-text">'.$event['details'].'</p>
										<h6>Category: '.$event['category'].'</h6>
										<h6>Venue: '.$event['venue'].'</h6>
										<h6>Artist:'.$event['artist'].'</h6>
										<button onClick="renderBookmark(this)" id="'.$event["id"].'" type="button" class="going btn btn-success">Going</button>
										<button type="button" class="notgoing btn btn-danger">Not Going</button>

								</div>
							</div>');

	}
	echo $div;
}

// Bus tickets into cart;
if(isset($_POST['bustype'])){
	$id = $_POST['id'];
	$details = $_POST['details'];
	$type = $_POST['bustype'];
	$price = $_POST['price'];
	$qty = 1;
	$total = $price*$qty;
	$name = $id." ".$type;
	// $id = $_POST['id'];
	$res = $conn->prepare("select * from cart where product_code=? and userid=? and isPurchased=0");
	$res->bind_param("si",$id,$loginid);
	$res->execute();
	$code = $res->get_result()->fetch_assoc()['product_code'];
	// echo $code;
	if(!$code){
		$stmt = $conn->prepare("INSERT INTO cart (product_name, product_price, qty, total_price, product_code,type,userid) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("ssisssi",$name,$price,$qty,$total,$id,$type,$loginid);
		$stmt->execute();
		echo "success";
	}
	else{
		echo "Already";
	}
}

if(isset($_GET['bookmark_id'])){
	echo "In bookmark";
	$eventid=$_GET['bookmark_id'];
	$stmt = $conn->prepare("insert into bookmarkevents (eventid, userid) values(?,?)");
	$stmt->bind_param("ii",$eventid,$loginid);
	$stmt->execute();
	echo "success";
}


?>
