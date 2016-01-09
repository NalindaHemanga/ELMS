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
				echo "<div style='text-align:center';>";
		
				echo "<img src='img/icons/success-icon.png' hight='200' width='200'>";
				echo "<h2>Item Return Successful !</h2>";
				echo "<a href='item_return_panel1.php'><h4>Back to Item Returns</h4></a>";
				echo "</div>";

			}
			else{
				echo "<div style='text-align:center';>";
				echo "<img src='img/icons/error-icon.png' hight='200' width='200'>";
				echo "<h2>Item Return Unsuccesssul !</h2>";
				echo "<a href='item_return_panel1.php'><h4>Back to Item Returns</h4></a>";
				echo "</div>";
			}



		
	
	}


}




?>