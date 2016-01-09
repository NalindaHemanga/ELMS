<?php
include 'core/init.php';


if (isset($_POST['new_rep'])){
	$new_rep=mysql_real_escape_string(htmlentities($_POST['new_rep']));
	$reply_id=$_POST['rep_id'];


$sql="UPDATE `forum_reply` SET `reply_post`='$new_rep' WHERE `reply_id`=$reply_id";
DB::getInstance()->directUpdate($sql);
if ($sql===true){
	echo 'sucess';

}
elseif ($sql===false){
	echo 'unsucess';
}
}
?>