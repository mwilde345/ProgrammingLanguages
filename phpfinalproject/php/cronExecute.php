<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
	$searchTerm = preg_replace('/[\s]+/','+',$argv[1]);
	$eventId = $argv[2];



	function search($term){
			$key = "AIzaSyD9GBj2m-_lwsXwZZdwS5X3tj6blyEtMM8"; //disable this after project presentation!!!
			$engineId = "014956187943969651346:2orik1kviv4";
			$result = file_get_contents('https://www.googleapis.com/customsearch/v1?key=' . $key . '&cx=' .$engineId . '&q=' . $term);
			return $result;
		}
	$servername = "localhost";
  $username = "guest";
  $password = "guestpassword";
  $dbname = "phpfinalproject";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$searchResult = mysqli_real_escape_string($conn,search($searchTerm));

	$latestJson = $conn->query("SELECT s1.JSONDATA FROM `SearchResult` s1 WHERE s1.ID = (SELECT MAX(ID) ID FROM `SearchResult` s2 WHERE s2.SEARCHID = '$eventId' )");
	if($latestJson == TRUE){
		$latestJsonString = $latestJson->fetch_assoc()["JSONDATA"];
		echo "Successfull compare query";
	}else{
		echo "Error comparing record: " . $conn->error;
	}

	$sql = "INSERT INTO SearchResult (JSONDATA, SEARCHID)
  VALUES ('" . $searchResult . "', '" . $eventId . "')";

	$eventName = $conn->query("SELECT `SEARCH_NAME` FROM `SearchEvent` WHERE `ID` = '$eventId'")->fetch_assoc()["SEARCH_NAME"];

  if ($conn->query($sql) === TRUE) {
    $eventId = $conn->insert_id;
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

	if($latestJsonString!=$searchResult){
			//header("Location: ./mail.php");
			$email = shell_exec('php /var/www/phpfinalproject/php/mail.php '.$eventName);
	}
  $conn->close();

//echo $argv[1];
/*if(mail("mwilde345@gmail.com","A Subject Here","Hi there,\nThis email was sent using PHP's mail function."))
echo "Email successfully sent";
else
echo "An error occured";*/
?>
