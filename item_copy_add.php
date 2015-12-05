<?php

    require_once 'core/init.php';
    if(count($_POST) > 0) {



    	$item_copy_data = array(

		"id"				=>	null,
		"no" 				=>	null,
		"owner"	 			=> 	$_POST["copy_owner"],
		"status"			=>	1,
		"barcode" 			=> 	$_POST["barcode"],
		"price" 			=>   $_POST["price"],
		"installed_date" 	=>	date('Y-m-d'),
		"condition"			=>	"Working Properly",
		"supplier"			=>	$_POST["supplier"],
		"item_id"			=> 	$_POST['itemId']

	);









        $_SESSION['form_data'] = $item_copy_data;



     $new_item_copy = new ItemCopy();
     $new_item_copy->createNew($_SESSION["form_data"]);

	if($new_item_copy->register()){

		$parentItem = item::search(array("item_id"=>$_POST['itemId']));
		$parentItem->count_up(1);
		$message = "You have successfully Inserted an Item Copy!!";
		echo $message;
	}

	else{


		$message = "The Item Copy insertion was unsuccessful.";
		echo $message;


	}



        unset($_SESSION["form_data"]);

    }

?>








