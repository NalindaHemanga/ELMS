<?php 

	require_once 'core/init.php';
	if(count($_POST)>0){

		$username=$_POST["username"];
		$password=$_POST["password"];

		
		if(Member::login($username,$password)){


			$_SESSION['logged_in_user']=$username;
			header("location: dashboard.php");
			 
 

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
<style>
    body{
        background: url(img/e.png);
    }




   div.transbox{
    
    
    background-color: #ffffff;
    border: 1px solid black;
    overflaw:auto;
    padding: 10px; 
    width:35%; 
    height:auto;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.3);
   }
    
    
    </style>
</head>
<body>
    
    <div id="wrapper">
		
		
		
		
			
			<div><p style="text-align: center;"><img src="img/logonew.png" height="150" width="150" /></p>
<p style="text-align: center;"><strong><span style="font-size: 26px; color:#FFFF00;"> University of Colombo School of Computing</span></strong></p>
<p style="text-align: center;"><span style="color: #0B4C5F;"><span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 22px; color:#FFFF00;">Sign in to continue to Electronic Laboratory Management System of UCSC</span></span></p>

</div>
<center>


<div class="transbox">
       
       	 <form  enctype="multipart/form-data" method="POST" >
         		
				<ul>
                    
				    <font face="Agency FB"  size="4px" color="#000000" ><h2 style=" color: #000000;rgba(0, 0, 0, 1.0);">SIGN IN</h2></font>
                   
					<li>
						
        				<input type="email" class="medium text" name="username" placeholder=" E-Mail Address" required="required" 
                                  style="color: #000000;"/>
        			</li>

        			<li>
						
        				<input type="password" class="medium text" name="password" placeholder=" Password" required="required" style=" color: #000000;"/>
        			</li>



        			
					<li>

						
							<input type="submit" class="button" value="    Sign In    "  style=" font-weight: bold;color: #000000;"/>

                 
						
						
					</li>
                    <br/><br/>
					

					<div>
		
		<center><a href='fforgot_pass.php' style=" font-weight: bold;color: #000000;">Forgot Password?</a></center>
		</div>



        		</ul>
        

        </form>
    
        </div>
        
		</center>
		

		


    </div>
    </div>

</body>
    
</html>
