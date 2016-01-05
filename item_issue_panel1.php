<?php

require_once 'core/init.php';
	if(isset($_SESSION["items"])){
		header("Location: item_issue_panel2.php");
	}
	else{
		
	}
	

?>

<!DOCTYPE html>
<html>
<head>
<title>Item Issuing Panel</title>


<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<script src="lib/jquery.min.js"></script>

<script type="text/javascript">

function searchMember(){



	var val=document.getElementById("searchVal").value;
	dataString="searchVal="+val;



		$.ajax({
			type: "GET",
			url: "item_issue_panel1_control.php",
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
			<font face="Agency FB" color="black" size="6px" ><Strong>Item Issuing Panel</Strong></font>
			</li>
			<li>
			Member Verification
			</li>
			</ul>
			</div>

			<div style="width:50%;display:inline-block;vertical-align:top;float:right" >
				<form class="form" onsubmit="return searchMember();" id="searchForm">
				<ul>
				<li>

        				<div>

        				<div><input type="search" class="medium text" name="searchVal" id="searchVal" placeholder=" Search Member By NIC" required="required" pattern="[0-9]{9}" title="Enter NIC number without the character at the end"/>  <input type="Submit" value="Search" /></div>
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

