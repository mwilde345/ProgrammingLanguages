<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();
  //Connect to DB
  $_SESSION['displayMessage'] = true;
  $_SESSION['logged_in'] = false;
  

  if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'] = "Username or Password is invalid";
  }
  else
  {
    $username = trim($_POST['email']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);
    $_SESSION['username'] = $username;

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    $password = hash('sha256',$password);

    include 'db.php';
    $connection = dbconnect("phpfinalproject");

    $currentUserQuery = "SELECT `USERNAME`,`PASSWORD` FROM `User` WHERE `USERNAME` = '$username' LIMIT 1";
    $isCurrentUser = $connection->query($currentUserQuery);
    if($isCurrentUser->num_rows!=0){
      $userData = $isCurrentUser->fetch_assoc(); //WE KNOW THERE IS ONLY ONE ROW RETURNED
      if(!hash_equals($userData["PASSWORD"],$password)){
          $_SESSION['error'] = 'Incorrect Password';
          unset($password);
          header('Location: /client/loginView.php');
      }else{
        $_SESSION['msg'] = 'Welcome back '.$username.', you have successfully logged in.';
        $_SESSION['logged_in'] = true;
        unset($_SESSION['error']);
        unset($username);
        unset($password);
      }
    }else{ //SAFE DATABASE CALL
      if(!($insert = $connection->prepare("INSERT INTO `User`(`USERNAME`,`PASSWORD`) VALUES(?, ?)"))){
        echo "Prepare Failed (".$insert->errno .")" . $insert->error;
      }
      if(!($insert->bind_param("ss",$username,$password))){
        echo "Bind Failed (".$insert->errno .")" . $insert->error;
      }
      if(!$insert->execute()){
        echo "Could not insert new User: (".$insert->errno .")" . $insert->error;
      }
      else {
        $_SESSION['msg'] = "Welcome ".$username.", you have successfully registered.";
        $_SESSION['logged_in'] =true;
        unset($_SESSION['error']);
        unset($username);
        unset($password);
     }
   }
    $connection->close();
    header('Location: /client/profileView.php');
  }



  /*
  $error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

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
