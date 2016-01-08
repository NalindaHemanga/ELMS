<?php

class ItemTransaction{

	private $item_copy_id,
			$transaction_id,
			$borrowed_quantity,
			$returned_quantity,
			$status;

	public function __construct(){

	}

public function getItemCopyId(){
	return $this->item_copy_id;
}	

public function getTransactionId(){
	return $this->transaction_id;
}



public function getBorrowedQuantity(){
	return $this->borrowed_quantity;
}

public function getReturnedQuantity(){
	return $this->returned_quantity;
}

public function getStatus(){
	return $this->status;
}






	public function create($data){ // acts as the parameterized constructor

			$this->item_copy_id=$data["item_copy_id"];
			$this->transaction_id=$data["transaction_id"];
			$this->borrowed_quantity=$data["borrowed_quantity"];
			$this->returned_date=$data["returned_date"];
			$this->returned_quantity=$data["returned_quantity"];
			$this->status=$data["status"];

	}


	public function add(){ // add new transaction to the database


		$row=array(


			"item_copy_id"=>$this->item_copy_id,
			"transaction_id"=>$this->transaction_id,
			"borrowed_quantity"=>$this->borrowed_quantity,
			"returned_date"=>$this->returned_date,
			"returned_quantity"=>$this->returned_quantity,
			"status"=>$this->status


			);


		if(DB::getInstance()->insertRow("item_transaction",$row)){
			return true;
		}
		else{
			return false;
		}

	}






}






 ?>