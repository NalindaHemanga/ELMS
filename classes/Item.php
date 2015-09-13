<?php

class item{

	private $no,
			$name,
			$type,
			$technical_details,
			$description,
			$quantity,
			$category,
			$reference=array();
			




	public function __construct(){

	}



	public function create($data=array()){

		
		$this->no 					=	$data["no"];
		$this->name	 				= 	$data["name"];
		$this->type					=	$data["type"];
		$this->technical_details 	= 	$data["technical_details"];
		$this->description			=   $data["description"];
		$this->quantity 			=	$data["quantity"];
		$this->category				=	$data["category"];
		$this->reference 			=	$data["reference"];
	
	}

	public function register(){

		$row=array(

				
				"item_name" => $this->name,
				"item_technical_details" => $this->technical_details,
				"item_description" => $this->description,
				"item_type" => $this->type,
				"item_quantity" => $this->quantity,
				"item_no" => $this->no
				



			);


		if(DB::getInstance()->insertRow("item",$row)){
			$last_id=DB::getInstance()->getLastId();
			if(count($this->reference)>0){
			
			foreach ($this->reference as $key => $value) {
				$row2=array(
					"item_id" 		=> $last_id,
					"reference"		=> $value


					);

				DB::getInstance()->insertRow("item_reference",$row2);
				

			}



			}

			DB::getInstance()->insertRow("item_category",array("item_id"=>$last_id,"category_id"=>$this->category));
			return true;

		}
		else
			return false;
	}

	




}



?>