<?php

class ItemTransaction{

	private $item_copy_id,
			$transaction_id,
			$borrowed_date,
			$borrowed_quantity,
			$expected_return_date,
			$returned_date,
			$returned_quantity,
			$status;

	public function __construct(){

	}

	public function create($data){

			$this->item_copy_id=$data["item_copy_id"];
			$this->transaction_id=$data["transaction_id"];
			$this->borrowed_date=$data["borrowed_date"];
			$this->borrowed_quantity=$data["borrowed_quantity"];
			$this->expected_return_date=$data["expected_return_date"];
			$this->returned_date=$data["returned_date"];
			$this->returned_quantity=$data["returned_quantity"];
			$this->status=$data["status"];

	}


	public function add(){


		$row=array(


			"item_copy_id"=>$this->item_copy_id,
			"transaction_id"=>$this->transaction_id,
			"borrowed_date"=>$this->borrowed_date,
			"borrowed_quantity"=>$this->borrowed_quantity,
			"expected_return_date"=>$this->expected_return_date,
			"returned_date"=>$this->returned_date,
			"returned_quantity"=>$this->returned_quantity,
			"status"=>$this->status


			);

		if(DB::getInstance()->insertRow("item_tansaction",$row))
			return true;
		else
			return false;

	}






}






 ?>