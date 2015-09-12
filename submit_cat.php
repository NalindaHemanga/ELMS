<?php

require "core/init.php";

$parent_cat_id=$_POST['parent1'];
$new_cat_name=$_POST['cat_name1'];


if($parent_cat_id == 0){
	DB::getInstance()->insertRow("category",array("category_name"=>$new_cat_name));
}
else{
//Insert query
DB::getInstance()->insertRow("category",array("category_name"=>$new_cat_name,"category_parent_id"=>$parent_cat_id));
}
echo "New category added";

?>
