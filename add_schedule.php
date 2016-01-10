<?php  

require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

$start_date = $_POST["sem_start_date"];
$end_date = $_POST["sem_end_date"];

if(strtotime($start_date)<strtotime($end_date)){

	$data=array(

		"schedule_id"=>null,
		"semester_no"=>$_POST["semester"],
		"academic_year"=>$_POST["academic_year"],
		"schedule_start_date"=>$_POST["sem_start_date"],
		"schedule_end_date"=>$_POST["sem_end_date"]


		);
	$newSchedule=new Schedule();
	$newSchedule->create($data);
		if($newSchedule->add()){

			echo "You have successfully added a schedule !";


		}
		else{

			echo "Schedule creation was unsuccessful !";


		}

}
else{

	echo "Schedule start date must be less than schedule end date !!";

}

?>