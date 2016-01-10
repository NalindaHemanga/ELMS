<?php

require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role) || in_array("Related Lecturer", $member_role)){

	}else{
		header('location:restricted_page.php');
	}


$new_cat_name=$_POST['cat_name1'];

$newCategory = new Category();
$newCategory->createCat(array("category_name"=>$new_cat_name));
//Insert query
if($newCategory->registerCat()){
		echo "New category added";
}else
{
	echo "Category addition failed";
}


?>
