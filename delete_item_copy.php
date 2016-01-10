<?php
require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role) || in_array("Related Lecturer", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

$itemCopyId=$_POST['itemCopyId'];

DB::getInstance()->delete("item_copy",array("item_copy_id"=>$itemCopyId));

echo "Item copy deleted.";
?>
