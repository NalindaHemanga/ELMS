<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
</head>
<body>
<h2>Category Matrix</h2>
<table style="width:100%">

<?php

require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role) || in_array("Related Lecturer", $member_role)){

	}else{
		header('location:restricted_page.php');
	}
$categoryStruct = Category::getCatList();
$categoryTable = array();
//print_r($categoryStruct);
foreach($categoryStruct as $key => $value){

	$categoryTable[$key] = count($value);
}
	$sql = "SELECT item_no FROM item;";
	$itemLabels = DB::getInstance()->directSelect($sql);
	$itemTable = array();
	foreach($itemLabels as $itemLabels1){
		foreach($itemLabels1 as $key => $value){
			$value1= substr($value,0,1);
			$value3= (int)substr($value,1,1);
			if(!isset($itemTable[$value1])){
				$itemTable[$value1] = 0;
			}
			if($itemTable[$value1]<$value3){
				$itemTable[$value1] = $value3;
			}
		}
	}
ksort($itemTable);
echo "<tr>";
echo "<td colspan = \"2\"></td>";
//echo "<td></td>";
foreach($itemTable as $key => $value){
	
	echo "<th colspan = \"$value\">$key</th>";
	
}
echo "</tr>";

foreach($categoryTable as $key => $value){

	for ($x = 1; $x <= $value; $x++) {
  	echo "<tr>";
	if($x == 1){
		echo "<th rowspan=\"$value\">$key</th>";
	}
	$catLabel = $key.$x;
	$category = Category::search(array("category_no"=>$catLabel));
	$catName = $category->get_name();
	echo "<td>$x $catName</td>";
	$itemList = $category->get_items();
	foreach($itemTable as $key2 => $value2){
		for($y = 1; $y <= $value2; $y++){
		if(isset($itemList[$key2][$y])){
			$itemName = $itemList[$key2][$y]->get_name();
			$itemId = $itemList[$key2][$y]->get_id();
			echo "<td><a href=\"#\" onclick=cellClicked(\"$itemId\",\"$catLabel\")> $itemName</a></td>";
		}
		else{
			echo "<td>$key2$y</td>";
		}
		}
	}
	echo "</tr>";
	
	}
	
}


?>


</table>

</body>
</html>

