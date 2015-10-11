<?php
require 'core/init.php';
if(array_key_exists("item_id", $_GET)){
	$value=$_GET["item_id"];


	$item = Item::search(array("item_id"=>$value));
	$itemName = $item->get_name();
	$copies = $item->get_copies();
	if (count($copies)>0){
		echo"<ul>";
		foreach($copies as $itemCopy){
			$itemCopyId = $itemCopy->get_id();
			$itemCopyNo = $itemCopy->get_no();
			echo"<li class='node' draggable='true' style='border:1px solid #1fb8eb' onclick = itemCopyClicked(\"$itemCopyId\")>$itemCopyNo</li>";
		}
		echo"</ul>";
	}

	else{
		echo"No item copies for this item.";
	}
}else if(array_key_exists("copy_no", $_GET)){

	$value=$_GET["copy_no"];

	$itemCopy=ItemCopy::search(array("item_copy_no"=>$value));
	if($itemCopy != NULL){

		$itemCopyId = $itemCopy->get_id();
			$itemCopyNo = $itemCopy->get_no();
			echo"<ul><li class='node' draggable='true' style='border:1px solid #1fb8eb' onclick = itemCopyClicked(\"$itemCopyId\")>$itemCopyNo</li></ul>";
	}


}

//$item_id = $_GET["item_id"];





	?>
