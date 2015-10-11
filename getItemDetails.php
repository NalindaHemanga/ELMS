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
	$itemPic = $itemName.$cat_label;
	echo"<div style=\"font-family: Georgia, serif;font-size:25px;\"><div style=\"font-size:25px;\">$itemName</div><br>
		<ul><li> <div style=\"font-size:20px;\">Description</div><div style=\"font-size:15px;\">$itemDescription</div> </li><br>
		<li> <div style=\"font-size:20px;\">Technical Details</div><div style=\"font-size:15px;\">$itemTechDetails</div> </li>
		<li> <div><img id=\"item_pic\" src=\"img/items/$itemPic.jpg\" height=\"195\" width=\"185\" style=\"border:1px solid #ccc;padding:22px\" /></div> </li><br></ul></div>";
	if (count($copies)>0){
	echo"<ul>";
	foreach($copies as $itemCopy){
	$itemCopyId = $itemCopy->get_id();
	$itemCopyNo = $itemCopy->get_no();
	echo"<li onclick = itemCopyClicked(\"$itemCopyId,\")>$itemCopyNo</li>";
	}
	echo"</ul>";
	}else{echo"<div style=\"font-family: Georgia, serif;font-size:15px;\">No item copies for this item.<div>";}
	echo "<button type=\"button\" onclick=\"location.href = 'item_copy_add.php?item_id=$item_id&item_name=$itemName';\">Add Item Copy</button>";
?>
