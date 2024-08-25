<?php
session_start();
$loginid = $_SESSION['loginid'];
if(isset($loginid)){

}
else {
	header("location: login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Events & Activities</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

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
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mt-5 pt-5">
    <div class="container">

      <!--Section: Jumbotron-->
      <section class="card aqua-gradient wow fadeIn" id="intro" style=" height: 350px">
        <!-- Content -->
        <div class="container justify-content" >
          <h4 class="text-center mt-2">Events and Activities</h4>
          <div class="searchBox mt-10 justify-content-center">
            <form class="form">
              <div class="">
                <div class="form-group row">
                  <label for="staticEmail" style="left: 25%" class="col-sm-2 col-form-label"><b>Event </b></label>
                  <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
                    <input style="width: 50%;" type="text" class="form-control" id="event" placeholder="Event Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="author" style="left: 25%" class="col-sm-2 col-form-label"><b>Category</b	></label>
                  <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
                    <input style="width: 50%;" type="text" class="form-control" id="category" placeholder="Category">
                  </div>
                </div>
                <div class="form-group row"> <!-- Date input -->
                  <label style="left: 25%" class="col-sm-2 col-form-label" for="date">Start Date</label>
                  <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
                    <input style="width: 50%;" type="text" class="form-control" id="start" name="datepicker" placeholder="MM/DD/YYY">
                  </div>
                  <!-- <input class="form-control" id="datepicker" name="date" placeholder="MM/DD/YYY" type="text"/> -->
                </div>
                <div class="form-group row"> <!-- Date input -->
                  <label style="left: 25%" class="col-sm-2 col-form-label" for="date">End Date</label>
                  <div class="col-sm-10" style="display: flex;align-items: center;justify-content: center;">
                    <input style="width: 50%;" type="text" class="form-control" id="end" name="datepicker" placeholder="MM/DD/YYY">
                  </div>
                  <!-- <input class="form-control" id="datepicker" name="date" placeholder="MM/DD/YYY" type="text"/> -->
                </div>
              </div>
              <div class="text-center">
                <button style="width: 25%;" type="submit" class="search text-center btn btn-danger" value="submit">Search</button>
              </div>
            </form>

          </div>
        </div>
        <div class="dateDisp">

        </div>

        </div>
        <!-- Content -->
      </section>
      <!--Section: Jumbotron-->

      <hr class="my-5">

      <!--Section: Cards-->
      <section id="section" class="text-center" style="display: none;">
          <!--Grid column-->
          <div id="secDiv" class="" style="width: 100%; height: 100%">
            <div id="disp" class="col-md-6 mb-4" style="width: 100%; height: 100%;">

              <!--Card-->

              <!--/.Card-->

            </div>
          </div>

          <!--Grid column-->

        <!-- </div> -->
      </section>
      <section id="bookmark">
        <p>
  <!-- <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button> -->
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">BOOKMARKED EVENTS</button>
</p>
<div class="row">
   <div class="col">
  <?php
  include 'config.php';
  $bk = $conn->prepare("select * from events where id in (select eventid from bookmarkevents where userid = $loginid) order by startdatetime desc");
  $bk->execute();
  $r = $bk->get_result();
  while($row=$r->fetch_assoc()):
   ?>

  <div class="collapse multi-collapse" id="multiCollapseExample1">
    <div><b><?= date("F",strtotime($row['startdatetime']));?></b></div>
   <div class="card mt-2 mb-2 ml-2 mr-2" style="display:inline-block; ">
               <div class="view overlay">
                 <img src="" class="card-img-top" alt="">
               </div>
               <div class="card-body">
                 <h4 class="card-title"><?=$row['title'] ?></h4>
                 <p class="card-text"><?=$row['details']  ?></p>
                 <h6>Category: <?= $row['category']?></h6>
                 <h6>Venue:  <?= $row['venue'] ?></h6>
                 <h6>Artist:<?= $row['artist'] ?></h6>
             </div>
           </div>
         </div>

      <?php endwhile; ?>
     </div>
</div>
      </section>

      </section>
      <!--Section: Cards-->

    </div>
  </main>
  <!--Main layout-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script>
  function formatDate(date) {
  var dt = new Date(date)
  // console.log("date", date);
  var hours = dt.getHours();
  var minutes = dt.getMinutes();
  var seconds = dt.getSeconds();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  // console.log("hours",hours);
  hours = hours < 10 ? '0'+hours : hours;
  minutes = minutes < 10 ? '0'+minutes : minutes;
  seconds = seconds < 10 ? '0'+seconds : seconds;
  var day = Number(dt.getDate()) < 10 ? '0'+dt.getDate() : dt.getDate()
  var month = Number(dt.getMonth())+1;
  var strTime = dt.getFullYear()+'-'+month+'-'+day+' '+hours + ':' + minutes + ':' + seconds;
  return strTime;
}
function renderBookmark(e){
  console.log(e.id);
  ajaxFunction(e.id);
  location.reload(true);
}
    $(document).ready(function(){
      $(".form").submit(function(e){
        e.preventDefault();
        console.log("submitted");
        var evnt = $("#event").val();
        var category = $("#category").val();
        var start = $("#start").val();
        var end = $("#end").val();
        start = start.length!=0?formatDate(start):'';
        end = end.length!=0?formatDate(end):'';
        console.log(start, end);
        if(start!=null && end!=null){
          if(start>end){
            alert("Start Date should be before end date");
          }
        }
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {evnt:evnt, category: category, start:start, end:end},
          success: function(response){
            console.log(response);
            $("#section").show();
            $("#disp").html(response);
          }
        })
      })


      var date_input=$('input[name="datepicker"]'); //our date input has the name "date"
      // var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var container=$('.dateDisp');
      // var container = $('form-group').parent();
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);

    })
    function ajaxFunction(query) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = (e) => {
    if (xhr.readyState == 4 && xhr.status === 200) {
      // console.log('SUCCESS', xhr.responseText);
      var response = xhr.responseText;
      console.log(response);
    } else {
      console.warn('request_error');
    }
  };

  xhr.open("GET", "action.php?bookmark_id="+query);
  xhr.send();
}
</script>
</body>

</html>
