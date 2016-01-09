<?php
require "core/init.php";

$itemCopyId=$_POST['itemCopyId'];

DB::getInstance()->delete("item_copy",array("item_copy_id"=>$itemCopyId));

echo "Item copy deleted.";
?>
