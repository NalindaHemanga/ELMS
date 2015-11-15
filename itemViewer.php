<?php
require 'core/init.php';

$cat_id = $_GET["cat_id"];
$editable = $_GET["editable"];
$categoryName;
$categoryNo;
if(isset($cat_id))
{
	$category = Category::search(array("category_id"=>$cat_id));
	$items = $category->get_items();
	$categoryName = $category->get_name();
	$categoryNo = $category->get_label();


	foreach($items as $label1){

		foreach($label1 as $label2){
		$itemId = $label2->get_id();
		
		echo "<div id='$itemId' class=\"dashicon\">";
		echo "<a onclick = itemClicked(\"$itemId\")>";
		echo "<img src=\"img/items/".$label2->get_name().".png \" height=\"150\" width=\"150\"/>";
		echo $label2->get_name();
		echo "</a>";
		echo "</div>";


		}
	}


}

if ($editable == 1){

	//itemView($cat_id);
	echo '<div  class="dashicon" >';
	echo "<a onclick = addItemClicked(\"$cat_id\") >";
	//echo		"<a href=\"item_add.php?cat_id=$cat_id&cat_name=$categoryName&cat_no=$categoryNo\">";
	//echo '<a href="#openModal">';
	echo	'<img src="img/items/plus.jpg" height="150" width="150" />';
	echo		'Add new item';
	echo		'</a>';
	echo		'</div>';

}


?>
