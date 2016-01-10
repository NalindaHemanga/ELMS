<?php 
	require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Member Management</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />

	<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />

<script src="lib/jquery.min.js"></script>

<script>

function addSchedule(){

	var form=document.getElementById("scheduleForm");

		var dataString = $(form).serialize();

		document.getElementsByClassName("close")[0].click();
		$.ajax({
			type: "POST",
			url: "add_schedule.php",
			data: dataString,

			success: function(data) {

				form.reset();
				
				alert(data);
				

			}
			});

		return false;
	
}

function deleteSchedule(id){


if (confirm("Are you sure that you want to delete this schedule? ")){
	var dataString="sid="+id
	$.ajax({
			type: "POST",
			url: "delete_schedule.php",
			data: dataString,

			success: function(data) {

	
				
				alert(data);
				location.reload();
				

			}
			});

}

}

</script>


</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">

        <a href="#openModal" style="display:none;" id="hl">Open Modal</a>
        
        <div style="text-align:left;width:68%;display:inline-block;">
        <font face="Agency FB" color="black" size="6px" ><Strong>Schedule Management Panel</Strong></font>
        <br/><br/>
        	
        </div>

        <div style="text-align:right;width:28%;display:inline-block;vertical-align:top;">
			<button style="width:15em;background:#43D14C;" onclick="$('#hl').get(0).click();">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Create new schedule </font></div></button>
		</div>	
		<div class="datagrid">
		<table>
		<thead>
			<tr><th>Academic Year</th><th>Semester Start Date</th><th>Semester End Date</th><th><center>Actions</center></th></tr>

		</thead>
		<tbody>

			<?php 

			$schedule=Schedule::getAllSchedules();
			if(count($schedule)>0){
			foreach ($schedule as $key => $value) {
				$sid=$value->getScheduleId();
				echo "<tr>";
				echo "<td><a href='schedule_manager2.php?sid=$sid' >".$value->getAcademicYear()." ---- Semester ".$value->getSemesterNo()."</a></td>";
				echo "<td>".$value->getScheduleStartDate()."</td>";
				echo "<td>".$value->getScheduleEndDate()."</td>";
				echo "<td><div style='text-align:center;'><button style='width:10em;''>   <div><img src='img/icons/glyphicons_free/glyphicons/png/glyphicons-151-edit.png' width='13' height='13' /><font face='Calibri' color='black' size='4'> Edit </font></div></button> <button id='$sid' onclick='deleteSchedule(this.id)' style='width:10em;'>   <div><img src='img/icons/glyphicons_free/glyphicons/png/glyphicons-17-bin.png' width='13' height='15' /><font face='Calibri' color='black' size='4'> Delete </font></div></button><div></td>";

				echo "</tr>";
			}

		}






			?>


		</tbody>



		</table>
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

       	 <form class="form" onsubmit="return addSchedule();" id="scheduleForm" >

       	 <div class="form_description">
					<h2>Create New Schedule</h2>
					<p>Fill this form with relevent semester details</p>
				</div>
       	 <ul>

       	 	<li>
						<label class="description">Select Semester </label>
							<span>
									<input name="semester" class="radio" type="radio" value="1" checked="checked"/>
										<label class="choice" for="first_option">Semester 1</label>
									<input name="semester" class="radio" type="radio" value="2" />
										<label class="choice" for="second_option">Semester 2</label>
									

							</span> 
					</li>	



       	 	<li>
						<label class="description"for="textbox">Semester Start Date</label>
        				<div><input type="date" class="medium text" name="sem_start_date" required></div>
        	</li>

        	<li>
						<label class="description"for="textbox">Semester End Date</label>
        				<div><input type="date" class="medium text" name="sem_end_date" required></div>
        	</li>

        	<?php

        		$now = date("Y");
        		$prev = date("Y",strtotime("-1 year"));
        		$aca_year=$prev."/".$now;


        	?>

        	<li>
						<label class="description"for="textbox">Academic Year</label>
        				<div><input required type="text" class="medium text" name="academic_year" value=<?php echo $aca_year; ?> ></div>
        	</li>

        	</li>

						<span>
							<input type="submit"  class="button" value="      SUBMIT      "  />


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

