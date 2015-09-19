<?php
class ItemCopy{

	private $id,
			$no,
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

	public function createNew($data=array()){

		$this->id 				= 	$data["id"];
		$this->no 				=	$data["no"];
		$this->owner	 		= 	$data["owner"];
		$this->status			=	$data["status"];
		$this->barcode 			= 	$data["barcode"];
		$this->price 			=   $data["price"];
		$this->installed_date 	=	$data["installed_date"];
		$this->condition 		=	$data["condition"];
		$this->supplier			=	$data["supplier"];
		$this->item_id			= 	$data["item_id"];

	$parentItem = Item::search(array("item_id"=>$data["item_id"]));

	$itemCopyList = $parentItem->get_copies();

	if (!empty($itemCopyList)){
		array_push($itemCopyList,$this);
	}
	else{
		$itemCopyList[1] = $this;
	}
	end($itemCopyList);
	$last_id=key($itemCopyList);
	$newItemCopyNo = $last_id;
	$this->no = $newItemCopyNo;

	}



	public function create($data=array()){

		$this->id 				= 	$data["id"];
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


		if(DB::getInstance()->insertRow("item_copy",$row))
			return true;
		else
			return false;

	}

	public function get_no(){
		
		return $this->no;
		
	}

	public function get_id(){
		
		return $this->id;
		
	}


	public static function search($values=array()){
     
      /* This function returns an array of item copy objects if the results have many item copies,
      		else returns a single object.

      */
		
		$item_copies=array();
		$result1=DB::getInstance()->search("item_copy",$values);

		if(count($result1)!=0){
			
			for($x=0;$x<count($result1);$x++){
	
			$item_copy_data=array(

				"owner"=>$result1[$x]["item_copy_owner"],
				"status" => $result1[$x]["item_copy_status"],
				"barcode" => $result1[$x]["item_copy_barcode"],
				"price" => $result1[$x]["item_copy_unit_price"],
				"installed_date" => $result1[$x]["item_copy_installed_date"],
				"condition" => $result1[$x]["item_copy_condition"],
				"no" => $result1[$x]["item_copy_no"],
				"item_id" => $result1[$x]["item_id"],
				"supplier" => $result1[$x]["supplier_id"],
				"id" => $result1[$x]["item_copy_id"]
				);

		
			$new_item_copy=new ItemCopy();
			$new_item_copy->create($item_copy_data);
			$item_copies[]=$new_item_copy;
			

		}
		if(count($item_copies)==1)
			return $item_copies[0];
		else
			return $item_copies;

		}
		else
			return null;
		

	}

	

}

?>
