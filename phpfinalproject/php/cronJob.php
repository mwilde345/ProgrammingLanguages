<?php
error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();

  $servername = "localhost";
  $username = "guest";
  $password = "guestpassword";
  $dbname = "phpfinalproject";

  $user = $_SESSION['username'];
  $struct = json_decode($_POST['data']);
  foreach($struct as $key => $value){
  	${''.$key} = $value;
  }
  $date = strtotime($timeStamp);
  $ts = new DateTime("@$date");
  // Create connection

  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $currentUserId = $conn->query("SELECT `ID` FROM `User` WHERE `USERNAME` = '$user' LIMIT 1");
  $userId = $currentUserId->fetch_assoc()["ID"];


  $sql = "INSERT INTO SearchEvent (USERID, SEARCH_TERM, SEARCH_NAME, SEARCH_TIME, SEARCH_FREQUENCY)
  VALUES ('" . trim($userId) . "', '" . trim($searchTerm) . "' , '" . trim($searchName) . "' , '" . $ts->format('Y-m-d H:i:s') . "' , '" . trim($frequency) . "')";


  if ($conn->query($sql) === TRUE) {
    $eventId = $conn->insert_id;
    echo "Record updated successfully";
  } else {
      echo strtotime($date);
    echo "Error updating record: " . $conn->error;
  }

  $conn->close();

require_once '../vendor/autoload.php';
use Crontab\Crontab;
use Crontab\Job;


if($frequency=='Minute'){
  $minute = "*/".$specific;
  $hour = $day = $month = $day_of_week = "*";

}
if($frequency=='Hourly'){
  $hour = "*/".$specific;
  $minute = $day = $month = $day_of_week = "*";
}





$job = new Job();
$job
    ->setMinute($minute)
    ->setHour($hour)
    ->setDayOfMonth($day)
    ->setMonth($month)
    ->setDayOfWeek($day_of_week)
    ->setCommand('php -f /var/www/phpfinalproject/php/cronExecute.php '."'".$searchTerm."'"." '".$eventId."'")
;

$crontab = new Crontab();
$crontab->addJob($job);
$crontab->write();
//$crontab->removeJob($job);
//$crontab->flush();
//exec('echo -e "`crontab -l`\n* * * * * /var/www/phpfinalproject/php/cronExecute.php hello" | crontab -');
//exec('echo -e "`crontab -l`\n'.$job->__toString().'" | crontab -');
//exec("touch /var/www/phpfinalproject/hi");
echo $job->__toString();
//echo exec("crontab ".$crontab->render());
//$crontab->removeJob($theJobYouWantToDelete);



?>
