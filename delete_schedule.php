<?php 
	require_once 'core/init.php';

	$sid=$_POST["sid"];

	if(DB::getInstance()->delete("schedule",["schedule_id"=>$sid])){
		echo "You have deleted the schedule successfully !!";

	}else{


		echo "Schedule Deletion was unsuccessful !!";
	}
 ?>