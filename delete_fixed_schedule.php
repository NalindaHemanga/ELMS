<?php

require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

				
	$sid=$_POST["sid"];
	$schedule=Schedule::search(["schedule_id"=>$sid]);

	$time=$_POST["time"];
	$labtime="";

	$day1=$_POST["day"];
	$subject=$_POST["subject"];

	$res=DB::getInstance()->directSelect("SELECT course_id FROM course WHERE course_name='$subject';");
	if(count($res)>0)
		$cid=$res[0]["course_id"];

	switch($time){
		case "m1":$labtime="8-9";break;
		case "m2":$labtime="9-10";break;
		case "m3":$labtime="10-11";break;
		case "m4":$labtime="11-12";break;
		case "m5":$labtime="12-1";break;
		case "m6":$labtime="1-2";break;
		case "m7":$labtime="2-3";break;
		case "m8":$labtime="3-4";break;
		case "m9":$labtime="4-5";break;

	}


				date_default_timezone_set('UTC');
 				
	
				$date = $schedule->getScheduleStartDate();
	
				$end_date = $schedule->getScheduleEndDate();
 
				while (strtotime($date) <= strtotime($end_date)) {
                	
						$sql="SELECT * FROM lab_slot WHERE schedule_id=$sid AND lab_slot_date='$date' AND lab_slot_time='$labtime';";
						$result=DB::getInstance()->directSelect($sql);

						$day2 = date('l', strtotime($date));
						
						if($day1==$day2){
							DB::getInstance()->delete("lab_slot",["schedule_id" => $sid,"lab_slot_date" =>$date,"lab_slot_time" =>$labtime]);
						
					}
                	
                	$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
				}




?>