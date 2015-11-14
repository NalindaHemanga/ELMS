
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


<link rel="stylesheet" type="text/css" href="css/header.css" />
<div id="headerwrap">
        <div id="header">
			<div id="logo">
            <img src="img/logo.png" width="70px" height="70px" alt="UCSC logo"/>
			</div>
			<div id="title">
			<font face="Agency FB" color="#b5dfeb" size="6px" >Electronic Laboratory <br> Management System</font>
			</div>
			<div style="float:right; padding:27px;">
				<font face="Calibri" color="white" size="4">You are logged in as <strong><span style="text-transform:uppercase;"><a class="head"><?php echo $name;?></a></span></strong></font>

			</div>
		</div>
</div>