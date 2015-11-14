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

public function getExpectedReturnDate(){
	return $this->expected_return_date;
}

public function getTransactionItems(){
	return $this->transactions;
}


public static function getHistory($value){

	$sql="SELECT item_copy_no,item_name,it.borrowed_date,returned_date,transaction_comment FROM item,item_transaction it,transaction,member,item_copy WHERE member_nic='".$value."' AND member.member_id=transaction.member_id AND it.transaction_id=transaction.transaction_id AND item.item_id=item_copy.item_id AND it.item_copy_id=item_copy.item_copy_id ORDER BY borrowed_date DESC;";
	return DB::getInstance()->directSelect($sql);


}

public static function getPendingReturns(){

	$sql="SELECT t.transaction_id,transaction_description,t.borrowed_date,t.expected_return_date,member_id FROM transaction t,item_transaction it WHERE t.transaction_id=it.transaction_id AND status=0;";
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










}


?>