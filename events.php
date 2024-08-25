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
	<title>Student Activity Website</title>
</head>
<body style="margin: 0;
padding: 0;
font-family: sans-serif;
">
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
			<li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         Search
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="people.php">People Details</a>
	          <a class="dropdown-item" href="roommate.php">Rommate</a>
	          <a class="dropdown-item" href="test.php">Events & Activities</a>
	        </div>
	      </li>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Purchase
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="mealplan.php">Meal Plan</a>
          <a class="dropdown-item" href="busTickets.php">Bus Tickets</a>
          <a class="dropdown-item" href="textbook.php">Textbooks</a>
        </div>
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
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><i class="fas fa-gift"></i>&nbsp; Student Activity</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
<div id="evnt" class="container" style="width: 100%">
  <div class="eventsSearch mt-2" style="width: 100%">
    <div class="form-group" style="width: 100%">
      <input onkeypress="getInput(this)" type="text" id="search" class="form-control" value="" style="width: 100%" placeholder="Search Events and Activities">
    </div>
  </div>
</div>
<div  class="">
  <div class="">
    <h5 id="header" class="text-left"><b>Suggested Events</b></h5>
  </div>
  <div id="displayEvents" class="display mt-4 mb-4 text-center">
    <div id="suggestedEvents" style="display: block;" class="">
    </div>
    <div id="searchedEvents" style="display: none;">
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
var a;
window.addEventListener('load',(e)=>{
  console.log("Loaded Succe3ssfully");
	// getResponse('Illi');
//   getResponse('US').then((res)=>{
//   var i=0;
//   res.results.forEach(function(e){
//     var venue = (! $.isEmptyObject(e.entities[0]))?e.entities[0].name:'Unknown';
//     div = $('<div class="card mb-2 mr-2 ml-2 mt-2" style=" position: relative; object-fit: contain; width: 18rem; min-height: auto; margin-left: auto; margin-right: auto; display: inline-block; float: left"><img style="max-width: 100%;height: 340px;" src="./images/bg1.png"><div class="card-body" style="position: absolute;top: 10px;left: 10px; padding: 5px;"><h5 id="book_title'+i+'" class="text-left">'+e.title+'</h5><p id="book_author'+i+'" class="text-left"><b>Description:</b>&nbsp;'+e.description.substr(0,150)+'....</p><p class="text-left"><b>Start:</b>&nbsp;'+e.start+'</p><p id="available'+i+'" class="text-left"><b>Category:</b>&nbsp;'+e.labels.join(',')+'</p><p style="text-align: left;" id="book_price'+i+'"><b>Venue:</b>&nbsp;'+venue+'</p></div></div>');
//     // var rating = li[i].volumeInfo.averageRating!=undefined?li[i].volumeInfo.averageRating:'No Rating';
//     div.appendTo("#suggestedEvents");
//     i+=1;
//   });
// });

});
function getInput(e){
//   console.log(e.value);
//   if(!e.value==''){
// 		var evnt = e.value;
// 		$.ajax({
// 			url: 'action.php',
// 			method:'GET',
// 			data:{evnt: evnt},
// 			// success: function(response){
// 			// 	// console.log(response);
// 			// }
// 		})
	};
  //   // $('#suggestedEvents').hide();
  //   document.getElementById('searchedEvents').innerHTML='';
  //   document.getElementById('suggestedEvents').style.display = "none";
  //   document.getElementById('searchedEvents').style.display = "block";
  //   // $('#searchedEvents').show();
  //   document.getElementById('header').innerHTML = 'Events relevant to your search';
  //   // $('searchedEvents').replaceWith();
  //   var i=0;
  //   getResponse(e.value).then(res=>{
  //     res.results.forEach(function(e){
  //       console.log(e);
  //       var venue = (! $.isEmptyObject(e.entities[0]))?e.entities[0].name:'Unknown';
  //       console.log(venue);
	// 			// c.sort(function(e, f) {
  //   		// 	a = new Date(e);
  //   		// 	b = new Date(f);
  //   		// 	return a<b ? -1 : a>b ? 1 : 0;
	// 			// 	});
  //       div = $('<div class="card mb-2 mr-2 ml-2 mt-2" style=" position: relative; object-fit: contain; width: 18rem; min-height: 320px; margin-left: auto; margin-right: auto; display: inline-block; float: left"><img style="max-width: 100%;height: 340px;" src="./images/bg1.png"><div class="card-body" style="position: absolute;top: 10px;left: 10px; padding: 5px;"><h5 id="book_title'+i+'" class="text-left">'+e.title+'</h5><p id="book_author'+i+'" class="text-left"><b>Description:< b>&nbsp;'+e.description.substr(0,150)+'....</p><p class="text-left"><b>Start:</b>&nbsp;'+e.start+'</p><p id="available'+i+'" class="text-left"><b>Category:</b>&nbsp;'+e.labels.join(',')+'</p><p style="text-align: left;" id="book_price'+i+'"><b>Venue:</b>&nbsp;'+venue+'</p></div></div>');
  //         div.appendTo('#searchedEvents');
  //     })
  //   });
  // }
  // else{
  //   document.getElementById('header').innerHTML = 'Suggested Events';
  //   // $('#suggestedEvents').show();
  //   // $('#searchedEvents').hide();
  //   document.getElementById('searchedEvents').style.display = "none";
  //   document.getElementById('suggestedEvents').style.display = "block";
	//
