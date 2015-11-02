<?php

    require_once 'core/init.php';
		
		if(count($_POST) > 0) {

	        if($_POST["period"] != "NULL") {
				$validity	= date_format(date_add(DateTime::createFromFormat('Y-m-d', date("Y-m-d")),date_interval_create_from_date_string($_POST["period"])),"Y-m-d");
			}
			
	    	$course_data = array(

				"course_no"		=>	$_POST["course_no"],
				"course_name"	=>	$_POST["course_name"],
			);

			$_SESSION['form_data'] = $course_data;


	        header("Location: course_registration.php",true,303);
	        die();
    	}
    	
	    else if (isset($_SESSION['form_data'])){

		     $new_course = new Course();
		     $new_course->create($_SESSION["form_data"]);

			if($new_course->addCourse()){

				$message = "You have successfully Registered the Course !!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}

			else{

				$message = "The Course Registration was unsuccessful.";
				echo "<script type='text/javascript'>alert('$message');</script>";


			}
		        unset($_SESSION["form_data"]);

	    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Template</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
			<div class="form">
				<form class="form" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return checkCheckBoxGroup('m_type[]');" >
	        	<div class="form_description">
					<h2>Course Registration</h2>
					<p>Use This form to register a new course</p>
				</div>

				<div class="container" style="width:100%;">

					<div class="container" style="width:49%;display:inline-block;">

							<ul>

								<li>
									<label class="description" for="course_no">Course Number</label>
	        						<div><input id="course_no" type="text" class="large text" name="course_no" required="required"></div>
	        					</li>

	        					<li>
									<label class="description" for="course_name">Course Name</label>
	        						<div><input id="course_name" type="text" class="large text" name="course_name" required="required"></div>
	        					</li>

	        				</ul>
					</div>

						<li>

							<span>
								<input type="submit" class="button" value="     Submit     " name="submit" />


							</span>
							<span>


								<input type="reset"  class="button" onclick="resetText();"/>
							</span>

						</li>



	        </div>

	        </form>
        </div>
			
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
