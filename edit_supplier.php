<?php
  
    require_once 'core/init.php';
  

    	if(array_key_exists('links', $_POST)){
    		$tel=$_POST['links'];

    	}
    	else
    		$tel=array();
        
       
		
    	$supplier_data = array(

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

   
//print_r($tel);
     $supplier = Supplier::search(array("supplier_id"=>$_POST["supId"]));
     

	
	if($supplier->update($supplier_data)){

		$message = "You have successfully Updated the Supplier !!";
		//$response=array("message" => $message);
		echo $message;
	} 

	else{
		
		
		$message = "The Supplier Registration was unsuccessful.";
		//$response=array("message" => $message);
		echo $message;


	}

        
?>
