<?php

require_once 'core/init.php';

if(isset($_SESSION["logged_in_user"])){
	$username=$_SESSION["logged_in_user"];
}
else{

	header("location: login.php");
}

$member=Member::search(array("member_email"=>$username));
$name=$member->getInitials()." ".$member->getSurname();


?>



<!DOCTYPE html>
<html>
<head>

<title>ELMS</title>



<link rel="stylesheet" type="text/css" href="css/homepage.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<script src="lib/jquery.min.js"></script>
</head>

<body background="img/homepage/homepage.png">
	
    <div id="wrapper">
	

		
		<div id="header" >
		
		<div id="logo" >
					<img src="img/logo.png" width="70px" height="70px" alt="UCSC logo"/>
		</div>	
		
		<div id="title">
					<font face="Agency FB" color="#000000" size="6px" ><b>Electronic Laboratory </b></font></div>
		</div>
		
	
			 <ul>
					<li><a class="active" href="#"> Home</a></li>
					<li><a href="login.php"> Login</a></li>
			</ul> 
		<div id="slider">
		
		<div id="photos">
		
		<div>
			<img src="img/slideshow/image1.png">
		</div>
		
		<div>
			<img src="img/slideshow/image2.png">
		</div>
		
		<div>
			<img src="img/slideshow/image3.png">
		</div>
		
		</div>
		</div>
		<script>
		
					$("#photos > div:gt(0)").hide();

					setInterval(function() { 
					$('#photos > div:first')
					.fadeOut(1000)
					.next()
					.fadeIn(1000)
					.end()
					.appendTo('#photos');
					},  6000);
		
					
		</script>
		
		
		<div id="about">
		
		<h3> About Us </h3><hr>
		
		<p >Electronic laboratory of UCSC is used to do the laboratory practical of the courses; Electronics, Embedded Systems, Robotics and 3rd year, 4th  year projects. Its main task is to issue Electronic equipment for the laboratory practicals and to hold tutorial classes. Electronic laboratory of UCSC has many resources that can be used in many projects. 
		</p>
		
		</div>
		
		
       
    </div>
</body>
</html>
