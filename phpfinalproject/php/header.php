<html>
	<head>
		<title>Search Updater</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type = "text/javascript" src="../js/customscript.js"></script>
		<script type = "text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/customstyle.css" type="text/css">
		<link rel="stylesheet" id="main-stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<nav class="navbar navbar-default">
					<ul class="nav navbar-nav">
            <li><a href="/index.php">Home</a></li>
            <?php if(isset($_SESSION['active_user'])):?>
              <li><a href="/client/profileView.php">Profile</a></li>
              <li><a href="/php/logoutScript.php">Logout</a></li>
            <?php else:?>
              <li><a href="/client/loginView.php">Login</a></li>
            <?php endif;?>
						<li><a href="/client/social.php">Social</a></li>
						<li><a href="/client/sqlInject.php">SQL Injection</a></li>
					</ul>
				</nav>
