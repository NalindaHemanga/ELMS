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
			

			<div style="margin:auto;" >
			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/male-user-search.png" height="150" width="150" />
			Search Member
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="member_registration.php">
			<img src="img/icons/male-user-add.png" height="150" width="150" />
			Register Member
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/male-user-edit.png" height="150" width="150" />
			Edit Member
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/male-user-remove.png" height="150" width="150" />
			Remove Member
			</a>
			</div>

</div>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
