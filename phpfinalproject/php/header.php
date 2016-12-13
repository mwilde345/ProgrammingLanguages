<html>
	<head>
		<title>Search Updater</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type = "text/javascript" src="../js/customscript.js"></script>
		<script type = "text/javascript" src="../bootstrap/dist/js/bootstrap.min.js"></script>
		<script type = "text/javascript" src="../bootstrap/node_modules/moment/moment.js"></script>
		<script type = "text/javascript" src="../bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="../css/customstyle.css" type="text/css">
		<link rel="stylesheet" id="main-stylesheet" href="../bootstrap/dist/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" id="main-stylesheet" href="../bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>


	</head>
	<body>
		<div class="container">
			<div class="jumbotron">
				<nav class="navbar navbar-default">
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-left">
	            <li><a href="/index.php">Home</a></li>
	            <?php if($_SESSION['logged_in']==true):?>
	              <li><a href="/client/profileView.php">Profile</a></li>
	              <li><a href="/php/logoutScript.php">Logout</a></li>
	            <?php else:?>
	              <li><a href="/client/loginView.php">Login</a></li>
	            <?php endif;?>
							<li><a href="/client/social.php">Social</a></li>
							<li><a href="/php/sqlInject.php">SQL Injection</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<?php if($_SESSION['logged_in']==true):?>
								<li><?php echo $_SESSION['username']; ?></li>
							<?php endif;?>
						</ul>
					</div>
				</nav>
