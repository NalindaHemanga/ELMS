<?php

class LabSlot{

	private $lab_slot_id,
			$lab_slot_time,
			$lab_slot_date,
			$status,
			$course_id,
			$schedule_id;

	public function create($data){

		$this->lab_slot_id=$data["lab_slot_id"];
		$this->lab_slot_time=$data["lab_slot_time"];		
		$this->lab_slot_date=$data["lab_slot_date"];
		$this->status=$data["status"];
		$this->schedule_id=$data["schedule_id"];
		$this->course_id=$data["course_id"];


	}


	public function add(){

		$data=array(

			"lab_slot_id"=>$this->lab_slot_id,
			"lab_slot_time"=>$this->lab_slot_time,
			"lab_slot_date"=>$this->lab_slot_date,
			"status"=>$this->status,
			"schedule_id"=>$this->schedule_id,
			"course_id"=>$this->course_id

		);	

		if(DB::getInstance()->insertRow("lab_slot",$data)){
			return true;
		}
		else{
			return false;
		}


	}








}





?>