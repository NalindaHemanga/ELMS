<?php

require "core/init.php";


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
