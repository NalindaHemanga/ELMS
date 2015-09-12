<?php
require "core/init.php";

$cat_id=$_POST['CatId'];
$cat_name=$_POST['cat_name'];

//Insert query
$query = mysql_query("DELETE FROM `electronicdb`.`category` WHERE `category`.`category_id` = $cat_id");
echo "Category $cat_name deleted.";

DB::getInstance()->delete("category",array("category_id"=>$cat_id));

?>
