
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

		return $this->telephone[0];


	}

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

	public static function getAllSuppliers(){

		$result=DB::getInstance()->directSelect("Select * FROM supplier ORDER BY supplier_name");
		return $result;


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

				"company"=>$result1[0]["supplier_name"],
				"email" => $result1[0]["supplier_email"],
				"street" => $result1[0]["supplier_address_line1"],
				"lane2" => $result1[0]["supplier_address_line2"],
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









}







?>
