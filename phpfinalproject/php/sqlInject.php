<?php
error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();
$servername = "localhost";
$username = "guest";
$password = "guestpassword";
$dbname = "phpfinalproject";
$conn = new mysqli($servername, $username, $password, $dbname);
include("header.php");
?>

<form action="" method="post">
<table width="50%">
    <tr>
        <td>User</td>
        <td><input type="text" name="user"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="text" name="password"></td>
    </tr>
</table>
    <input type="submit" value="OK" name="s">
</form>

<?php
include("footer.php");
if($_POST['s']){
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $re = $conn->query("SELECT * FROM `User` WHERE `USERNAME` = '$user' LIMIT 1");
    while($row = $re->fetch_assoc()){
      print_r($row);
    }
}
?>
