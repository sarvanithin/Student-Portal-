<?php
include('index.php');

if(isset($_SESSION['loginid'])){

}
else {
	header("location: login.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Album example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body>


<main role="main">



  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
  <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img xlink:href="images/edit.svg" height="225px" src="images/meal.jpg"  title="Logo of a company" alt="Logo of a company" /><rect width="100%" height="225px" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body mt-2 pd-2" style="min-height: 210px">
              <p class="card-text">You can purchase a meal plan. You are offered with discounts based on the plan i.e. $600 a month or by semester wise with 5 percent discount..</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onClick="document.location.href='mealplan.php'" >Browse</button>

                </div>
                </div>
            </div>
          </div>
        </div>
    <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img xlink:href="images/edit.svg" height="225px" src="images/bus.jpg"  title="Logo of a company" alt="Logo of a company" /><rect width="100%" height="225px" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body mt-2 pd-2" style="min-height: 210px">
              <p class="card-text">You can buy bus tickets online by credit card. You can choose multiple zones and buy multiple tickets.You can also buy bus cards which cost $40 each. </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onClick="document.location.href='busTickets.php'">Browse</button>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" >
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img xlink:href="images/edit.svg" height="225px" src="images/book.jpg"  title="Logo of a company" alt="Logo of a company" /><rect width="100%" height="225px" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body mt-2 pd-2" style="min-height: 210px">
              <p class="card-text">You can use the website to search for textbooks. The search can be based on book title, author, or ISBN. If a book is available in the school library, display the location of the book in the library. </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onClick="document.location.href='textbook.php'">Browse</button>

                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="jumbotron" style="min-width: 100%">
          <h1 class="display-4">Student Union Election</h1>
          <p class="lead">Voting has started! You can caste your vote here!!</p>
          <hr class="my-4">
          <p>Student Head Voting</p>
          <a class="btn btn-primary btn-lg" href="poll.php" role="button">Vote!</a>
        </div>


</main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>
