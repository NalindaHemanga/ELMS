<?php 
require_once 'core/init.php';
if(isset($_POST["submit"])){
	



	$member_data = array(

	"nic_no"	=>	$_POST["nic_no"],
	"initials"	=>	$_POST["initials"],
	"surname"	=>	$_POST["surname"],
	"email"		=>	$_POST["email"],
	"password"	=>	crypt($_POST["password"]),
	"pro_pic"	=>	$_FILES["picture"]["tmp_name"],
	"type"		=>	$_POST["m_type"],
	"validity"	=>  $_POST["period"]

	);

	



	$new_member = new Member($member_data);
	
	if($new_member->register()){

		$message = "You have successfully Registered the Member !!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	} 

	else{

		$message = "The Member Registration was unsuccessful.";
		echo "<script type='text/javascript'>alert('$message');</script>";	


	}




header("Location: member_registration.php",true,303);

}







?>



