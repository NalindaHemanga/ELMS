<?php
class Member {

	private $nic_no;
	private $initials;
	private $surname;
	private $email;
	private $password;
	private $type=array();
	private $validity;
	private $remarks;



	

	public function __construct(){

	}

	public function create($data=array()){

		$this->nic_no 	 	= 	$data["nic_no"];
		$this->initials 	=	$data["initials"];
		$this->surname	 	= 	$data["surname"];
		$this->email 		=	$data["email"];
		$this->password 	= 	$data["password"];
		$this->type 		=   $data["type"];
		$this->validity 	=	$data["validity"];
		$this->remarks 		=	$data["remarks"];

	}

	public function getInitials(){

		return $this->initials;


	}
	public function getSurname(){

		return $this->surname;


	}

		

	public function getPassword(){

		return $this->password;


	}

	public function getEmail(){

		return $this->email;


	}

	public function getNicNo(){

		return $this->nic_no;


	}


	public function register(){

		$row = array(

				"member_nic" => $this->nic_no,
				"member_initials" => $this->initials,
				"member_surname" => $this->surname,
				"member_password" => $this->password,
				"member_email" => $this->email,
				"member_validity" => $this->validity,
				"member_remarks" => $this->remarks

			);

		
		

		if(DB::getInstance()->insertRow("member",$row)){
			$last_id=DB::getInstance()->getLastId();
			foreach ($this->type as $key => $value) {
				$row2=array(
					"member_id" => $last_id,
					"role"		=> $value


					);

				DB::getInstance()->insertRow("member_role",$row2);
			}
			return true;
		}
		else
			return false;

		

	}


	public static function search($values=array()){

		

		$result1=DB::getInstance()->search("member",$values);

		if(count($result1)!=0){
			$result2=DB::getInstance()->search("member_role",array("member_id"=>$result1[0]["member_id"]));

			$mem_type=array();
			for($x=0;$x<count($result2);$x++){

				$mem_type[$x]=$result2[$x]["role"];



			}
			
		
			$member_data=array(

				"nic_no"=>$result1[0]["member_nic"],
				"initials" => $result1[0]["member_initials"],
				"surname" => $result1[0]["member_surname"],
				"email" => $result1[0]["member_email"],
				"password" => $result1[0]["member_password"],
				"type" => $mem_type,
				"validity" => $result1[0]["member_validity"],
				"remarks" => $result1[0]["member_remarks"]
				);

		
			$new_member=new Member();
			$new_member->create($member_data);
			return $new_member;
		}
		else
			return null;
		

	}

	public static function login($username,$password){

		$member=Member::search(array("member_email"=>$username));

		if($member!=null){
		if(password_verify($password,$member->getPassword())){
			return true;
		}else{


		return false;
		}

	}
	else
		return false;



	}

 







}




?>