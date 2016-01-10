<?php

	require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}
	
	$searchValue=$_GET["searchVal"];
	$new_supplier=Supplier::search(["supplier_email"=>$searchValue]);

	if($new_supplier){
		echo "<div>";
		echo "<fieldset>";
		echo "<legend>Supplier Details</legend>";
		echo "<div style='display:inline-block'>";

		echo "<div style='display:inline-block;vertical-align:top'>";



		echo "<table style='padding:20px;'>";
		echo "<tr><td>Supplier Name    :<th><td>".$new_supplier->getCompany();
		echo "<tr><td>Email    :<th><td>".$new_supplier->getEmail()."<td><tr>";
		echo "<tr><td>Address :<th><td>".$new_supplier->getStreet(). "," . $new_supplier->getLine2(). "," . $new_supplier->getCity()."." . "<td><tr>";
		echo "<tr><td>Province    :<th><td>".$new_supplier->getProvince()."<td><tr>";
		echo "<tr><td>Postal    :<th><td>".$new_supplier->getPostal()."<td><tr>";
		echo "<tr><td>Country    :<th><td>".$new_supplier->getCountry()."<td><tr>";
		echo "<tr><td>Contact Number    :<th><td>".$new_supplier->getTelephone()."<td><tr>";
		echo "</table>";

	}
	else{

		echo "<h3><font color='red'>No Supplier Found !!</font></h3>";

	}


?>
