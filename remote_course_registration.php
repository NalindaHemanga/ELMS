<?php

    require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}		
		if(count($_POST) > 0) {

	        
			
	    	$course_data = array(

	    		"course_id" 	=> null,
				"course_no"		=>	$_POST["course_no"],
				"course_name"	=>	$_POST["course_name"],
			);

	    	 $new_course = new Course();
		     $new_course->create($course_data);

			if($new_course->addCourse()){

				$message = "You have successfully Registered the Course !!";
				echo $message;
			}

			else{

				$message = "The Course Registration was unsuccessful.";
				echo $message;


			}
			

	       
    	}
    	
	   
?>

