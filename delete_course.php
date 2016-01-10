<?php 
	require_once 'core/init.php';

	$cid=$_POST["cid"];

	if(DB::getInstance()->delete("course",["course_id"=>$cid])){
		echo "You have deleted the course successfully !!";

	}else{


		echo "Course Deletion was unsuccessful !!";
	}
 ?>