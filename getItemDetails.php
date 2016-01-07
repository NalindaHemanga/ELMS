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
	<div style=\"float:left; padding-right:10px;\"><a onclick=itemEditClicked(\"$item_id\",\"$itemPic2\"); onmouseover=\"\" style=\"cursor: pointer;\"><img src=\"img/icons/glyphicons_free/glyphicons/png/glyphicons-151-edit.png\" height=\"25\" width=\"25\" /></a></div>
	<div style=\"float:right;\"><a onclick=itemDelete(\"$item_id\"); onmouseover=\"\" style=\"cursor: pointer;\"><img src=\"img/icons/glyphicons_free/glyphicons/png/glyphicons-17-bin.png\" height=\"25\" width=\"20\" /></a></div>
	</div>
	<br>
		<ul><li> <div style=\"font-size:20px;\">Description</div><div style=\"font-size:15px;\" id=\"ItemDesc1\">$itemDescription</div> </li><br>
		<li> <div style=\"font-size:20px;\">Technical Details</div><div style=\"font-size:15px;\" id=\"ItemTechDet1\">$itemTechDetails</div> </li>
		<li> <div><img id=\"item_pic\" src=\"img/items/$itemPic.png\" height=\"195\" width=\"185\" style=\"border:1px solid #ccc;padding:22px\" /></div> </li><br></ul></div>";
	if (count($copies)>0){
	echo"<ul>";
	foreach($copies as $itemCopy){
	$itemCopyId = $itemCopy->get_id();
	$itemCopyOwner = $itemCopy->get_owner();
	$itemCopyStatus = $itemCopy->get_status();
	$itemCopyBarcode = $itemCopy->get_barcode();
	$itemCopyPrice = $itemCopy->get_price();
	$itemCopyInstalledDate = $itemCopy->get_installed_date();
	$itemCopyCondition = $itemCopy->get_condition();
	$itemCopySupplier = $itemCopy->get_supplier();
	$itemCopyNo = $itemCopy->get_no();
	echo"<div style=\"float:left;\"><li onclick = itemCopyClicked(\"$itemCopyId\",\"$itemCopyOwner\",\"$itemCopyStatus\",\"$itemCopyBarcode\",\"$itemCopyPrice\",\"$itemCopyInstalledDate\",\"$itemCopySupplier\",\"$itemCopyNo\");>$itemCopyNo &nbsp;</li></div><div><font color=\"red\"> (<a onclick=itemCopyDelete(\"$itemCopyId\"); onmouseover=\"\" style=\"cursor: pointer;\">Remove</a>) </font></div>";
	}
	echo"</ul>";
	}else{echo"<div style=\"font-family: Georgia, serif;font-size:15px;\">No item copies for this item.<div>";}
	//echo "<button type=\"button\" onclick=\"location.href = 'item_copy_add.php?item_id=$item_id&item_name=$itemName';\">Add Item Copy</button>";
	//$ItemNameReplaced = str_replace(" ","%19",$itemName);
	echo "<button type=\"button\" onclick=AddItemCopyClicked(\"$item_id\",\"$ItemNameReplaced\")>Add Item Copy</button>";
	
?>
