<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dberror = "DATABSE NOT FOUND!";

$connect = mysql_connect($dbhost,$dbuser,$dbpass) or die ($dberror);
$dbselect = mysql_select_db('elab') or die("ERROR!");

?>
