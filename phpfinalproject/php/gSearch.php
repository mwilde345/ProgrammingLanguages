<html>
	
	<?php
		//testing function, may be repurposed..."AIzaSyD9GBj2m-_lwsXwZZdwS5X3tj6blyEtMM8"
		
		if(isset($_POST['searchID'])){
			$term = $_POST['searchID'];
			$user = $_SESSION['username'];
			function search($term){
				$key = "AIzaSyD9GBj2m-_lwsXwZZdwS5X3tj6blyEtMM8"; //disable this after project presentation!!!
				$engineId = "014956187943969651346:2orik1kviv4";
				$result = file_get_contents('https://www.googleapis.com/customsearch/v1?key=' . $key . '&cx=' .$engineId . '&q=' . $term);
				return $result;
			}
			//Save search results here
			
			$servername = "localhost";
			$username = "williamchase";
			$password = "superarbok514";
			$dbname = "phpfinalproject";

			// Create connection
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$userID = intval($user);
			$sql = $sql = "INSERT INTO SearchEvent (USERID, SEARCH_TERM, SEARCH_RESULT, SEARCH_NAME)
			VALUES ('" . $userID . "', '" . $term . "' , '" . search($term) . "' , '" . $term . "')";
			echo $term;

			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}

			$conn->close();
			
			echo search($term);
		}
	?>



	
</html>

