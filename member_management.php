<!DOCTYPE html>
<html>
<head>
<title>Member Management</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
        
        <div style="text-align:left;width:68%;display:inline-block;">
        <font face="Agency FB" color="black" size="6px" ><Strong>Member Management Panel</Strong></font>
        <br/><br/>
        	
        </div>

        <div style="text-align:right;width:28%;display:inline-block;vertical-align:top;">
			<button style="width:15em;background:#43D14C;">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Add new member </font></div></button>
		</div>	

		<div  style="text-align:center;">
		 

				
								<select class="small select" name="dropdown"> 
								
									<option value="1" >Search by Member Type</option>
									<option value="2" >Search by Member NIC</option>
									<option value="3" >Search by Member Name</option>

								</select>

				<input type="search" class="small text"/>
							

		
				 <button style="width:10em;">   <img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-28-search.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Search </font></button>


		</div>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
