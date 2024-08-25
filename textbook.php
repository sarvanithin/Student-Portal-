<?php
session_start();
if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
	<title>Student Activity Website</title>
</head>
<body class="aqua-gradient" style="font-family: sans-serif;">
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
						<a class="nav-link" href="individual_checkout.php?name=book&type=book">Checkout</a>
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
  <div class="container">
    <h4 class="text-center mt-2">Search for books here</h4>
    <div class="searchBox mt-10 justify-content-center">
      <form class="form">
        <div class="">
          <div class="form-group row">
            <label for="staticEmail" style="left: 25%" class="col-sm-2 col-form-label"><b>Book Title </b></label>
            <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
              <input style="width: 50%;" type="text" class="form-control" id="title" placeholder="Enter a book title here">
            </div>
          </div>
          <div class="form-group row">
            <label for="isbn" style="left: 25%" class="col-sm-2 col-form-label"><b>ISBN</b></label>
            <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
              <input style="width: 50%;" type="text" class="form-control" id="isbn" placeholder="ISBN">
            </div>
          </div>
          <div class="form-group row">
            <label for="author" style="left: 25%" class="col-sm-2 col-form-label"><b>Author</b	></label>
            <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
              <input style="width: 50%;" type="text" class="form-control" id="author" placeholder="Author's Name">
            </div>
          </div>
        </div>
        <div class="text-center">
          <button style="width: 25%;" type="submit" class="search text-center btn btn-info" value="submit">Search</button>
        </div>
      </form>
    </div>
  </div>
  <div class="display mt-4 mb-4 text-center" style="display:flex;align-self: center;flex-wrap: wrap; justify-content: center;">
  </div>

<!-- Purchase 1 -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Purchase1">
  Purchase?
</button> -->

<!-- Modal -->
<div class="modal fade" id="Purchase1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add to Cart</h5>
      </div>
      <div class="modal-body">
        <p>Item added! Want to continue shopping?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="addToCrt" class="btn btn-success" data-dismiss="modal">Yes, Continue Shopping</button>
        <button type="button" id='purch' data-toggle="modal" data-target="" class="btn btn-danger">No! Pay Now</button>
      </div>
    </div>
  </div>
</div>
<!-- end purchase 1 -->

