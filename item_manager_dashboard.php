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
			<img src="img/icons/item-search.png" height="150" width="150" />
			Search Item
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="item_add.php">
			<img src="img/icons/item-add.png" height="150" width="150" />
			Add Item
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/item-edit.png" height="150" width="150" />
			Edit Item Details
			</a>
			</div>

			<div id="usermanager" class="dashicon" >
			<a href="#">
			<img src="img/icons/item-delete.png" height="150" width="150" />
			Remove Items
			</a>
			</div>

</div>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
