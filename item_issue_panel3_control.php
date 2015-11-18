<?php 
	
require_once 'core/init.php';
	
if(isset($_SESSION["basket"]) && isset($_SESSION["items"])){

	$state=true;
	DB::getInstance()->startTr();
	$newTransaction=new Transaction();

	$data=array(

			"id"=>null,
			"purpose"=>$_POST["purpose"],
			"borrow_comment"=>$_POST["comments"],
			"return_comment"=>null,
			"member_id"=>$_SESSION["member_details"]["id"],
			"borrowed_date"=>date("Y-m-d"),
			"expected_return_date"=>$_POST["expected_return_date"]


		);
	
	$newTransaction->create($data);

	if($newTransaction->add()){
		$transaction_id=DB::getInstance()->getLastId();

		foreach ($_SESSION["basket"] as $key => $value) {
			$newItemTransaction= new ItemTransaction();
		
			$data=array(

				"item_copy_id"=>$value["item_copy_id"],
				"transaction_id"=>$transaction_id,
				"borrowed_quantity"=>$value["quantity"],
				"returned_date"=>null,
				"returned_quantity"=>null,
				"status"=>0

		);
		
		$newItemTransaction->create($data);
		if($newItemTransaction->add()){
			$sql="UPDATE item_copy SET item_copy_status=0 WHERE item_copy_id='".$value["item_copy_id"]."';";
			if(!DB::getInstance()->directUpdate($sql)){
				$state=false;
				break;
			}
		}
		else{

			$state=false;
			break;

		}
}

}
	else{
		$state=false;

	}

	if($state){
		DB::getInstance()->commitTr();
		$_SESSION["temp_basket"]=$_SESSION["basket"];
		unset($_SESSION["basket"]);
		unset($_SESSION["items"]);
		echo "<div style='text-align:center';>";
		
		echo "<img src='img/icons/success-icon.png' hight='200' width='200'>";
		echo "<h2>Transaction Successful !</h2>";
		echo "<a href='generate_slip.php' target='_blank'><h4>Print Transaction Slip</h4></a>";
		echo "</div>";

	}
	else{

		DB::getInstance()->rollBackTr();
		
		echo "<div style='text-align:center';>";
		echo "<img src='img/icons/error-icon.png' hight='200' width='200'>";
		echo "<h2>Transaction Unsuccesssul !</h2>";
		echo "<a href='item_issue_panel2.php' target='_blank'><h4><< Back to item transaction</h4></a>";
		echo "</div>";

	}
	
	
}
else{
	
	
	echo "error";
	
}



?>