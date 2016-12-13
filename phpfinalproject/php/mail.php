<?php
$searchName = argv[1];
//need the username from the searchevent
if(mail("mwilde345@gmail.com","Search Update","Hi there,\nThis email is notifying you that your search '".$searchName."' produced a new result."))
echo "Email successfully sent";
else
echo "An error occured";
?>
