<?php
require 'core/init.php';

$cat_id = $_GET["cat_id"];
if(isset($cat_id))
{
	//itemView($cat_id);
	echo '<div  class="dashicon" >';
	echo		'<a href="item_add.php">';
	echo	'<img src="img/items/plus.jpg" height="150" width="150" />';
	echo		'Add new item';
	echo		'</a>';
	echo		'</div>';

}

function itemView($cat_id){
	$item_ids = "SELECT item_id FROM item_category WHERE Cat_ID=$cat_id;";
	$fetch2 = mysql_query($item_ids);
	$itemSet = array();
	$num=mysql_num_rows($fetch2);
	
	if(0==$num){}
else{

	while($row = mysql_fetch_assoc($fetch2))
	{
		$itemSet[] = $row['item_id'];
		$item_id = $row['item_id'];
		$item_details = "SELECT item_name,image_url FROM item WHERE item_id=$item_id;";
		$fetch3 = mysql_query($item_details);
		$num1=mysql_num_rows($fetch3);
		echo "<div id='item'>";
		if(0==$num1){
			echo "NO IMAGE";
		}
		else{
			while($row1 = mysql_fetch_assoc($fetch3)){
				echo "<a href='default.asp'>";
				echo "<img src='".$row1['image_url']."'>";
				echo $row1['item_name'];
				echo "</a>";
			}
		}
		
		echo "</div>";
	}
}


}

?>
