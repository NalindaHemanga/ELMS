<?php 

	require_once 'core/init.php';
	if(count($_POST)>0){

		$username=$_POST["username"];
		$password=$_POST["password"];

		
		if(Member::login($username,$password)){


			$_SESSION['logged_in_user']=$username;
			header("location: home.php");
			 
		

		}

		else{
			$message = "Please Enter the correct username and the password !!";
		echo "<script type='text/javascript'>alert('$message');</script>";


		}

}



?>



<!DOCTYPE html>
<html>
<head>
<title>Sign in</title>




<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
</head>
<body>
    <div id="wrapper">
		
		
		
		
			
			<div><p style="text-align: center;"><img src="img/logo.png" height="150" width="150" /></p>
<p style="text-align: center;"><strong><span style="font-size: large;"> University of Colombo School of Computing</span></strong></p>
<p style="text-align: center;"><span style="color: #757575;"><span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: medium;">Sign in to continue to Electronic Laboratory Management System of UCSC</span></span></p>

</div>
<center>
 <div style="overflaw:auto; padding: 10px; width:35%; height:auto; background-color:#ebebeb; border:1px solid #ccc; border-radius: 10px; ">


       
       	 <form  enctype="multipart/form-data" method="POST" >
        		
				<ul>
					<font face="Agency FB"  size="4px" ><h2>SIGN IN</h2></font>
					<hr/>
					<li>
						
        				<div><input type="email" class="medium text" name="username" placeholder=" E-Mail Address" required="required"/></div>
        			</li>

        			<li>
						
        				<div><input type="password" class="medium text" name="password" placeholder=" Password" required="required"/></div>
        			</li>



        			
					<li>

						
							<input type="submit" class="button" value="    Sign In    " />


						
						
					</li>
					<br/>
					<hr/>

					<div>
		
		<center><a href=#>Forgot Password?</a></center>
		</div>



        		</ul>
        

        </form>
			
        </div>
        
		</center>
		

		<div align="center">
			<br/><br/><br/><hr/>
				 <?php include "includes/footer.php" ?>
			
			</div>


       
    </div>

</body>
</html>
