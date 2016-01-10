<?php 
	require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

	if(count($_POST)>0){
		$course_data = array(
			"course_id"   =>   $_POST["course_id"],
			"course_no"   =>   $_POST["course_no"],
			"course_name" =>   $_POST["course_name"]
		);

		$courseObj = new caurse();
		$courseObj -> create($course_data);
		$courseObj -> addCourse();
	}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>add_fixed_schedule</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">

        <h3>Add Fixed Schedule<h3>
        <hr>
        <from>
			<label>Start Date :</label>
			<input type="text" name="start_date">

			<label>End Date :</label>
			<input type="text" name="start_date">

		</from>

		<div clss="table1">
		<table width="70%" align="left" class="table">
    		<div id="head_nav">
			    <tr>
			        <th>Time</th>
			        <th>Monday</th>
			        <th>Tuesday</th>
			        <th>Wednesday</th>
			        <th>Thrusday</th>
			        <th>Friday</th>
			        <th>Saturday</th>
			        <th>Sunday</th>
			    </tr>
			</div>  

		    <tr>
		        <th>08:00 - 09:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>09:00 - 10:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>

		        </div>
		    </tr>

		    <tr>
		        <th>10:00 - 11:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>11:00 - 12:00</td>
		        
		           	<td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>12:00 - 01:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>01:00 - 02:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>02:00 - 03:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>03:00 - 04:00</td>
		        
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		    <tr>
		        <th>04:00 - 05:00</td>
		        
		           	<td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		            <td></td>
		        </div>
		    </tr>

		</table>
		<div/>

		<div class="table">		
		<table>
			<tr>
			        <th>Subject Name</th>
			        <th>Subject Code</th>
			</tr>

			<tr>
				<td>Database</td>
				<td>1102</td>
			</tr>

			<tr>
				<td>Programming</td>
				<td>1103</td>
			</tr>

			<tr>
				<td>Electronic</td>
				<td>2003</td>
			</tr>
		</table>

		</div>

        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
