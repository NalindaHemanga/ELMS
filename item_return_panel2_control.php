<?php

require_once 'core/init.php';

if(count($_POST)>0){

	//print_r($_POST);
	//print_r($_POST["condition"]);
	//print_r($_POST["returned"]);

	$tid=$_POST["tid"];

	$tran=Transaction::search($tid);
	$tran->updateComment($_POST["comment"]);
	$tran->updateRemark($_POST["remark"]);

	$condition=$_POST["condition"];
	$returned=$_POST["returned"];
	$i=0;
	for($i=1;$i<count($returned);$i++) {
		
		

			if($tran->finishReturn($returned[$i],$condition[$i])){
				echo "ok";
			}
			else{
				echo "NOt";
			}



		
	
	}


}




?>