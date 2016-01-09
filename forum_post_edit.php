<?php
include 'core/init.php';


if (isset($_POST['edited_post'])){
	$edited_post=mysql_real_escape_string(htmlentities($_POST['edited_post']));
	$post_id=$_POST['post_id'];

	date_default_timezone_set("Asia/Colombo");
	$date=date("Y-m-d H:i:s");


$sql="UPDATE `forum_posts` SET `post_description`='$edited_post', `posted_date`='$date' WHERE `post_id`=$post_id";
DB::getInstance()->directUpdate($sql);
if ($sql==true){
	echo 'success';

}
elseif ($sql==false){
	echo 'unsuccess';
}
}
?>