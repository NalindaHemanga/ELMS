<?php  

require_once 'core/init.php';

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

?>