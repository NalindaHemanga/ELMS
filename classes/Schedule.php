<?php

	class schedule{


		private $schedule_id,
				$semester_no,
				$academic_year,
				$schedule_start_date,
				$schedule_end_date;

		public function create($data){

				$this->schedule_id=$data["schedule_id"];
				$this->semester_no=$data["semester_no"];
				$this->academic_year=$data["academic_year"];		
				$this->schedule_start_date=$data["schedule_start_date"];
				$this->schedule_end_date=$data["schedule_end_date"];


		}

		public function add(){

			$data=array(
				
				"schedule_id"=>$this->schedule_id,
				"semester_no"=>$this->semester_no,
				"academic_year"=>$this->academic_year,
				"schedule_start_date"=>$this->schedule_start_date,
				"schedule_end_date"=>$this->schedule_end_date
			);


			if(DB::getInstance()->insertRow("schedule",$data)){
				

				$sid=DB::getInstance()->getLastId();
				date_default_timezone_set('UTC');
 				$lab_time=["8-9","9-10","10-11","11-12","12-1","1-2","2-3","3-4","4-5"];
	
				$date = $this->schedule_start_date;
	
				$end_date =$this->schedule_end_date;
 
				while (strtotime($date) <= strtotime($end_date)) {
                	
					foreach ($lab_time as $key => $value) {
						
						$data2=array(

							"lab_slot_id"=>null,
							"lab_slot_time"=>$value,
							"lab_slot_date"=>$date,
							"status"=>0,
							"schedule_id"=>$sid



							);
						$labslot=new LabSlot();
						$labslot->create($data2);
						$labslot->add();

					}
                	
                	$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
				}
 


				return true;
			}
			else{
				return false;
			}


		}




	}


?>