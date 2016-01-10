<?php

    require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role) || in_array("Related Lecturer", $member_role)){

	}else{
		header('location:restricted_page.php');
	}


    if(count($_POST) > 0) {
//print_r($_POST);
	if (isset($_POST["reference"])){
   	$item_data = array(

		"id"					=> 	null,
		"no" 					=>	$_POST['categoryNo'],
		"name"	 				=> 	$_POST["item_name"],
		"type"					=>	$_POST["item_type"],
		"technical_details" 	=> 	$_POST["item_tec_desc"],
		"description"			=>  $_POST["item_desc"],
		"quantity" 				=>	0,
		"reference" 			=>	$_POST["reference"],
		"category"				=>  $_POST['categoryId'],
		"item_copies"			=>	null

	);}
	else{
	   	$item_data = array(

		"id"					=> 	null,
		"no" 					=>	$_POST['categoryNo'],
		"name"	 				=> 	$_POST["item_name"],
		"type"					=>	$_POST["item_type"],
		"technical_details" 	=> 	$_POST["item_tec_desc"],
		"description"			=>  $_POST["item_desc"],
		"quantity" 				=>	0,
		"reference" 			=>	null,
		"category"				=>  $_POST['categoryId'],
		"item_copies"			=>	null

	);

	}
	

    	$temp_path=$_FILES["item_picture"]["tmp_name"];
    	$img_type = pathinfo($_FILES["item_picture"]["name"],PATHINFO_EXTENSION);
    	move_uploaded_file($temp_path, "img/items/" . $_POST["item_name"]."."."png");




        //$_SESSION['form_data'] = $item_data;
        $_SESSION['form_data'] = $item_data;

        //header("Location: item_add.php",true,303);
        //die();
    





     $new_item = new Item();
     $new_item->createNew($_SESSION["form_data"]);
	
	if($new_item->register()){

		$message = "You have successfully Inserted an Item !!";
		echo $message;
	}

	else{


		$message = "The Item insertion was unsuccessful.";
		echo $message;


	}



        unset($_SESSION["form_data"]);

    }

?>
