<?php
require "core/init.php";

$cat_label=$_POST['CatLabel'];
$cat_name=$_POST['cat_name'];

DB::getInstance()->delete("category",array("category_label"=>$cat_label));

$category = Category::search(array("category_label" => $cat_label));
$category->deleteCat();
echo "Category $cat_name deleted.";
?>
