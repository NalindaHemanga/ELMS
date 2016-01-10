<?php
require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role) || in_array("Related Lecturer", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

$cat_label=$_POST['CatLabel'];
$cat_name=$_POST['cat_name'];

DB::getInstance()->delete("category",array("category_no"=>$cat_label));

echo "Category $cat_name deleted.";
?>
