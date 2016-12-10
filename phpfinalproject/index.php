<?php
session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
// if(isset($_SESSION["active_user"])){
// 	header("location: ./client/profileView.php");
// }
?>

<?php include("./php/header.php"); ?>
<div class="panel panel-info">
	<div class="panel panel-heading">

		<h2>Welcome!<?php if(empty($_SESSION['active_user'])):?> Please Log in<?php endif;?></h2>

	</div>
	<div class="panel-body">
		<a href="./client/loginView.php"><button class="btn btn-primary">Login</button></a>
	</div>
</div>
<?php include("./php/footer.php"); ?>
