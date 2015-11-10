<?php
class Category {
	
	private $_categoryID,
			$_name,
			$_parent,$_items = array(array()),$_label;
	private static $catList = null;
	
	public function add(){
		
		DB::getInstance()->direct_insert('INSERT INTO category(name,parent) values("' . $this->_name . '",' . $this->_parent . ')');
				
	} 
	

	public static function getCatList() {
		if(!isset(self::$catList)){
			self::$catList = Category::genarateCatList();
		}
		return self::$catList;
	}
	
	public static function genarateCatList(){
		
		$result=DB::getInstance()->directSelect("SELECT * FROM category;");

		$categoryStruct = array(array());
		foreach ($result as $key => $row) {
		$catagory = new Category;
		$catagory->set_id($row['category_id']);
		$catagory->set_label($row['category_no']);
		$catagory->set_name($row['category_name']);
		//$catagories[] = $catagory;
		$mainCat1 = substr($row['category_no'],0,1);
		$mainCat2 = substr($row['category_no'],1,1);
		$subCat1 = substr($row['category_no'],2,1) ;
		$subCat2 = substr($row['category_no'],3,1);
		//echo"$mainCat1 $mainCat2 $subCat1 $subCat2 # ";
		if (((int)$subCat1)==0 && ((int)$subCat2)==0)
		{	
			//echo"$mainCat1 $mainCat2 $subCat1 $subCat2";
			$categoryStruct[$mainCat1][(int)$mainCat2] = $catagory;
		}
		}
	return $categoryStruct;
	}

	public function createCat($data=array()){
	
	$this->_name = $data["category_name"];
	if (isset($data["category_id"])){$this->_categoryID = $data["category_id"];}
	$categoryStruct = Category::genarateCatList();
	$new_cat_name = $this->_name;

	if (!empty($categoryStruct[strtoupper(substr($new_cat_name,0,1))])){
		array_push($categoryStruct[strtoupper(substr($new_cat_name,0,1))],$newCategory);
	}
	else{
		$categoryStruct[strtoupper(substr($new_cat_name,0,1))][1] = $newCategory;
	}
	end($categoryStruct[strtoupper(substr($new_cat_name,0,1))]);
	$last_id=key($categoryStruct[strtoupper(substr($new_cat_name,0,1))]);
	$newCategoryLabel = strtoupper(substr($new_cat_name,0,1)).(string)$last_id;
	$this->_label = $newCategoryLabel;
	
	}

	public function registerCat(){
	
	if(DB::getInstance()->insertRow("category",array("category_name"=>$this->_name,"category_no"=>$this->_label))){
		return True;
	}else{
		return False;
	}
	}

	public function deleteCat(){
	
	DB::getInstance()->delete("Category",array("category_id"=>$this->_categoryID));
	}
	
	public function set_name($name_param){
		
		$this->_name=$name_param;
		
	}
	
	public function set_label($label_param){
		
		$this->_label=$label_param;
		
	}


	public function get_label(){
		
		return $this->_label;
		
	}
		

	public function set_parent($parent_param){
		
		$this->_parent=$parent_param;
	}
	
	public function set_id($id_param){
		
		$this->_categoryID=$id_param;
	}
	
	public function get_name(){
		
		return $this->_name;
		
	}

	public function get_parent(){
		
		return $this->_parent;
		
	}
	
	public function get_id(){
		
		return $this->_categoryID;
		
	}

	public function addItem($obj){

		$item_no = substr($obj->get_no(),0,1);
		$item_no2 = (int)substr($obj->get_no(),1,1);
		$this->_items["$item_no"][$item_no2] = $obj;
		
	}

	public function get_items(){
		
		return $this->_items;
		
	}

	public static function search($values=array()){


		$result1=DB::getInstance()->search("category",$values);
		if(count($result1)!=0){
			
			
		
			$category_data=array(

				"cat_name"=>$result1[0]["category_name"],
				"cat_label" => $result1[0]["category_no"]
				);
			$new_category=new Category();
			$new_category->set_name($result1[0]["category_name"]);
			$new_category->set_label($result1[0]["category_no"]);

			$itemList = DB::getInstance()->search("item_category",array("category_id"=>$result1[0]["category_id"]));


			foreach ($itemList as $item){
			$new_category->addItem(Item::search(array("item_id"=>$item["item_id"])));
			}
		
			return $new_category;
			
		}
		else
			return null;
		

	}

}

?>
