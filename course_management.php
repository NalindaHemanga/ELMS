<!DOCTYPE html>
<html>
<head>
<title>Course Management</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />

<script src="lib/jquery.min.js"></script>

<script>



function openModel(){
	location.href="#openModal";
}

</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
        
        <div style="text-align:left;width:68%;display:inline-block;">
        <font face="Agency FB" color="black" size="6px" ><Strong>Course Management Panel</Strong></font>
        <br/><br/>
        	
        </div>

        <div style="text-align:right;width:28%;display:inline-block;vertical-align:top;">
			<button style="width:15em;background:#43D14C;" onclick="openModel();">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Add new course </font></div></button>
		</div>	

		<?php

			echo "<div class='datagrid'><table>
    		<thead><tr><th>Course ID</th><th>Course Number</th><th>Course Name</th></tr></thead>";
			$allDetails = course::getDetails();
			foreach ($allDetails as $key => $value) {

    			$id=$value->getCourseId();
    			$number=$value->getCourseNo();
    			$name=$value->getCourseName();
    			
		    echo "
		        <tbody><tr><td>$id</td><td>$number</td><td>$name</td></tr>
		        <tr class=\"alt\">
		        </tr>
		        </tbody>
		        ";
			}
			echo "</table></div>";

		?>

        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>


<div id="openModal" class="modalDialog">

<div>

	<div class="form">
		<a href="#close" title="Close" class="close">X</a>

       	 <form class="form" enctype="multipart/form-data" method="POST" >

        		<div class="form_description">
					<h2>Course Registration</h2>
					<p>Fill this form to add a new course</p>
				</div>

				<ul>

					


					

					<li>
						<label class="description"for="textbox">Course No</label>
        				<div><input type="text" class="medium text" name="course_no"></div>
        			</li>

        			<li>
						<label class="description"for="textbox">Course Name</label>
        				<div><input type="text" class="medium text" name="course_name"></div>
        			</li>

        		
					<li>

						<span>
							<input type="submit" class="button" value="      SUBMIT      " />


						</span>
						<span>


							<input type="reset"  class="button"/>
						</span>

					</li>


        		</ul>


        </form>
        </div>
        </div>

</div>



<?php

    require_once 'core/init.php';


    if(count($_POST) > 0) {



    	$course_data = array(

				"course_no"		=>	$_POST["course_no"],
				"course_name"	=>	$_POST["course_name"],
			);

		$_SESSION['form_data'] = $course_data;


        header("Location: course_management.php",true,303);
        die();
    }
    else if (isset($_SESSION['form_data'])){




     $new_course = new Course();
     $new_course->create($_SESSION["form_data"]);

			if($new_course->add_course()){

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
