<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>



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
			
			<form>

								<input type="text" placeholder="Search..." style="margin-left:500px">
                                <input type="button" value="Search">
					
			
		          			<div>
					        	<label for="userid">User ID
					        	</label>
					        	<input type="text" name="user_id">
					      	</div>

					      	<div>
					      		<label>Profile Picture</label>
					      		<input type="file">
					      	</div>
					 

				
					      	<div>
					        	<label for="initials_name">Name of initials</label>
					        	<input type="text" name="initials_name">
					      	</div>
					

					 
					      	<div>
					        	<label for="surname">Surname
					        	</label>
					        	<input type="text" name="surname">
					      	</div>
				

					 
					      	<div>
					      		<label for="indexno"> Index No</label>
								<input type="text" name="indexno">
							</div>
							

				
								<div>
					      		<label for="email">E-mail address</label>
								<input type="email" name="email">
							</div>
				

					
								<div>
					      		<label for="password">Password</label>
								<input type="password" name="password">
							</div>
				

				
								<div>
					      		<label for="confirmpassword">Confirm Password</label>
								<input type="password" name="confirmpassword">
							</div>
				

						
								<div>
								<label> User Experation date</label>
		          				<select>
				  				<option value="date1">Date1</option>
				  				<option value="date2">Date2</option>
				  			</select>
							</div><br>
						

						
								<div>
									<label>Add user Roles</label>
									<fieldset>
									<legend>User Roles</legend>
									
							
									<input type="checkbox" name="role" value="ustudent">Undergraduate Student
									<input type="checkbox" name="role" value="gstundet" style="margin-left:33px;">Graduate Student<br>
									<input type="checkbox" name="role" value="rtassistant">Related Teaching assistant
									<input type="checkbox" name="role" value="nrtassistant" >Non-related Teaching Assistant<br>
									<input type="checkbox" name="role" value="rlecturer" >Related Lecturer
									<input type="checkbox" name="role" value="nlecturer" style="margin-left:73px;">Non-related Lecturer<br>
									<input type="checkbox" name="role" value="systemadmin" >System Admin
									<input type="checkbox" name="role" value="labadmin" style="margin-left:84px;">Lab Admin<br>
									<input type="checkbox" name="role" value="collaborator" >collaborator
									<input type="checkbox" name="role" value="tempuser" style="margin-left:103px;" >Temporary User<br>
								</fieldset>
								</div>

						
					<br>

					<input id="bttn" type="submit" value="Add New User">
					<input type="button" value="Update User">
					<input type="button" value="Delete User">
					<input type="button" value="Clear">

		  
		</form>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
