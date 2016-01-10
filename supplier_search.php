<?php 

require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Administrator", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

 ?>

<!DOCTYPE html>
<html>
<head>
<title>Search Supplier</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />

<link rel="stylesheet" type="text/css" href="css/form.css" />
<script src="lib/jquery.min.js"></script>

<script type="text/javascript">

function searchSupplier(){



	var val=document.getElementById("searchVal").value;
	dataString="searchVal="+val;



		$.ajax({
			type: "GET",
			url: "supplier_search_panel.php",
			data: dataString,

			success: function(data) {

				$("#result").html(data);
			}
			});



	return false;



}





</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">

			<div  style="width:50%;display:inline-block;vertical-align:top;">
			<ul style="list-style-type:none;">
			<li>
			<font face="Agency FB" color="black" size="6px" ><Strong>Supplier Search Panel</Strong></font>
			</li>
			<li>
			.
			</li>
			</ul>
			</div>

			<div style="width:50%;display:inline-block;vertical-align:top;float:right" >
				<form class="form" onsubmit="return searchSupplier();" id="searchForm" method="get">
				<ul>
				<li>

        				<div>

        				<div><input type="search" class="medium text" name="searchVal" id="searchVal" placeholder=" Search Supplier By Email" required="required" title="Enter email address correct format"/>  <input type="Submit" value="Search" /></div>
        			</li>
        			</ul>

        		</form>

			</div>
			<hr/>

			<div id="result">

			</div>



        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
