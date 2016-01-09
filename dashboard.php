<?php
	
	require_once 'core/init.php';

	$username=$_SESSION['logged_in_user'];

	$member=Member::search(["member_email"=>$username]);

	$roles=explode(",",$member->getRoles());
	print_r($roles);






?>





<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
			


			<div  class="dashicon" >
			<a href="item_manager.php">
			<img src="img/icons/item_manager.png" height="150" width="150" />
			Item Manager
			</a>
			</div>

			

			<div  class="dashicon" >
			<a href="item_issue_panel1.php">
			<img src="img/icons/issue.png" height="150" width="150" />
			Issue Items
			</a>
			</div>

			<div  class="dashicon" >
			<a href="item_return_panel1.php">
			<img src="img/icons/return.png" height="150" width="150" />
			Return Items
			</a>
			</div>

			<div  class="dashicon" >
			<a href="schedule_manager.php">
			<img src="img/icons/schedule.png" height="150" width="150" />
			Schedule Manager
			</a>


    </div>

    <div  class="dashicon" >
			<a href="user_manager_dashboard.php">
			<a href="member_management.php">
			<img src="img/icons/users.png" height="150" width="150" />
			User Manager
			</a>
			</div>

			<div  class="dashicon" >
			<a href="course_management.php">
			<img src="img/icons/course.png" height="150" width="150" />
			Course Manager
			</a>
			</div>

			<div  class="dashicon" >
			<a href="supplier_management.php">
			<img src="img/icons/supplier.png" height="150" width="150" />
			Supplier Manager
			</a>
			</div>




        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
