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

		"item_id"						=> 	$_POST["item_id"],
		"item_name"	 				=> 	$_POST["item_name"],
		"item_type"					=>	$_POST["item_type"],
		"item_technical_details" 	=> 	$_POST["item_tec_desc"],
		"item_description"			=>  $_POST["item_desc"],
		//"reference" 			=>	$_POST["reference"]

	);}
	else{
	   	$item_data = array(

		"item_id"						=> 	$_POST["item_id"],
		"item_name"	 				=> 	$_POST["item_name"],
		"item_type"					=>	$_POST["item_type"],
		"item_technical_details" 	=> 	$_POST["item_tec_desc"],
		"item_description"			=>  $_POST["item_desc"],
		//"reference" 			=>	null

	);

	}
	//echo $_POST["itemTechDetEdit"];

    	$temp_path=$_FILES["item_picture"]["tmp_name"];
    	$img_type = pathinfo($_FILES["item_picture"]["name"],PATHINFO_EXTENSION);
    	move_uploaded_file($temp_path, "img/items/" . $_POST["item_name"]."."."png");




        //$_SESSION['form_data'] = $item_data;
        $_SESSION['form_data'] = $item_data;

        //header("Location: item_add.php",true,303);
        //die();
    



//print_r($item_data);

     $item_to_edit = Item::search(array("item_id"=>$_POST["item_id"]));
	
	if($item_to_edit->editItem($_SESSION['form_data'])){

		$message = "You have successfully updated the item !!";
		echo $message;
	}

	else{


		$message = "The Item update was unsuccessful.";
		echo $message;


	}



        unset($_SESSION["form_data"]);

    }

?>
