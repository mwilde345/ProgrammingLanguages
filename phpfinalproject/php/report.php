<html>
	<head>
		<title>Form Returnage</title>
	</head>
	<body>
	<?php
		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$address = $_POST['address'];
		$spotted = $_POST['checkbox'];
		$email = $_POST['email'];
		$msg = "$first_name was abducted by an alien at $address.\n".
			"Do they have problems? $spotted.\nMessage Terminating.";
		$to='mwilde345@gmail.com';
		$subject = 'Aliens abducted me, check it!';

		$dbc = mysqli_connect('localhost','root','','aliendatabase')
			or die('Error connecting to your database');
		$query = "INSERT INTO aliens_abduction(first_name,last_name,other,dog_spotted,email)".
			"VALUES('$first_name','$last_name','$address','$spotted','$email')";
		$result = mysqli_query($dbc,$query)
			or die('Error with the query');
		mysqli_close($dbc);

		mail($to,$subject,$msg,"From:".$email."\r\nCC:".$email);
		echo 'Thanks '.$first_name.' for submitting this form. <br />';
		echo 'I will send my regiment to '.$address.' ASAP <br />';
		echo 'Do you have problems? '.$spotted;
	?>
	</body>
</html>