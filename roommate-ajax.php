<?php
include("config.php");
   //Connect to MySQL Server
 // $db = new mysqli($dbhost, $dbuser, $dbpass);

   //Select Database
  // mysqli_select_db($db,$dbname) or die(mysql_error());

   // Retrieve data from Query String
   $date = $_GET['date'];
   $pricemin = $_GET['pricemin'];
   $pricemax = $_GET['pricemax'];
   $gender = $_GET['gender'];

   // Escape User Input to help prevent SQL Injection
   $date = mysqli_real_escape_string($db,$date);
   $pricemin = mysqli_real_escape_string($db,$pricemin);
  $pricemax = mysqli_real_escape_string($db,$pricemax);
 $gender = mysqli_real_escape_string($db,$gender);

   //echo $pricemin;
   $query = "SELECT * FROM roommate WHERE";
   if (!empty($date))
	   $query=$query." movein_date<='$date'";

   if(!empty($date))
      $query .= "and price >= $pricemin and price<= $pricemax";
   else
	   $query .= "  price >= $pricemin and price<= $pricemax";

   $query .= " AND gendertype ='$gender'";
  // echo $query;
   //Execute query
   $qry_result = mysqli_query($db,$query) or die(mysqli_error());

   //Build Result String
   $display_string = "<table class="."table".">";
   $display_string .= "<thead class="."thead-dark".">";
   $display_string .= "<tr>";
   $display_string .= "<th>Apartment Type</th>";
   $display_string .= "<th>Price Per Room</th>";
   $display_string .= "<th> Leasing Period</th>";
   $display_string .= "<th>City</th>";
   $display_string .= "<th>Address</th>";
   $display_string .= "</tr>";
   $display_string .= "</thead>";
   // Insert a new row in the table for each person returned
   while($row = mysqli_fetch_array($qry_result)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[roomtype]</td>";
      $display_string .= "<td>$$row[price]</td>";
      $display_string .= "<td>$row[month] Month </td>";
      $display_string .= "<td>$row[city]</td>";
	  $display_string .= "<td>$row[address]</td>";
      $display_string .= "</tr>";
   }
   //echo "Query: " . $query . "<br />";

   $display_string .= "</table>";
   echo $display_string;
?>
