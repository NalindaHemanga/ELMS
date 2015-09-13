<?php

class item{

	private $id,
			$no,
			$name,
			$type,
			$technical_details,
			$description,
			$quantity,
			$category,
			$item_copies=array(),
			$reference=array();
			




	public function __construct(){

	}



	public function create($data=array()){

		$this->id 					=	$data["id"];
		$this->no 					=	$data["no"];
		$this->name	 				= 	$data["name"];
		$this->type					=	$data["type"];
		$this->technical_details 	= 	$data["technical_details"];
		$this->description			=   $data["description"];
		$this->quantity 			=	$data["quantity"];
		$this->category				=	$data["category"];
		$this->reference 			=	$data["reference"];
		$this->item_copies 			=	$data["item_copies"];
	
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




	public static function search($values=array()){
     
     
		
		$items=array();
		$result1=DB::getInstance()->search("item",$values);

		if(count($result1)!=0){
			
			for($x=0;$x<count($result1);$x++){


			$ref_result=DB::getInstance()->search("item_reference",array("item_id"=>$result1[$x]["item_id"]));

			$reference=array();
			
			for($a=0;$a<count($ref_result);$a++){

				$reference[$a]=$ref_result[$a]["reference"];



			}

			$cat_result=DB::getInstance()->search("item_category",array("item_id"=>$result1[$x]["item_id"]));
			$categories=array();

			for($a=0;$a<count($cat_result);$a++){

				$categories[$a]=$cat_result[$a]["category_id"];



			}

			$item_copies=ItemCopy::search(["item_id"=>$result1[$x]["item_id"]]);


	
			$item_data=array(

			

				"id" 					=>	$result1[$x]["item_id"],
				"no" 					=>	$result1[$x]["item_no"],
				"name"	 				=> 	$result1[$x]["item_name"],
				"type"					=>	$result1[$x]["item_type"],
				"technical_details" 	=> 	$result1[$x]["item_technical_details"],
				"description"			=>  $result1[$x]["item_description"],
				"quantity" 				=>	$result1[$x]["item_quantity"],
				"category"				=>	$categories,
				"reference" 			=>	$reference,
				"item_copies" 			=>	$item_copies
				
				);

		
			$new_item=new Item();
			$new_item->create($item_data);
			$items[]=$new_item;
			

		}
		if(count($items)==1)
			return $items[0];
		else
			return $items;

		}
		else
			return null;
		

	}


	




}



?>