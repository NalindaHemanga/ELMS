
<?php

$timestamp = strtotime('2016-1-11');
$y=strtotime(date("m/d/Y"));

var_dump($timestamp>=$y);

$day = date('l', strtotime('2009-10-23'));
echo $day;
?>