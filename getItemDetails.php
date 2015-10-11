<?php
require 'core/init.php';

$item_id = $_GET["item_id"];
if(isset($item_id))
	$item = Item::search(array("item_id"=>$item_id));
	$itemName = $item->get_name();
	$copies = $item->get_copies();
	if (count($copies)>0){
	echo"<ul>";
	foreach($copies as $itemCopy){
	$itemCopyId = $itemCopy->get_id();
	$itemCopyNo = $itemCopy->get_no();
	echo"<li class='node' 
	draggable='true' style='border:1px solid #1fb8eb' onclick = itemCopyClicked(\"$itemCopyId\")>$itemCopyNo</li>";
	}
	echo"</ul>";
	}else{echo"No item copies for this item.";}
	echo "<button type=\"button\" onclick=\"location.href = 'item_copy_add.php?item_id=$item_id&item_name=$itemName';\">Add Item Copy</button>";
?>
