<?php
error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();
  
require_once '../vendor/autoload.php';
use Crontab\Crontab;
use Crontab\Job;

$struct = json_decode($_POST['data']);
foreach($struct as $key => $value){
	${''.$key} = $value;
}

$job = new Job();
$job
    ->setMinute($minute)
    ->setHour($hour)
    ->setDayOfMonth($day)
    ->setMonth($month)
    ->setDayOfWeek($day_of_week)
    ->setCommand('myAmazingCommandToRunPeriodically')
;

$crontab = new Crontab();
$crontab->addJob($job);
$crontab->write();
echo $crontab->render();
//$crontab->removeJob($theJobYouWantToDelete);
	
	
	
?>
