<?php
//require "core/init.php";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dberror = "DATABSE NOT FOUND!";

$connect = mysql_connect($dbhost,$dbuser,$dbpass) or die ($dberror);
$dbselect = mysql_select_db('electronicdb') or die("ERROR!");


$cat_label=$_POST['CatLabel'];
$cat_name=$_POST['edited_cat_name'];

//Insert query
$query = mysql_query("UPDATE `electronicdb`.`category` SET `category_name` = '$cat_name' WHERE `category`.`category_no` = '$cat_label';");


?>
