<?php
	class Course {
		
		private $course_no;
		private $course_name;
		private $course_id;

		public function __construct(){

		}

		public function create($data=array()){

			$this->course_id	 	= 	$data["course_id"];
			$this->course_no 	    =	$data["course_no"];
			$this->course_name	 	= 	$data["course_name"];
		}

		public function getCourseId(){

			return $this->course_id;

		}

		public function getCourseNo(){

			return $this->course_no;

		}

		public function getCourseName(){

			return $this->course_name;

		}

		public function addCourse(){
			$row = array(

				"course_no" => $this->course_no, 	 	
				"course_name" => $this->course_name 			 	
			);

			if(DB::getInstance()->insertRow("course",$row)){
				return true;
			}
			else{
				return false;
			}
			
		}

		public static function getDetails(){

			$result=DB::getInstance()->directSelect("SELECT * FROM course ORDER BY course_id;");

			$allCourse = array();

			foreach ($result as $key => $row) {

				$courseObj = new course();
				$courseObj->create($row);
				$allCourse[]=$courseObj;

			}

			return $allCourse;
		}
	}

?>