

<?php

    require_once 'core/init.php';


    if(count($_POST) > 0) {

    	$salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';    //Salt is for encrypting the password.
        $enc_pass  = md5($salt.$_POST["password"]);    //Encrypted password is easy to decrypt if salt is not used when encryption is done

        if($_POST["period"] != "NULL") {              //Validity of the member 
			$validity	= date_format(date_add(DateTime::createFromFormat('Y-m-d', date("Y-m-d")),date_interval_create_from_date_string($_POST["period"])),"Y-m-d");
		}
		else{
			$validity = null;
		}
    	$member_data = array(

    		"id" 	 	=>  null,
			"nic_no"	=>	$_POST["nic_no"],
			"initials"	=>	$_POST["initials"],
			"surname"	=>	$_POST["surname"],
			"email"		=>	$_POST["email"],
			"password"	=>	$enc_pass,
			"type"		=>	$_POST["m_type"],
			"validity"	=>  $validity,
			"remarks"	=>	'Borrow Allowed'

	);
    	$temp_path=$_FILES["picture"]["tmp_name"];                            //Rename profile picture's name into NIC and move it into img folder
    	$img_type = pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION);


    	move_uploaded_file($temp_path, "img/profile_pictures/" . $_POST["nic_no"].".".$img_type);



        $_SESSION['form_data'] = $member_data;


     $new_member = new Member();                      //Creates a new Member
     $new_member->create($_SESSION["form_data"]);

	if($new_member->register()){

		$message = "You have successfully Registered the Member !!";
		echo $message;
	}

	else{
		$file_name=$new_member->getNicNo().".jpg";

		$message = "The Member Registration was unsuccessful.";
		echo $message;


	}



        unset($_SESSION["form_data"]);

    }
?>


