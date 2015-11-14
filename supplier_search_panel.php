<?php

	require_once 'core/init.php';
	$searchValue=$_GET["searchVal"];
	$new_supplier=Supplier::search(["supplier_email"=>$searchValue]);

	if($new_supplier){
		echo "<div>";
		echo "<fieldset>";
		echo "<legend>Supplier Details</legend>";
		echo "<div style='display:inline-block'>";

		//echo "<img src='img/profile_pictures/".$new_member->getNicNo().".jpg' width='100' hight='120' style='border:1px solid #ccc;'/>";
		//echo "</div>";

		echo "<div style='display:inline-block;vertical-align:top'>";



		echo "<table style='padding:20px;'>";
		echo "<tr><td>Supplier Name    :<th><td>".$new_supplier->getCompany();
		echo "<tr><td>Email    :<th><td>".$new_supplier->getEmail()."<td><tr>";
		echo "<tr><td>Address :<th><td>".$new_supplier->getStreet(). "," . $new_supplier->getLine2(). "," . $new_supplier->getCity()."." . "<td><tr>";
		echo "<tr><td>Province    :<th><td>".$new_supplier->getProvince()."<td><tr>";
		echo "<tr><td>Postal    :<th><td>".$new_supplier->getPostal()."<td><tr>";
		echo "<tr><td>Country    :<th><td>".$new_supplier->getCountry()."<td><tr>";
		echo "</table>";

/*
		echo "</div>";
		echo "</fieldset>";
		echo "</div>";
		echo "<br/>";
		echo "<div>";
		echo "<fieldset>";
		echo "<legend>Transaction History</legend>";

		$records=Transaction::getHistory($searchValue);
		echo "<table border='1px' padding='2px'>";
		echo "<tr><th>Item Name</th><th>Borrowed Date</th><th>Returned Date</th><th>Comments</th></tr>";
		foreach ($records as $key => $value) {
			echo "<tr><td>".$value["item_name"]."<td>".$value["borrowed_date"]."</td>"."<td>".$value["returned_date"]."</td>"."<td>".$value["transaction_comment"]."</td></tr>";
		}



		echo "</table>";
		echo "</fieldset>";
		echo "</div>";
		echo "<br/>";
		echo "<br/>";
		echo "<div>";
		echo "<input type='button' class='button' value='Proceed' onclick=\"location.href='item_issue_panel2.php';\"/>";
		echo "</div>";*/
	}
	else{

		echo "<h3><font color='red'>No Supplier Found !!</font></h3>";

	}


?>
