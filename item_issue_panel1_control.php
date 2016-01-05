<?php

	require_once 'core/init.php';
	
	$searchValue=$_GET["searchVal"];
	$new_member=Member::search(["member_nic"=>$searchValue]);

	if($new_member){
		$_SESSION["items"]=array();
    	$_SESSION["basket"]=array();

    	$remark=$new_member->getRemarks();
    	if($remark=="Borrow Allowed"){
    		$bgcolor="#00FF00";
    	}
    	else{
    		$bgcolor="#FF0000";
    	}
    	
		echo "<div>";
		echo "<fieldset>";
		echo "<legend>Member Details</legend>";
		echo "<div style='display:inline-block'>";

		echo "<img src='img/profile_pictures/".$new_member->getNicNo().".jpg' width='100' hight='120' style='border:1px solid #ccc;'/>";
		echo "</div>";

		echo "<div style='display:inline-block;vertical-align:top' class='datagrid'>";



		echo "<table style='padding:20px;'>";
		echo "<tbody><tr><td>Name    :<th><td>".$new_member->getInitials() . " " . $new_member->getSurname()."<td><tr>";
		echo "<tr><td>Role/s    :<th><td>".$new_member->getRoles()."<td><tr>";
		echo "<tr><td>Remarks :<th><td bgcolor=\"$bgcolor\">".$remark."<td><tr>";
		echo "</tbody></table>";


		echo "</div>";
		echo "</fieldset>";
		echo "</div>";
		echo "<br/>";
		echo "<div>";
		echo "<fieldset>";
		echo "<legend>Transaction History</legend>";



		

		$records=Transaction::getHistory($searchValue);
		echo "<div class='datagrid'>";
		echo "<table border='1px' padding='2px'>";
		echo "<thead><tr><th>Item Copy No</th><th>Item Name</th><th>Borrowed Date</th><th>Returned Date</th><th>Comments</th></tr></thead>";
		foreach ($records as $key => $value) {
			echo "<tbody><tr><td>".$value["item_copy_no"]."</td><td>".$value["item_name"]."<td>".$value["borrowed_date"]."</td>"."<td>".$value["returned_date"]."</td>"."<td>".$value["return_comment"]."</td></tr></tbody>";
		}



		echo "</table>";
		echo "</div>";
		echo "</fieldset>";
		echo "</div>";
		echo "<br/>";
		echo "<br/>";
		echo "<div>";
		echo "<input type='button' class='button' value='Proceed' onclick=\"location.href='item_issue_panel2.php';\"/>";
		echo "</div>";

		$mem_info=array(

				'initials'=>$new_member->getInitials(),
				'surname'=>$new_member->getSurname(),
				'nic'=>$searchValue,
				'id'=>$new_member->getId()
			);

		$_SESSION['member_details']=$mem_info;
	}
	else{

		echo "<h3><font color='red'>No Member Found !!</font></h3>";

	}


?>
