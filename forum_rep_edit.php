<?php
include 'core/init.php';


if (isset($_POST['new_rep'])){
	$new_rep=mysql_real_escape_string(htmlentities($_POST['new_rep']));
	$reply_id=$_POST['rep_id'];

	date_default_timezone_set("Asia/Colombo");
	$date=date("Y-m-d H:i:s");


$sql="UPDATE `forum_reply` SET `reply_post`='$new_rep', `reply_posted_date`='$date' WHERE `reply_id`=$reply_id";
DB::getInstance()->directUpdate($sql);
if ($sql==true){
	echo 'success';

}
elseif ($sql==false){
	echo 'unsucess';
}
}
?>