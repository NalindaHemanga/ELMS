<?php
class Category {
	
	private $_categoryID,
			$_name,
			$_parent;
	
	public function add(){
		
		DB::getInstance()->direct_insert('INSERT INTO category(name,parent) values("' . $this->_name . '",' . $this->_parent . ')');
		
		
		
		
		
		
		
	} 
	
	public function set_name($name_param){
		
		$this->_name=$name_param;
		
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


	public static function getAllCategories(){
		$cat_names=array();
		$result=DB::getInstance()->directSelect("Select * FROM category ORDER BY category_name");
		return $result;
	}
}

?>