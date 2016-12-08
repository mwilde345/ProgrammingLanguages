<?php

session_start();
echo isset($_SESSION["active_user"]) ? $_SESSION["active_user"] : "not set";

?>

<?php include("../php/header.php"); ?>
<div class="panel panel-default">
  <h2>Welcome to your Profile!</h2>
</div>
<?php include ("../php/footer.php"); ?>
