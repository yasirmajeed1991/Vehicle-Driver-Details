<?php 

$unixTime = time();
$timeZone = new \DateTimeZone('Africa/Blantyre');
$time = new \DateTime();
$time->setTimestamp($unixTime)->setTimezone($timeZone);


?>