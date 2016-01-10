<?php

require("core/init.php");

?>


<!DOCTYPE html>
<html>
<head>
<title>Forget Password</title>

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
<?php 

if($_GET['code']){

	$get_email = $_GET['email'];
	$get_code = $_GET['code'];
 
	/*get database values to given user name*/

	$quary2 = "SELECT * FROM member WHERE member_email='$get_email'";
	$result2 =DB::getInstance()->directSelect($quary2);


		$db_code = $result2[0]['pass_reset'];
		$db_email = $result2[0]['member_email'];
		

	if($get_email == $db_email && $get_code == $db_code){
		/*password re-set form*/
		echo '<center>
		<div class="transbox">
       
       	 <form  action="pass_reset_complete.php?code='.$get_code.'" enctype="multipart/form-data" method="POST" >
         	<ul>
            <font face="Agency FB"  size="4px" color="#000000" ><h2 style=" color: #000000;rgba(0, 0, 0, 1.0);">Reset Your Password</h2></font>
                <li>
				<input type="password" class="medium text" name="newpass" placeholder=" New Passowrd" required="required" pattern=".{6,}" title="Six or more characters" style="color: #000000;"/>
        		</li> 
        		<li>
				<input type="password" class="medium text" name="newpass1" placeholder="Re-Enter your New Passowrd" required="required" pattern=".{6,}" title="Six or more characters" style="color: #000000;"/>
        		</li> 
        		<input type="hidden" name="username" value='.$db_email.'>       			
				<li>
				<input type="submit" name="submit" class="button" value="    Update Password..!!    "  style=" font-weight: bold;color: #000000;"/>	
				</li>
                <br/><br/>
        	</ul>
        </form>
    
        </div>
        
	</center>';
		
	}
}


if(!$_GET['code']){

	echo '<center>
		<div class="transbox">
       
       	 <form  action="fforgot_pass.php" enctype="multipart/form-data" method="POST" >
         	<ul>
            <font face="Agency FB"  size="4px" color="#000000" ><h2 style=" color: #000000;rgba(0, 0, 0, 1.0);">Enter Your Email Address</h2></font>
                <li>
				<input type="email" class="medium text" name="email" placeholder=" E-Mail Address" required="required" style="color: #000000;"/>
        		</li>        			
				<li>
				<input type="submit" name="submit" class="button" value="    Submit    "  style=" font-weight: bold;color: #000000;"/>	
				</li>
                <br/><br/>
        	</ul>
        </form>
    
        </div>
        
	</center>';

if(isset($_POST['submit'])){

		/*check weather given email exist or not in the database*/
		$email = $_POST['email'];	

		$quary="SELECT * FROM member WHERE member_email='$email'";
		$result =DB::getInstance()->directSelect($quary);
		//print_r($result);

		if(count($result) == 0){
			//echo "<script type='text/javascript'>alert('E-Mail Doesn't Matched');</script>";
			echo '<script type="text/javascript">alert("This e-mail is not registered with our system.");</script>';
		}

		else{
			$db_email = $result[0]["member_email"];
		}

		if(count($result) != 0){
			//print_r($result);

			/*send auto genarated code as a email to requested user*/

			if($email == $db_email){

				$code = rand(10000,1000000);

				$to = $db_email;
				$subject = "Password Reset";
				$body ="

					This is an automated email. Please DO NOT reply to this email.

					Click the link below or paste it into your browser

					http://elms.16mb.com/fforgot_pass.php?code=$code&email=$email

				";

				$quary1 = "UPDATE member SET pass_reset='$code' WHERE member_email='$email'";
				$result1 = DB::getInstance()->directUpdate($quary1);

				mail($to, $subject, $body);

				//echo "<script type='text/javascript'>alert('Check Your e-mail');</script>";
				echo '<script type="text/javascript">alert("Password reset link is sent. Check your mail");</script>';
			}

			else{
				//echo "<script type='text/javascript'>alert('E-Mail doesn't Matched');</script>";
				echo '<script type="text/javascript">alert("Request is not successful. Try again.");</script>';
			}
		}

	}
}

?>
		
   </div>


</body>
    
</html>
		