<?php 
	
	$newTransaction=new Transaction();

	$data=array(

			"transaction_id"=>null,
			"transaction_description"=>$_POST["purpose"],
			"transaction_comment"=>$_POST["comments"],
			"member_id"=>$_SESSION["member_details"]["id"]



		)

	$newTransaction->add();
	$transaction_id=DB::getInstance()->getLastId();

	foreach ($_SESSION["basket"] as $key => $value) {
		$newItemTransaction= new ItemTransaction();
		
		$data=array(

			"item_copy_id"=>$value["item_copy_id"],
			"transaction_id"=>$transaction_id,
			"borrowed_date"=>date("Y/m/d"),
			"borrowed_quantity"=>$value["quantity"],
			"expected_return_date"=>$_POST["expected_return_date"],
			"returned_date"=>null,
			"returned_quantity"=>null,
			"status"=>0

	);

	$newItemTransaction->create($data);
	$newItemTransaction->add();
}

	
	




?>