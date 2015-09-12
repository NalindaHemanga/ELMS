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
			<img src="img/icons/supplier_search.png" height="150" width="150" />
			Search Supplier
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="supplier_registration.php">
			<img src="img/icons/supplier_add.png" height="150" width="150" />
			Register Supplier
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/supplier_edit.png" height="150" width="150" />
			Edit Supplier
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/supplier_delete.png" height="150" width="150" />
			Remove Supplier
			</a>
			</div>

</div>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
