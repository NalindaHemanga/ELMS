<?php
require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role) || in_array("Related Lecturer", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

$itemCopyId=$_POST['itemCopyId'];
$new_copy_num=$_POST['new_copy_num'];
//echo $new_copy_num;
$item_copy = ItemCopy::search(array("item_copy_id"=>$itemCopyId));
$prev_num = $item_copy->get_no();
$array = explode("_",$prev_num);
$new_num = $array[0]."_".$new_copy_num;

//echo $new_num;
if ($item_copy->update_item_copy_no($new_num)){
	echo "Item number updated.";
	}
else{

	echo "Sorry, Update failed. Given ID already exists!";
	}
?>
