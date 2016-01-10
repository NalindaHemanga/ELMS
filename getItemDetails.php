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

	<button style='width:5em;'' onclick=itemEditClicked(\"$item_id\",\"$itemPic2\");>   <div><img src='img/icons/glyphicons_free/glyphicons/png/glyphicons-151-edit.png' width='8' height='8' /><font face='Calibri' color='black' size='2'> Edit </font></div></button>

	<button style='width:10em;' onclick=itemDelete(\"$item_id\");>   <div><img src='img/icons/glyphicons_free/glyphicons/png/glyphicons-17-bin.png' width='13' height='15' /><font face='Calibri' color='black' size='4'> Delete </font></div></button>
	
	<button style=\"width:15em;background:#43D14C;\" onclick=AddItemCopyClicked(\"$item_id\",\"$ItemNameReplaced\");>   <div><img src=\"img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png\" width=\"13\" height=\"13\" /><font face=\"Calibri\" color=\"black\" size=\"4\"> Add copy </font></div></button>

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
	echo "<br><li> <div style=\"font-size:20px;\">Item Copies</div></li></ul></div>";
	if (count($copies)>0){
	echo"<ul>";
	foreach($copies as $itemCopy){
//collecting item copy details
	$itemCopyId = $itemCopy->get_id();
	$itemCopyOwner = $itemCopy->get_owner();
	$itemCopyStatus = $itemCopy->get_status();
	$itemCopyBarcode = $itemCopy->get_barcode();
	$itemCopyPrice = $itemCopy->get_price();
	$itemCopyInstalledDate = $itemCopy->get_installed_date();
	$itemCopyCondition = $itemCopy->get_condition();
	$itemCopyNo = $itemCopy->get_no();
	$itemCopySupplier = $itemCopy->get_supplier();
//collecting item copy supplier details
	$supplier=Supplier::search(array("supplier_id"=>$itemCopySupplier));
	$supplierName=$supplier->getCompany();
	$supplierName = str_replace(" ","%19",$supplierName);
	$supplierEmail=$supplier->getEmail();
	echo"<div style=\"float:left;\"><li onclick = itemCopyClicked(\"$itemCopyId\",\"$itemCopyOwner\",\"$itemCopyStatus\",\"$itemCopyBarcode\",\"$itemCopyPrice\",\"$itemCopyInstalledDate\",\"$itemCopySupplier\",\"$supplierName\",\"$supplierEmail\",\"$itemCopyNo\");><a class=\"changeBlue\">$itemCopyNo &nbsp;</a></li></div><div style=\"font-size:16px; cursor:pointer;\"><font color=\"red\"> (<a onclick=itemCopyDelete(\"$itemCopyId\"); >Remove</a>) </font></div>";
	}
	echo"</ul>";
	}else{echo"<div style=\"font-family: Georgia, serif;font-size:15px;\">No item copies for this item.<div>";}
	//echo "<button type=\"button\" onclick=\"location.href = 'item_copy_add.php?item_id=$item_id&item_name=$itemName';\">Add Item Copy</button>";
	//$ItemNameReplaced = str_replace(" ","%19",$itemName);
	//echo "<button type=\"button\" onclick=AddItemCopyClicked(\"$item_id\",\"$ItemNameReplaced\")>Add Item Copy</button>";
	
?>
