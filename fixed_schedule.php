<?php

require_once 'core/init.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>Fixed Schedule</title>


<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<script src="lib/jquery.min.js"></script>
 <script type="text/javascript">
            var curCourse;
            var curCourseId;

    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drag(ev,course,courseId) {
        curCourse = course;
        curCourseId = courseId;
        ev.dataTransfer.setData("text", ev.target.id);
    }
    function drop(ev,id) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
       // ev.target.appendChild(document.getElementById(data));
        document.getElementById(id).value = curCourse;
        document.getElementById(id+"h").value = curCourseId;
    }

    function clearContent(id) {
        document.getElementById(id).value = "";
        document.getElementById(id+"h").value = "";
    }


    function loadTimeTable(day){

    	
    	
    	
				
				
		$("#timetable").load("time_table_slot.php",{"dayy":day});
			

    	

    }
    </script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
			
			

			<div id="left" style="width:29%;overflow:auto;display:inline-block;vertical-align:top">
      <fieldset style="width:200px;height:450px; margin-top:5px;">
    <legend>Courses</legend>

<?php
$sql = "SELECT * FROM `course`";
$courses = DB::getInstance()->directSelect($sql);
foreach($courses as $course){
	$courseId = $course['course_id'];
	$courseName = $course['course_name'];
	echo "<div style=\"padding:3px;\"><div style=\"border-style: solid; border-width:1px;\"draggable=\"true\" ondragstart='drag(event,\"$courseName\",\"$courseId\")'><font color=\"#0d6f94\">$courseName</font></div></div>";
}

?>

<a href="#openModal">Add new course</a>

    </fieldset><br><br><br>






            </div>

            <div id="right" style="width:69%;overflow:auto;display:inline-block;vertical-align:top">
      <fieldset style="height:450px; margin-top:5px;">
    <legend>Schedule</legend>
    	<div style="text-align:center;">

<button id="Monday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Mon</font></div></button>

<button id="Tuesday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Tue</font></div></button>

<button id="Wednesday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Wed</font></div></button>

<button id="Thursday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Thu</font></div></button>

<button id="Friday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Fri</font></div></button>

<button id="Saturday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Sat</font></div></button>

<button id="Sunday" style="width:6em;" onclick="loadTimeTable(this.id);"><div><font face="Calibri" color="black" size="4">Sun</font></div></button>


			</div>
<div id="timetable" style="padding:15px;">




</div>

    </fieldset><br><br><br>






            </div>


            </div>

			

			
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
        				<div><input type="text" class="medium text" name="textbox"></div>
        			</li>

        			<li>
						<label class="description"for="textbox">Course Name</label>
        				<div><input type="text" class="medium text" name="textbox"></div>
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
