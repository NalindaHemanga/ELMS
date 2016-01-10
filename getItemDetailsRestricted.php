<?php
require 'core/init.php';

$item_id = $_GET["item_id"];
$cat_label = $_GET["cat_label"];
if(isset($item_id))
	$item = Item::search(array("item_id"=>$item_id));

	$itemName = $item->get_name();
	$copies = $item->get_copies();
	$itemDescription = $item->get_description();
	$itemTechDetails = $item->get_technical_details();
	$itemReference = $item->get_reference();
	$itemType = $item->get_type();
	//echo $itemType;
	//print_r($item);
	$itemPic = $itemName;
	$ItemNameReplaced = str_replace(" ","%19",$itemName);
	$itemPic2 = $ItemNameReplaced;
	echo"<div style=\"font-family: Georgia, serif;font-size:25px;\"><div style=\"font-size:25px; float:left;\" id=\"ItemName1\">$itemName</div>
	<div style=\"float:right;\">
	
	</div>
	<br>
		<ul><li> <div style=\"font-size:20px;\">Description</div><div style=\"font-size:15px;\" id=\"ItemDesc1\">$itemDescription</div> </li><br>
		<li> <div style=\"font-size:20px;\">Technical Details</div><div style=\"font-size:15px;\" id=\"ItemTechDet1\">$itemTechDetails</div> </li>
		<li> <div><img id=\"item_pic\" src=\"img/items/$itemPic.png\" height=\"195\" width=\"185\" style=\"border:1px solid #ccc;padding:22px\" /></div> </li>

		<li> <div style=\"font-size:20px;\">Reference</div>";
	echo "<div id=\"refLinks\">";
	foreach($itemReference as $link){
		echo "<div style=\"font-size:15px;\"><a href=\"$link\" target=\"_blank\">$link</a></div> ";

	}
	echo "</div></li>";
	echo "</ul></div>";
	
?>
