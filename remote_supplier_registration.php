<?php
  
    require_once 'core/init.php';
  

    	if(array_key_exists('links', $_POST)){
    		$tel=$_POST['links'];

    	}
    	else
    		$tel=array();
        
       
		
    	$supplier_data = array(

		"id" 	 	=> 	null,
		"company" 	 	=> 	$_POST["company"],
		"email" 		=>	$_POST["email"],
		"street"	 	=>	$_POST["street"],
		"line2"			=>	$_POST["line2"],
		"city" 			=> 	$_POST["city"],
		"province" 		=>  $_POST["province"],
		"postal" 		=>	$_POST["postal"],
		"country" 		=>	$_POST["country"],
		"telephone"		=>	$tel

	);

   

     $new_supplier = new Supplier();
     $new_supplier->create($supplier_data);
//print_r($new_supplier);
	
	if($new_supplier->register()){

		$message = "You have successfully Registered the Supplier !!";
		$response=array("message" => $message, "sup_id" => DB::getInstance()->getLastId(),"sup_name" => $supplier_data['company']);
		echo json_encode($response);
	} 

	else{
		
		
		$message = "The Supplier Registration was unsuccessful.";
		$response=array("message" => $message);
		echo json_encode($response);


	}

        
?>
