
<?php
class Supplier{

	private $company;
	private $email;
	private $street;
	private $line2;
	private $city;
	private $province;
	private $postal;
	private $country;
	private $telephone=array();


	public function __construct(){

	}

	public function create($data=array()){

		$this->id 	 	= 	$data["id"];
		$this->company 	 	= 	$data["company"];
		$this->email 		=	$data["email"];
		$this->street	 	= 	$data["street"];
		$this->line2		=	$data["line2"];
		$this->city 		= 	$data["city"];
		$this->province 	=   $data["province"];
		$this->postal 		=	$data["postal"];
		$this->country 		=	$data["country"];
		$this->telephone	=	$data["telephone"];



	}

	public function create1($data=array()){

		$this->id 	 	= 	$data["supplier_id"];
		$this->company 	 	= 	$data["supplier_name"];
		$this->email 		=	$data["supplier_email"];
		$this->street	 	= 	$data["supplier_address_line1"];
		$this->line2		=	$data["supplier_address_line2"];
		$this->city 		= 	$data["supplier_city"];
		$this->province 	=   $data["supplier_province"];
		$this->postal 		=	$data["supplier_postal"];
		$this->country 		=	$data["supplier_country"];
		//$this->telephone	=	$data["telephone"];
		if(isset($data["telephone"])){
			$this->telephone	=	$data["telephone"];
		}else{
			$this->telephone	=	false;
		}


	}

	public function getId(){

		return $this->id;


	}

	public function getCompany(){

		return $this->company;


	}

	public function getEmail(){

		return $this->email;


	}

	public function getStreet(){

		return $this->street;


	}

	public function getLine2(){

		return $this->line2;


	}

	public function getCity(){

		return $this->city;


	}

	public function getProvince(){

		return $this->province;


	}

	public function getPostal(){

		return $this->postal;


	}

	public function getCountry(){

		return $this->country;


	}

	public function getTelephone(){

		return $this->telephone;//has some issues. no column in db table as telephone.


	}

/*this function use to register supplier affter calling this function all the data go to the database*/

	public function register(){

		$row = array(

			"supplier_name" => $this->company,
			"supplier_email" => $this->email,
			"supplier_address_line1" => $this->street,
			"supplier_address_line2" => $this->line2,
			"supplier_city" => $this->city,
			"supplier_province" => $this->province,
			"supplier_postal" => $this->postal,
			"supplier_country" => $this->country
		);


		if(DB::getInstance()->insertRow("supplier",$row)){

			if(count($this->telephone)>0){
				$last_id=DB::getInstance()->getLastId();
				foreach ($this->telephone as $key => $value) {
					$row2=array(
						"supplier_id" => $last_id,
						"telephone"		=> $value


						);

					DB::getInstance()->insertRow("supplier_telephone",$row2);

				}
			}
			return true;
		}
		else
			return false;



	}

/*this is use get all supplier details fro database*/

	public static function getAllSuppliers(){

		$result=DB::getInstance()->directSelect("Select * FROM supplier ORDER BY supplier_name");
		return $result;


	}

/*this function give all details but it get details from two tables*/
	public static function getDetails(){

			$result=DB::getInstance()->directSelect("SELECT * FROM supplier ORDER BY supplier_name;");
			$result_tp=DB::getInstance()->directSelect("SELECT * FROM supplier_telephone ORDER BY supplier_id;");
			$allSupplier = array();

			foreach ($result as $key => $row) {
				//print_r($row);
				foreach ($result_tp as $key2 => $row2) { 
					if($row["supplier_id"]==$row2["supplier_id"]){
						$row["telephone"][]=$row2["telephone"];
					}  
				}
				//print_r($row);
				$supplierObj = new Supplier();
				$supplierObj->create1($row);
				//print_r($supplierObj);
				$allSupplier[]=$supplierObj;

			}

			return $allSupplier;
		}


	public static function search($values=array()){

		

		$result1=DB::getInstance()->search("supplier",$values);

		if(count($result1)!=0){
			$result2=DB::getInstance()->search("supplier_telephone",array("supplier_id"=>$result1[0]["supplier_id"]));

			$supplier_telephone=array();
			for($x=0;$x<count($result2);$x++){

				$supplier_telephone[$x]=$result2[$x]["telephone"];



			}
			
		
			$supplier_data=array(
				"id"=>$result1[0]["supplier_id"],
				"company"=>$result1[0]["supplier_name"],
				"email" => $result1[0]["supplier_email"],
				"street" => $result1[0]["supplier_address_line1"],
				"line2" => $result1[0]["supplier_address_line2"],
				"city" => $result1[0]["supplier_city"],
				"province" => $result1[0]["supplier_province"],
				"postal" => $result1[0]["supplier_postal"],
				"country" => $result1[0]["supplier_country"],
				"telephone" => $supplier_telephone
				);

		
			$new_supplier=new Supplier();
			$new_supplier->create($supplier_data);
			return $new_supplier;
		}
		else
			return null;
		

	}

/*this is use to update supplier table*/

	public function update($values=array()){
//print_r($values);
		$supId = $this->id;
//echo $supId;
		foreach ($values as $key => $value){
			$column;
			switch($key){

				case "company":$column="supplier_name";break;
				case "email":$column="supplier_email";break;
				case "street":$column="supplier_address_line1";break;
				case "line2":$column="supplier_address_line2";break;
				case "city":$column="supplier_city";break;
				case "province":$column="supplier_province";break;
				case "postal":$column="supplier_postal";break;
				case "country":$column="supplier_country";break;

			}
			if($key=="telephone"){
				$sql2 = "DELETE FROM `supplier_telephone` WHERE `supplier_telephone`.`supplier_id` = $supId;";
				DB::getInstance()->directUpdate($sql2);
				foreach ($value as $key2 => $value2){
					$sql3 = "INSERT INTO `supplier_telephone` (`supplier_id` ,`telephone`)VALUES ('$supId', '$value2');";
					DB::getInstance()->directUpdate($sql3);
				}
			}
			elseif($this->$key != $value){
			$sql = "UPDATE  `supplier` SET  `$column` =  '$value' WHERE  `supplier`.`supplier_id` =$supId;";
			DB::getInstance()->directUpdate($sql);
			}else{}
		}
		return true;

	}


}







?>
