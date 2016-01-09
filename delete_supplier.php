<?php
require "core/init.php";

$supId=$_POST['supId'];


DB::getInstance()->delete("supplier",array("supplier_id"=>$supId));


echo "Supplier deleted.";
?>
