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
	$parentCategoryNo = $parentItem->get_category()[0];
	$parentCategory = Category::search(array("category_id"=>$parentCategoryNo));
	$itemCopyList = $parentItem->get_copies();

	if (!empty($itemCopyList)){
		array_push($itemCopyList,$this);
	}
	else{
		$itemCopyList[1] = $this;
	}
	end($itemCopyList);
	$last_id=key($itemCopyList);

	$no1=(string)$parentCategory->get_label();
	$no2=(string)$parentItem->get_no();
	$no3=(string)$last_id;
	$this->no = $no1.$no2."_".$no3;


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

	public function get_item_name(){

		$sql="SELECT item_name FROM item,item_copy WHERE item_copy_id=".$this->id." AND item.item_id=item_copy.item_id;";
		$result=DB::getInstance()->directSelect($sql);
		return $result[0]["item_name"];
	}

	public function get_no(){

		return $this->no;

	}

	public function get_id(){

		return $this->id;

	}

	public function get_status(){

		return $this->status;

	}

	public function get_condition(){

		return $this->condition;

	}

	public function get_owner(){

		return $this->owner;

	}

	public function get_barcode(){

		return $this->barcode;

	}

	public function get_price(){

		return $this->price;

	}

	public function get_installed_date(){

		return $this->installed_date;

	}

	public function get_supplier(){

		return $this->supplier;

	}
	

	public function update_item_copy_no($new_num){

		if($this->no==$new_num){return true;}
		
		else{
		$parent_item_id = $this->item_id;
		$item_copy_id = $this->id;
		$parent_item = Item::search(array("item_id"=>$parent_item_id));
		$copies = $parent_item->get_copies();
		foreach($copies as $itemCopy){
			
			if($itemCopy->get_no()==$new_num){return false;}
			
			}
			
		$sql = "UPDATE  `item_copy` SET  `item_copy_no` =  '$new_num' WHERE  `item_copy`.`item_copy_id` =$item_copy_id;";
		DB::getInstance()->directUpdate($sql);	
		echo $sql;	
		return true;
		}

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

	public function delete(){

		if (DB::getInstance()->delete("item_copy",array("item_copy_id"=>$this->id))){
		return true;
		}
		return false;

	}



}

?>
