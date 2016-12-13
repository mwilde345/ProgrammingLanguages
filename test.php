<?php
session_start();
$_SESSION['current_user'] = "ME";
include("../php/header.php");
require("../php/header.php");
use Crontab\Crontab;
if(session_destroy()){
  header("Location: /index.php");
}
?>
