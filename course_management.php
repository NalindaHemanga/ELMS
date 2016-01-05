<!DOCTYPE html>
<html>
<head>
<title>Course Management</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />

<script src="lib/jquery.min.js"></script>

<script>

function changeInput(){

	var combo = $("<select></select>").attr("id", "membertype").attr("name", "membertype").attr("class","small select");

   
    combo.append("<option>System Administrator</option>");
    combo.append("<option>Laboratory Administrator</option>");
    combo.append("<option>Laboratory Assistant</option>");
    combo.append("<option>Related Lecturer</option>");
    combo.append("<option>Non-related Lecturer</option>");
    combo.append("<option>Related Teaching Assistant</option>");
    combo.append("<option>Non-related Teaching Assistant</option>");
    combo.append("<option>Undergraduate Student</option>");
    combo.append("<option>Graduate Student</option>");
    combo.append("<option>Collaborator</option>");
    combo.append("<option>Temporary Member</option>");
    

	var x = document.getElementById("searchtype").value;
	if(x=='0'){
		document.getElementById("searchinput").innerHTML = "";

	}

	if(x=='1'){
			 document.getElementById("searchinput").innerHTML = "";
			 $("#searchinput").append(combo);
	}
	else if(x=='2'){
		document.getElementById("searchinput").innerHTML = "";
			 document.getElementById("searchinput").innerHTML = "<input id='nic' type='text' class='small text' name='nic_no' required='required' pattern='[0-9]{9}'' title='Enter NIC number without the character at the end' placeholder='Enter NIC No'/>";
	}
	else if(x=='3'){
		document.getElementById("searchinput").innerHTML = "";
			 document.getElementById("searchinput").innerHTML = "<input type='email' class='small text' name='email' required='required' placeholder='Enter E-Mail'/>";
	}
    
}



</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
        
        <div style="text-align:left;width:68%;display:inline-block;">
        <font face="Agency FB" color="black" size="6px" ><Strong>Course Management Panel</Strong></font>
        <br/><br/>
        	
        </div>

        <div style="text-align:right;width:28%;display:inline-block;vertical-align:top;">
			<button style="width:15em;background:#43D14C;">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Add new course </font></div></button>
		</div>	
<!--
		<div  style="text-align:center;">
		 

				
								<select id='searchtype' class="small select" name="dropdown" onchange="changeInput();"> 
									<option value="0" selected="selected" >Select Search Method</option>
									<option value="1" >Search by Course ID</option>
									<option value="2" >Search by Course Number</option>
									<option value="3" >Search by Course Name</option>

								</select>

				<span id='searchinput'></span>
							

		
				 <button style="width:10em;">   <img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-28-search.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Search </font></button>


		</div>
-->
		<?php

			echo "<div class='datagrid'><table>
    		<thead><tr><th>Course ID</th><th>Course Number</th><th>Course Name</th></tr></thead>";
			$allDetails = course::getDetails();
			foreach ($allDetails as $key => $value) {
    			$id=$value->getCourseId();
    			$number=$value->getCourseNo();
    			#$des=$value->get_Description();
    			$name=$value->getCourseName();
    			//echo "<a href='forum_view_posts.php?cid=".$id."' class='cat_links'>  <b>$title</b>:  <br> Posted By <i>$pst_usr</i> </a>  ";
		    echo "
		        <tbody><tr><td>$id</td><td>$number</td><td>$name</td></tr>
		        <tr class=\"alt\">
		        </tr>
		        </tbody>
		        ";
			}
			echo "</table></div>";

		?>

        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
