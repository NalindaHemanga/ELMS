<?php
class ItemCopy{

	private $no,
			$owner,
			$status,
			$barcode,
			$price,
			$installed_date,
			$condition,
			$supplier,
			$item_id;





	public function __construct(){

	}



	public function create($data=array()){

		
		$this->no 				=	$data["no"];
		$this->owner	 		= 	$data["owner"];
		$this->status			=	$data["status"];
		$this->barcode 			= 	$data["barcode"];
		$this->price 			=   $data["price"];
		$this->installed_date 	=	$data["installed_date"];
		$this->condition 		=	$data["condition"];
		$this->supplier			=	$data["supplier"];
		$this->item_id			= 	$data["item_id"];
	}

	public function register(){

		$row=array(

				"item_copy_id" => $this->id,
				"item_copy_owner" => $this->owner,
				"item_copy_status" => $this->status,
				"item_copy_barcode" => $this->barcode,
				"item_copy_unit_price" => $this->price,
				"item_copy_installed_date" => $this->installed_date,
				"item_copy_condition" => $this->condition,
				"supplier_id" => $this->supplier,
				"item_copy_no" => $this->no,
				"item_id" => $this->item_id




			);


		if(DB::getInstance()->insertRaw("item_copy",$raw))
			return true;
		else
			return false;

	}










}


?>