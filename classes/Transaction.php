<?php


class Transaction{

private $id,
		$purpose,
		$borrow_comment,
		$return_comment,
		$member_id,
		$borrowed_date,
		$expected_return_date,
		$transactions=array();

public function __construct(){


	}

public function create($data){

	$this->id = $data["id"];
	$this->purpose = $data["purpose"];
	$this->borrow_comment=$data["borrow_comment"];
	$this->return_comment=$data["return_comment"];
	$this->member_id=$data["member_id"];
	$this->borrowed_date=$data["borrowed_date"];
	$this->expected_return_date=$data["expected_return_date"];


}

public function add(){

	$row = array(

			"transaction_id"=>$this->id,
			"transaction_description"=>$this->purpose,
			"transaction_comment"=>$this->borrow_comment,
			"member_id"=>$this->member_id,
			"borrowed_date"=>$this->borrowed_date,
			"expected_return_date"=>$this->expected_return_date

		);

	if(DB::getInstance()->insertRow("transaction",$row)){
			return true;
			

	}
	else{
		return false;

	}

}
public function setItems($items=array()){
	$this->transactions=$items;
}

public function getMemberId(){
	return $this->member_id;
}

public function getTransactionId(){
	return $this->id;
}

public function getPurpose(){
	return $this->purpose;
}

public function getBorrowComment(){
	return $this->borrow_comment;
}

public function getReturnComment(){
	return $this->return_comment;
}

public function getBorrowedDate(){
	return $this->borrowed_date;
}

public function getTransactions(){
	return $this->transactions;
}

public function getExpectedReturnDate(){
	return $this->expected_return_date;
}

public function getTransactionItems(){
	return $this->transactions;
}


public static function getHistory($value,$limit){

	$sql="SELECT item_copy_no,item_name,borrowed_date,returned_date,transaction_comment,return_comment FROM item,item_transaction it,transaction,member,item_copy WHERE member_nic='".$value."' AND member.member_id=transaction.member_id AND it.transaction_id=transaction.transaction_id AND item.item_id=item_copy.item_id AND it.item_copy_id=item_copy.item_copy_id ORDER BY borrowed_date DESC limit $limit;";
	return DB::getInstance()->directSelect($sql);


}

public static function getPendingReturns($member_nic=null){

	if(isset($member_nic)){

		$member=Member::search(["member_nic"=>$member_nic]);
		$extra="AND member_id=".$member->getId();
	}
	else{
		$extra="";
	}
	
	$sql="SELECT DISTINCT t.transaction_id,transaction_description,t.borrowed_date,t.expected_return_date,member_id FROM transaction t,item_transaction it WHERE t.transaction_id=it.transaction_id AND status=0 ".$extra.";";
	$result=DB::getInstance()->directSelect($sql);
	$trans=array();
	foreach ($result as $key => $value) {
		$data=array(

			"id"=>$value["transaction_id"],
			"purpose"=>$value["transaction_description"],
			"borrow_comment"=>null,
			"return_comment"=>null,
			"member_id"=>$value["member_id"],
			"borrowed_date"=>$value["borrowed_date"],
			"expected_return_date"=>$value["expected_return_date"]
		);

		$t=new Transaction();
		$t->create($data);
		$trans[]=$t;
	}
	return $trans;

}

public function updateComment($comment){

	$sql="UPDATE transaction SET return_comment='$comment' WHERE transaction_id=$this->id;";
	if(DB::getInstance()->directUpdate($sql)){
		return true;
	}else{
		return false;
	}
}

public function updateRemark($remark){
	$sql="UPDATE member SET member_remarks='$remark' WHERE member_id=$this->member_id;";
	if(DB::getInstance()->directUpdate($sql)){
		return true;
	}else{
		return false;
	}

}

public function finishReturn($icid,$con){
	$today=date('Y-m-d');

	$sql1="";
	$sql2="";
	$sql3="";
	$sql4="";
	if($con!="Misplaced"){
		$sql1="UPDATE item_transaction SET status=1 WHERE item_copy_id=$icid AND transaction_id=$this->id;";
		$sql2="UPDATE item_copy SET item_copy_status=1 WHERE item_copy_id=$icid;";
		$sql3="UPDATE item_copy SET item_copy_condition='$con' WHERE item_copy_id=$icid;";
		$sql4="UPDATE item_transaction SET returned_date='$today'  WHERE item_copy_id=$icid AND transaction_id=$this->id;";

	}else{
		$sql1="UPDATE item_transaction SET status=1 WHERE item_copy_id=$icid AND transaction_id=$this->id;";
		$sql2="UPDATE item_copy SET item_copy_status=0 WHERE item_copy_id=$icid;";
		$sql3="UPDATE item_copy SET item_copy_condition='$con' WHERE item_copy_id=$icid;";
		$sql4="UPDATE item_transaction SET returned_date='$today'  WHERE item_copy_id=$icid AND transaction_id=$this->id;";

	}

if(DB::getInstance()->directUpdate($sql1) && DB::getInstance()->directUpdate($sql2) && DB::getInstance()->directUpdate($sql3) && DB::getInstance()->directUpdate($sql4)){
	return true;

}else{
	return false;
}

}


public static function search($tid){

	$items=array();
	$result1=DB::getInstance()->search("transaction",["transaction_id"=>$tid]);
	
	$result2=DB::getInstance()->search("item_transaction",["transaction_id"=>$tid]);
	foreach ($result2 as $key => $value) {
		$data1=array(
			
			"item_copy_id"=>$value["item_copy_id"],
			"transaction_id"=>$value["transaction_id"],
			"borrowed_quantity"=>$value["borrowed_quantity"],
			"returned_date"=>$value["returned_date"],
			"returned_quantity"=>$value["returned_quantity"],
			"status"=>$value["status"]

			);
		$it=new ItemTransaction();
		$it->create($data1);
		$items[]=$it;
	}

	$data2=array(

			"id"=>$result1[0]["transaction_id"],
			"purpose"=>$result1[0]["transaction_description"],
			"borrow_comment"=>$result1[0]["transaction_comment"],
			"return_comment"=>$result1[0]["return_comment"],
			"member_id"=>$result1[0]["member_id"],
			"borrowed_date"=>$result1[0]["borrowed_date"],
			"expected_return_date"=>$result1[0]["expected_return_date"]
		);

		$t=new Transaction();
		$t->create($data2);
		$t->setItems($items);



		return $t;
	
}

public function searchPendingReturns($tid){

	$items=array();
	$result1=DB::getInstance()->search("transaction",["transaction_id"=>$tid]);
	
	$result2=DB::getInstance()->search("item_transaction",["transaction_id"=>$tid,"status"=>0]);
	foreach ($result2 as $key => $value) {
		$data1=array(
			
			"item_copy_id"=>$value["item_copy_id"],
			"transaction_id"=>$value["transaction_id"],
			"borrowed_quantity"=>$value["borrowed_quantity"],
			"returned_date"=>$value["returned_date"],
			"returned_quantity"=>$value["returned_quantity"],
			"status"=>$value["status"]

			);
		$it=new ItemTransaction();
		$it->create($data1);
		$items[]=$it;
	}

	$data2=array(

			"id"=>$result1[0]["transaction_id"],
			"purpose"=>$result1[0]["transaction_description"],
			"borrow_comment"=>$result1[0]["transaction_comment"],
			"return_comment"=>$result1[0]["return_comment"],
			"member_id"=>$result1[0]["member_id"],
			"borrowed_date"=>$result1[0]["borrowed_date"],
			"expected_return_date"=>$result1[0]["expected_return_date"]
		);

		$t=new Transaction();
		$t->create($data2);
		$t->setItems($items);



		return $t;



}



}


?>