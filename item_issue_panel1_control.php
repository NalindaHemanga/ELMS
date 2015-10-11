<?php

	require_once 'core/init.php';
	$searchValue=$_GET["searchVal"];
	$new_member=Member::search(["member_nic"=>$searchValue]);

	if($new_member){
		echo "<div>";
		echo "<fieldset>";
		echo "<legend>Member Details</legend>";
		echo "<div style='display:inline-block'>";

		echo "<img src='img/profile_pictures/".$new_member->getNicNo().".jpg' width='100' hight='120' style='border:1px solid #ccc;'/>";
		echo "</div>";

		echo "<div style='display:inline-block;vertical-align:top'>";



		echo "<table style='padding:20px;'>";
		echo "<tr><td>Name    :<th><td>".$new_member->getInitials() . " " . $new_member->getSurname()."<td><tr>";
		echo "<tr><td>Role/s    :<th><td>".$new_member->getRoles()."<td><tr>";
		echo "<tr><td>Remarks :<th><td>".$new_member->getRemarks()."<td><tr>";
		echo "</table>";


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
		echo "<input type='button' class='button' value='Proceed'/>";
		echo "</div>";
	}
	else{

		echo "<h3><font color='red'>No Member Found !!</font></h3>";

	}


?>
