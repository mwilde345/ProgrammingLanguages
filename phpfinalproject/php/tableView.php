<?php
		
			session_start();
			if(isset($_SESSION['error'])){
			  header('Location: /client/loginView.php');
			}else{
			  unset($_SESSION['error']);
			}
			
	

		$servername = "localhost";
		$username = "guest";
		$password = "guestpassword";
		$dbname = "phpfinalproject";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		//$sql = "SELECT USERID";
		$sql = "SELECT USERID, SEARCH_TERM, SEARCH_NAME, SEARCH_TIME, SEARCH_FREQUENCY FROM `SearchEvent` WHERE USERID = '0'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo $row['USERID'] . "*" . $row['SEARCH_TERM'] . "*" . $row['SEARCH_NAME'] . "*" . $row['SEARCH_FREQUENCY'] . "*" . $row['SEARCH_TIME'] . "|";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
?>