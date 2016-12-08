<?php // db.php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "hughes10";

function dbConnect($db="") {
  global $dbhost, $dbuser, $dbpass;
  $dbcnx = mysqli_connect($dbhost, $dbuser, $dbpass,$db)
  or die("The site database appears to be down.");

  return $dbcnx;
}
?>