//   // }
// }
// var x = document.getElementById('loc');
// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }
// }
//
// function showPosition(position) {
//   var lat = position.coords.latitude;
//   var long = position.coords.longitude;
//   $('#loc').append('<div><p>Latitude: ' + position.coords.latitude +'<br>Longitude: ' + position.coords.longitude+';</p></div>');
//   // console.log(CallWebAPI(lat+','+long, data=> console.log("Data is ", data)));
//   getResponse('US').then(res=>console.log('Result is ',res.results));
//
//   // x.innerHTML = "Latitude: " + position.coords.latitude +
//   // "<br>Longitude: " + position.coords.longitude;
// };
	$(document).ready(function(){
		$("#search").keypress(function(e){
			console.log(this.value);
			$.ajax({
				url: 'action.php',
				method: 'GET',
				data:{evnt: this.value},
				success: function(response){
					console.log(response);
					$("#suggestedEvents").html(response);
				}
			})

});

		// });


		$(".addItemBtn").click(function(e){
			e.preventDefault();
			var $form = $(this).closest(".form-submit");
			var pid = $form.find(".pid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();
			console.log("Sent");
			console.log(pname, pid);
			$.ajax({
				url: 'action.php',
				method: 'POST',
				data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode},
				success: function(response){
					console.log("success");
					$("#message").html(response);
					update_cart();
					window.scrollTo(0,0);
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

	// CallWebAPI();
	// function CallWebAPI(query) {
	//     var request_ = new XMLHttpRequest();
	// 		var token_ = "akZPVNym9WhJNT6DyAgSBVUCz4IYuJtm2NECXE0p";
  //      return new Promise((resolve, reject) => {
	//      request_.onreadystatechange = (e)=> {
  //        // var data;
	//         if (request_.readyState == 4 && request_.status == 200) {
  //             resolve(JSON.parse(request_.responseText));
	//         }
  //         // return data.results;
	//     };
  //     var url='https://api.predicthq.com/v1/events/?q=';
  //     request_.open("GET", url+query);
	//     request_.setRequestHeader("Authorization", "Bearer "+ token_);
	//     request_.send();
  //   });
  // }
  // function getResponse(query) {
  // var xhr = new XMLHttpRequest();
  //   xhr.onreadystatechange = function(){
  //     if (xhr.readyState == 4 && xhr.status === 200) {
	// 			console.log(this.responseText);
  //     } else {
  //       console.warn('request_error');
  //     }
  //   };
  //   xhr.open("GET", "action.php?event="+query);
  //   xhr.send();
  // };
//
// getCategoryList().then(res => console.log("The result is", res));
      // value = request_.onreadystatechange();
      // console.log(value);
      // return data.results;
	// }



</script>
</body>
</html>
