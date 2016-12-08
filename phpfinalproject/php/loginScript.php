<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();
  //Connect to DB
  include 'db.php';
  $connection = dbconnect("phpfinalproject");


  $_SESSION["active_user"] = $_POST["email"];
  echo($_SESSION["active_user"]);

  $query = "SELECT * from User";
  $result = mysqli_query($connection,$query);
  mysqli_close($connection);
  header('Location: /client/profileView.php');
  exit();


  /*
  $error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
  */
?>
