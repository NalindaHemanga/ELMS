<?php
require 'includes/CategoryTree/db_connect1.php'; 
require 'classes/Category.php';

$query = "SELECT * FROM category;";
$fetch = mysql_query($query);
$catagories = array();
while($row = mysql_fetch_assoc($fetch))
{
	$catagory = new Category;
	$catagory->set_id($row['category_id']);
	$catagory->set_name($row['category_name']);
	$catagory->set_parent($row['category_parent_id']);
	
	$catagories[] = $catagory;
}

//////////////////////////////////////////////////////////////////////// This recursive function will create the HTML code for "collapse tree" using catagory objects in the Main.php 

function collapseTree($catagory, $catagories){
$name = $catagory->get_name();
$Cur_ID = $catagory->get_id();
echo "<li>";
echo "<label for=$Cur_ID>".$name."</label> <input type='checkbox' id=$Cur_ID onclick=loadXMLDoc('".$Cur_ID."') />";
echo "<ol>";

$subCats = array();
$categoryIndex = 0;
foreach($catagories as $category){
	if($category->get_parent() == $Cur_ID){
		$subCats[] = $categoryIndex;
	}
	$categoryIndex = $categoryIndex + 1;
}	

if(count($subCats) > 0){
foreach($subCats as $subCatID){
	$subCat = $catagories[(int)$subCatID];
	collapseTree($subCat, $catagories);
}
}
echo "</ol>";
echo "</li>";
}


?>
