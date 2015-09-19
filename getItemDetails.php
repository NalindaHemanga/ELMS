<?php
require 'core/init.php';

$item_id = $_GET["item_id"];
if(isset($item_id))
	$item = Item::search(array("item_id"=>$item_id));
	$copies = $item->get_copies();
	if (isset($copies)){
	echo"<ul>";
	foreach($copies as $itemCopy){
	$itemCopyId = $itemCopy->get_id();
	$itemCopyNo = $itemCopy->get_no();
	echo"<li onclick = itemCopyClicked(\"$itemCopyId\")>$itemCopyNo</li>";
	}
	echo"</ul>";
	}
?>
