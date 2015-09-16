<?php
require 'core/init.php';

$cat_id = $_GET["cat_id"];
if(isset($cat_id))
{
	$category = Category::search(array("category_id"=>$cat_id));
	$items = $category->get_items();
	foreach($items as $label1){
		
		foreach($label1 as $label2){
		echo "<div id='item'>";
		echo "<a href='default.asp'>";
		//echo "<img src='".$row1['image_url']."'>";
		echo $label2->get_name();
		echo "</a>";
		echo "</div>";
		}
	}





	//itemView($cat_id);
	echo '<div  class="dashicon" >';
	echo		'<a href="item_add.php">';
	echo	'<img src="img/items/plus.jpg" height="150" width="150" />';
	echo		'Add new item';
	echo		'</a>';
	echo		'</div>';

}


?>