<!-- Purchase 2 -->
<div class="modal fade" draggable="true" id="cardPurchase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Card Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="purchaseForm">
      <div class="modal-body" style="width: 100%">
          <div class="form-group" >
            <div class="" style="width: 90%;display: inline-block; float: left">
              <input type="text" class="form-control" style="width: 466px;"  id="cardnum" val="" placeholder="Card Number">
            </div>
            <div class="" style="display: inline-block; float: left; width:10% ;position: relative;top: 7px; left: 15px;">
              <i class='far fa-credit-card' ></i>
            </div>
          </div>
          <div class="form-group">
            <div class="" style="width: 90%;display: inline-block; float: left">
              <input type="text" class="form-control" style="width: 466px;" id="cardname" placeholder="Name on Card">
            </div>
            <div class="" style="display: inline-block; float: left; width:10% ;position: relative;top: 7px; left: 15px;">
              <i class='far fa-user' ></i>
            </div>
          </div>
          <div class="form-group" style="display: inline-block; float: left; width: 60%">
            <label for="expiry">Expiry</label>&nbsp;&nbsp;&nbsp;
            <select style="display: inline-block; width: 30%;" id="expirymm" class="form-control">
              <option selected>MM</option>
              <?php for ($i=1; $i <13 ; $i++) { ?>
                <option><?php echo $i; ?></option>
            <?php  } ?>
            </select>
            <select style="display: inline-block;width: 30%;"id="expiryyy" class="form-control">
              <option selected>YY</option>
              <?php for ($i=19; $i < 70 ; $i++) { ?>
                <option><?php echo $i; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group" style="display: inline-block; float: left; width: 40%">
            <input class="form-control" style="width: 60%" type="text" id="cvv" name="cvv" placeholder="CVV">
          </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" id="paynow"  class="btn btn-danger">Pay Now</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Purchase-1 -->
<!-- Lending Option -->


<!-- Modal -->
<div class="modal fade" id="lendBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Book Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        A Reservation request has been raised. You will be notified when it is ready for pickup. <br>
				Have a good day!
      </div>
      <div class="modal-footer">
        <button type="button" id='lendBookbtn' class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Lending Option -->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script type="text/javascript">

  var id = 0;
  function getBookId(e){
    id = Number(e.id.split('-')[1]);
    console.log(id);
  }
	function lenBook(e){
		console.log(e);
		$('#lendBook').modal('show');
		$("#"+e.id).prop("disabled",true);
	}
	// function getLendId(e){
	// 	console.log(e.target);
	// }
  $(document).ready(function(){

		// $('#lendBook').on('show.bs.modal', function (event) {
	  // var button = $(event.relatedTarget);
		 // Button that triggered the modal
	  // var recipient = button.data('whatever'); // Extract info from data-* attributes
	  // var modal = $(this);
		// console.log(button.ownerDocument);
		$('#lendBookbtn').on('click', function(e) {

  // modal.hide();
});
$('#addToCrt').click(function(e){
	// alert("cliocmer");
	console.log('ID is ', id);
	// a =5;
	// var b= $(this).closest(".card-footer");
	console.log('#'+'book_title'+id);
	var book_id = id;
	var book_title = document.getElementById('book_title'+id).innerHTML;
	var book_image = document.getElementById('book_image'+id).src;
	var type="book";
	var name="book";
	console.log("book Id", book_id)
	try{
		var book_price = document.getElementById('book_price'+id).innerHTML;
	}
	catch(error){
		book_price = 50;
		console.error(error);
	}
	var book_isbn = document.getElementById('book_isbn'+id).innerHTML;

	$.ajax({
		url:'action.php',
		method: 'POST',
		data: {book_id:book_id, book_title:book_title, book_image:book_image, book_price:book_price, book_isbn:book_isbn,type:type},
	success: function(response){
		console.log("In Continue Shoppinh ",response);
		// window.location.href = 'individual_checkout.php?name='+name+'&type='+type;
	}
	});
});
    $('#purch').click(function(e){
      console.log('ID is ', id);
      // a =5;
      // var b= $(this).closest(".card-footer");
      console.log('#'+'book_title'+id);
      var book_id = id;
      var book_title = document.getElementById('book_title'+id).innerHTML;
      var book_image = document.getElementById('book_image'+id).src;
			var type="book";
			var name="book";
      console.log("book Id", book_id)
      try{
        var book_price = document.getElementById('book_price'+id).innerHTML;
      }
      catch(error){
        book_price = 50;
        console.error(error);
      }
      var book_isbn = document.getElementById('book_isbn'+id).innerHTML;

      $.ajax({
        url:'action.php',
        method: 'POST',
        data: {book_id:book_id, book_title:book_title, book_image:book_image, book_price:book_price, book_isbn:book_isbn,type:type},
      success: function(response){
        console.log(response);
				window.location.href = 'individual_checkout.php?name='+name+'&type='+type;
      }
      });
    });
    // $(".purchaseForm").submit(function(e){
    //   e.preventDefault();
    //   console.log("entered");
    //   console.log($("#cardPurchase").modal());
    //   var a = $(this);
    //   var cardNum = a.find("#cardnum").val();
    //   var cardName= a.find('#cardname').val();
    //   var expirymm =  a.find('#expirymm').val();
    //   var expiryyy =  a.find('#expiryyy').val();
    //   var cvv    =     a.find('#cvv').val();
    //   var image  = a.find("#image").val();
    //   var title = a.find("#title").val();
    //   var author = a.find('#author').val();
    //   console.log(cardNum, cardName, expirymm, expiryyy, cvv);
    //   console.log(image, title, author);
    //   $.ajax({
    //     url: 'action.php',
    //     method: 'post',
    //     data: {cardNum: cardNum, cardName: cardName, expirymm: expirymm, expiryyy: expiryyy, cvv:cvv},
    //     success: function(response){
    //       console.log("Successfully purchased");
    //     }
    //   });
    // });

     $(".form").submit(function(e){
       e.preventDefault();
       $(".display").empty();
       var title = $("#title").val();
       var isbn = $("#isbn").val();
       var author = $("#author").val();
       console.log(title);
       if(title!='' || isbn!='' || author!=''){
         $.get("https://www.googleapis.com/books/v1/volumes?q="+title+isbn+author,function(response){
           console.log("got response", response);
           li = response.items;
           console.log(li);
           for(let i=0;i<10;i++){
             // console.log("******************************",i,"*****************************************");
              // console.log(li[i].id);
             //  console.log(li[i].volumeInfo['title']);
              // if (! $.isEmptyObject(li[i].saleInfo.retailPrice)){
              //   // console.log(li[i].volumeInfo['imageLinks']['smallThumbnail']);
              //   // console.log('Price', li[i].saleInfo.retailPrice.amount);
              //   var price = li[i].saleInfo.retailPrice.amount)
              // }
              var price = (! $.isEmptyObject(li[i].saleInfo.retailPrice))?li[i].saleInfo.retailPrice.amount : 'Not_Sale';
             // BuyLink --- li[i].saleInfo.BuyLink
             //  Price --- li[i].saleInfo.retailPrice
             // ABout --- li[i].searchInfo.textSnippet
             //Categories -- volumeInfo.Categories
             //ISBN === volumeInfo.industryIdentifiers[0]

             // console.log('ISBN',li[i].volumeInfo.industryIdentifiers[0].identifier);
              var libFloor = Math.round(Math.random()*5);
              var Available = libFloor?'Alkek Library '+libFloor+' Floor':'Not Available';
              var dis = libFloor==0?'disabled':'';
              // var price =
              var author = li[i].volumeInfo['authors'].length>=3?li[i].volumeInfo['authors'].slice(1,3):li[i].volumeInfo['authors'];
							if(libFloor == 0){
								div = $('<div class="card shadow p-3 mb-5 bg-white rounded mb-2 mr-2 ml-2 mt-2" style="margin-left: auto;margin-right: auto;display: block; display:inline-block; flex-wrap: wrap; width: 18rem; min-height: 430px; float: left"><img class="mb-2 pb-2 mt-2" width="128px" height="150px" id="book_image'+i+'" src='+li[i].volumeInfo.imageLinks.smallThumbnail+' style=" margin-left: auto;margin-right: auto;display:block;"><a style="display: flex;align-items: center; justify-content: center;" href='+li[i].volumeInfo.infoLink+'><button class="btn btn-primary">Read More</button></a><div class="card-body" style="line-height:1rem;"><h5 id="book_title'+i+'" class="text-left">'+li[i].volumeInfo['title']+'</h5><p id="book_author'+i+'" class="text-left"><b>Author(s):</b>'+author.join(',')+'</p><p class="text-left"><b>Ratings:</b>&nbsp;'+rating+'</p><p id="available'+i+'" class="text-left"><b>Availability:</b>&nbsp;'+Available+'</p><p id="book_price'+i+'" hidden>'+price+'</p><p id="book_isbn'+i+'" hidden>'+li[i].volumeInfo.industryIdentifiers[0].identifier+'</p></div><div class="card-footer"><button class="btn btn-warning"disabled>Oops Not avialable!</button><a href="https://www.amazon.com/s?k='+li[i].volumeInfo['title']+'" class="btn btn-info">Purchase Here</a></div></div>');
	              var rating = li[i].volumeInfo.averageRating!=undefined?li[i].volumeInfo.averageRating:'No Rating';
							}
							else{
								div = $('<div class="card shadow p-3 mb-5 bg-white rounded mb-2 mr-2 ml-2 mt-2" style="margin-left: auto;margin-right: auto;display: block; display:inline-block; flex-wrap: wrap; width: 18rem; min-height: 430px; float: left"><img class="mb-2 pb-2 mt-2" width="128px" height="150px" id="book_image'+i+'" src='+li[i].volumeInfo.imageLinks.smallThumbnail+' style=" margin-left: auto;margin-right: auto;display:block;"><a style="display: flex;align-items: center; justify-content: center;" href='+li[i].volumeInfo.infoLink+'><button class="btn btn-primary">Read More</button></a><div class="card-body" style="line-height:1rem;"><h5 id="book_title'+i+'" class="text-left">'+li[i].volumeInfo['title']+'</h5><p id="book_author'+i+'" class="text-left"><b>Author(s):</b>'+author.join(',')+'</p><p class="text-left"><b>Ratings:</b>&nbsp;'+rating+'</p><p id="available'+i+'" class="text-left"><b>Availability:</b>&nbsp;'+Available+'</p><p id="book_price'+i+'" hidden>'+price+'</p><p id="book_isbn'+i+'" hidden>'+li[i].volumeInfo.industryIdentifiers[0].identifier+'</p></div><div class="card-footer"><button type="button"  class="btn btn-info mr-2"'+dis+' onclick="lenBook(this)" id="lend'+i+'" type="submit">Lend</button><button type="submit"  onclick="getBookId(this)" id="purchase-'+i+'"class="purchase btn btn-warning ml-2"'+dis+' data-toggle="modal" data-target="#Purchase1">Purchase?</button></div></div>');
	              var rating = li[i].volumeInfo.averageRating!=undefined?li[i].volumeInfo.averageRating:'No Rating';
							}
// data-toggle="modal" data-target="#lendBook"
              div.appendTo(".display");
              // <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lendBook" data-whatever="@mdo">Purchase</button>
           }
         });
       }
       else{
         alert("All fields are empty, Enter something to search");
       }
       checkBtn();
     });
     function checkBtn(){
       console.log("Insideeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee",$("#available").val());
       if($("#available").val()=='Not Available'){
         console.log("hey Im here*****************");
       }
     }
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
    return false;
  })
</script>
</body>
</html>
