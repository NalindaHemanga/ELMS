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


	public function createNew($data=array()){

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

	$category = Category::search(array("category_id"=>$data["category"]));
	$itemList = $category->get_items();

	if (!empty($itemList[strtoupper(substr($data["name"],0,1))])){
		array_push($itemList[strtoupper(substr($data["name"],0,1))],$this);
	}
	else{
		$itemList[strtoupper(substr($data["name"],0,1))][1] = $this;
	}
	end($itemList[strtoupper(substr($data["name"],0,1))]);
	$last_id=key($itemList[strtoupper(substr($data["name"],0,1))]);
	$newItemLabel = strtoupper(substr($data["name"],0,1)).(string)$last_id;
	$this->no = $newItemLabel;

	}

	public function count_up($x){

		$row = DB::getInstance()->search("item",array("item_id"=>$this->id));
		$iid = $this->id;
		$newQuantity = $row[0]["item_quantity"]+$x;
		$sql = "UPDATE `item` SET `item_quantity` = '$newQuantity' WHERE `item`.`item_id` =$iid;";
		DB::getInstance()->directUpdate($sql);		

	}

	public function get_category(){

		return $this->category;

	}



	public function get_no(){

		return $this->no;

	}

	public function get_description(){

		return $this->description;

	}

	public function get_reference(){

		return $this->reference;

	}
	public function get_technical_details(){

		return $this->technical_details;

	}

	public function get_id(){

		return $this->id;

	}

	public function get_name(){

		return $this->name;

	}

	public function get_copies(){

		return $this->item_copies;

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
			$item_copies_orderd = array();
			if(is_array($item_copies)){

			foreach($item_copies as $itemCopy){
				$item_copies_orderd[substr($itemCopy->get_no(), strpos($itemCopy->get_no(), "_") + 1)] = $itemCopy;
			}
			}
			else if(is_object($item_copies)){
				$item_copies_orderd[substr($item_copies->get_no(), strpos($item_copies->get_no(), "_") + 1)] = $item_copies;
			}

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
				"item_copies" 			=>	$item_copies_orderd

				);


			$new_item=new Item();

			$new_item->create($item_data);
			$items[]=$new_item;


		}
		if(count($items)==1){

			return $items[0];
		}
		else{
			return $items;
		}
		}
		else{
			return null;


	}

}

	public function delete(){

		if( empty( $this->item_copies ) )
		{
			DB::getInstance()->delete("item_reference",array("item_id"=>$this->id));
			DB::getInstance()->delete("item_category",array("item_id"=>$this->id));
			DB::getInstance()->delete("item",array("item_id"=>$this->id));
			return 1;
		}
		else{return 0;}

	}


}


?>
