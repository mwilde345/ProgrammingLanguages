<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  //Connect to DB
  include 'db.php';
  $connection = dbconnect("phpfinalproject");
  $query = "SELECT * from User";
  $result = mysqli_query($connection,$query);

  //User check
  

  mysqli_close($connection);
?>
