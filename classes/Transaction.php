<?php


class Transaction{

private $id,
		$purpose,
		$comment,
		$member_id,
		$transactions=array();

public function __construct(){


	}

public function create($data){

	$this->id = $data["id"];
	$this->purpose = $data["purpose"];
	$this->comment=$data["comment"];
	$this->member_id=$data["member_id"];


}

public function add(){

	$row = array(

			"transaction_id"=>$this->id,
			"transaction_description"=>$this->purpose,
			"transaction_comment"=>$this->comment,
			"member_id"=>$this->member_id

		);

	if(DB::getInstance()->insertRow("transaction",$row)){
			return true;
			

	}
	else{
		return false;

	}

}




public static function getHistory($value){

	$sql="SELECT item_name,borrowed_date,returned_date,transaction_comment FROM item,item_transaction,transaction,member,item_copy WHERE member_nic='".$value."' AND member.member_id=transaction.member_id AND item_transaction.transaction_id=transaction.transaction_id AND item.item_id=item_copy.item_id AND item_transaction.item_copy_id=item_copy.item_copy_id";
	return DB::getInstance()->directSelect($sql);


}










}


?>