<!DOCTYPE html>
<html>
<head>
<title>Member Management</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
<link rel="stylesheet" type="text/css" href="css/forum_styles.css" />

<script src="lib/jquery.min.js"></script>

<script>

function changeInput(){

	var combo = $("<select></select>").attr("id", "membertype").attr("name", "membertype").attr("class","small select"); //This loads combo box or textbox according to the selection

   
    combo.append("<option>System Administrator</option>");
    combo.append("<option>Laboratory Administrator</option>");
    combo.append("<option>Laboratory Assistant</option>");
    combo.append("<option>Related Lecturer</option>");
    combo.append("<option>Non-Related Lecturer</option>");
    combo.append("<option>Related Teaching Assistant</option>");
    combo.append("<option>Non-Related Teaching Assistant</option>");
    combo.append("<option>Undergraduate Student</option>");
    combo.append("<option>Graduate Student</option>");
    combo.append("<option>Collaborator</option>");
    combo.append("<option>Temporary Member</option>");
    

	var x = document.getElementById("searchtype").value; //assigns 1st dropdown menu's value to X
	if(x=='0'){
		document.getElementById("searchinput").innerHTML = ""; //Get value selected in dropdown menu or inserted in the text area

	}

	if(x=='1'){                    //if 1st dropdown menu's selection is 1st choise, displays combo box
			 document.getElementById("searchinput").innerHTML = "";
			 $("#searchinput").append(combo);
	}
	else if(x=='2'){               //if 1st dropdown menu's selection is 2nd choise, displays textbox
		document.getElementById("searchinput").innerHTML = "";
			 document.getElementById("searchinput").innerHTML = "<input id='nic' type='text' class='small text' name='nic_no' required='required' pattern='[0-9]{9}'' title='Enter NIC number without the character at the end' placeholder='Enter NIC No'/>";
	}
	else if(x=='3'){              //if 1st dropdown menu's selection is 3rd choise, displays textbox
		document.getElementById("searchinput").innerHTML = "";
			 document.getElementById("searchinput").innerHTML = "<input type='email' class='small text' name='email' required='required' placeholder='Enter E-Mail'/>";
	}
    
}

function addNewMember(){        //Gives the location of the model window

	location.href="#openModal";

}



function loadXMLDoc()
{
var searchType = document.getElementById("searchtype").value;
var searchInput = document.getElementById("membertype").value;      
var xmlhttp;
if (window.XMLHttpRequest)
  {                                      // code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {                                     // code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("searchResult").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "member_search.php?searchType=" + searchType + "&searchInput=" + searchInput, true);    //Send a request to member_search.php with related search input 
        xmlhttp.send();

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
        <font face="Agency FB" color="black" size="6px" ><Strong>Member Management Panel</Strong></font>
        <br/><br/>
        	
        </div>

        <div style="text-align:right;width:28%;display:inline-block;vertical-align:top;">
			<button style="width:15em;background:#43D14C;" onclick=addNewMember();>   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Add new member </font></div></button>    //Creates a button that will open a model window for registering a new member.
		</div>	

		<div  style="text-align:center;">
		 

				
								<select id='searchtype' class="small select" name="dropdown" onchange="changeInput();">  //Creates a dropdown menue with 3 options for searching
									<option value="0" selected="selected" >Select Search Method</option>
									<option value="1" >Search by Member Type</option>
									<option value="2" >Search by Member NIC</option>
									<option value="3" >Search by E-mail</option>

								</select>

				<span id='searchinput' name='searchinput'></span>
							

		
				 <button style="width:10em;" onclick=loadXMLDoc() >   <img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-28-search.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Search </font></button>


		</div>
<div id = "searchResult">

</div>
        </div>
        </div>

<!-- ///////////////////////////////////////--------openModal-----////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////For Registering a new member//////////////////////////////////////////////////////////////////////////// -->

<div id="openModal" class="modalDialog">
	<div>
		<a id="closeModel" href="#close" title="Close" class="close">X</a>
		<div id = "modalContent">

        <div class="form">

       	 <form id="supplieAdd" class="form" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return checkCheckBoxGroup('m_type[]');" >
        	<div class="form_description">
				<h2>Member Registration</h2>
				<p>Use This form to register a new member</p>
			</div>

			<div class="container" style="width:100%;">

				<div class="container" style="width:49%;display:inline-block;">

						<ul>

							<li>
								<label class="description" for="nic_no">NIC Number</label>
        						<div><input id="nic" type="text" class="large text" name="nic_no" onblur="autoType();" required="required" pattern="[0-9]{9}" title="Enter NIC number without the character at the end" onblur="this.setCustomValidity('User ID is a must')"></div>
        					</li>

        					<li  >
								<label class="description">Name </label>
								<span>
									<input name= "initials" class="text" maxlength="255" size="10" value="" required="required" style="text-transform:uppercase;" pattern="[A-Za-z]+"/>
									<label for="street">Initials</label>
								</span>

								<span>
									<input name= "surname" class="text" maxlength="255" size="26" value="" required="required" pattern="[A-Za-z]+" style="text-transform:uppercase;"/>
									<label for="street">Surname</label>
								</span>
							</li>

							<li>
								<label class="description" for="email">E-mail Address</label>
        						<div><input type="email" class="large text" name="email" required="required"></div>
        					</li>

        					<li>
								<label class="description"for="password">Password</label>
        						<div><input id="pass" type="password" class="medium text" name="password" required="required" pattern=".{6,}" title="Six or more characters" onchange="validatePassword();"></div>
        					</li>

        					<li>
								<label class="description"for="con_password">Confirm Password</label>
        						<div><input id="conpass" type="password" class="medium text" name="con_password" required="required" pattern=".{6,}" title="Six or more characters" onchange="validatePassword();">

        						</div>
        					</li>



        				</ul>
				</div>

				<div class="container" style="display:inline-block;width:49%;">

						<ul>
							<li>
								<label class="description">Profile Picture</label>


									<div>
										<img id="pro_pic" src="img/profile_pictures/default.jpg" height="185" width="165" style="border:1px solid #ccc;padding:21px" />
									</div>

									<div>
										<input name="picture" class="file" type="file" accept="image/jpeg" onchange=" loadFile(event)" />
									</div>

										<script>
 											 var loadFile = function(event) {
    											var reader = new FileReader();
   											 reader.onload = function(){
    										  var output = document.getElementById('pro_pic');
     										 output.src = reader.result;
   												 };
   												 reader.readAsDataURL(event.target.files[0]);
  												};
										</script>


							</li>





        				</ul>


				</div>

				<li>
						<label id = "membercheck" class="description">Member Type</label>
							<span>

									<input  name="m_type[]" class="checkbox" type="checkbox" value="sys_ad" />
										<label class="choice" for="m_type[]">System Administrator</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="lab_ad" />
										<label class="choice" for="m_type[]">Laboratory Administrator</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="lab_as" />
										<label class="choice" for="m_type[]">Laboratory Assistant</label>

									<input  name="m_type[]" class="checkbox" type="checkbox" value="rel_lec" />
										<label class="choice" for="m_type[]">Related Lecturer</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="nrel_lec" />
										<label class="choice" for="m_type[]">Non-related Lecturer</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="rel_ta" />
										<label class="choice" for="m_type[]">Related Teaching Assistant</label>

									<input  name="m_type[]" class="checkbox" type="checkbox" value="nrel_ta" />
										<label class="choice" for="m_type[]">Non-related Teaching Assistant</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="u_std" />
										<label class="choice" for="m_type[]">Undergraduate Student</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="g_std" />
										<label class="choice" for="m_type[]">Graduate Student</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="col" />
										<label class="choice" for="m_type[]">Collaborator</label>

									<input name="m_type[]" class="checkbox" type="checkbox" value="tmp_mem" />
										<label class="choice" for="m_type[]">Temporary Member</label>

							</span>
					</li>

					<li>
						<label class="description">Membership Period</label>
							<span>
									<input name="period" class="radio" type="radio" value="3 months" />
										<label class="choice" for="period">3 months</label>
									<input name="period" class="radio" type="radio" value="1 year" />
										<label class="choice" for="period">1 year</label>
									<input name="period" class="radio" type="radio" value="5 years" checked="checked" />
										<label class="choice" for="third_option">5 years</label>
									<input name="period" class="radio" type="radio" value="10 years" />
										<label class="choice" for="period">10 years</label>
									<input name="period" class="radio" type="radio" value="NULL" />
										<label class="choice" for="period">Lifetime</label>

							</span>
					</li>

					<li>

						<span>
							<input type="submit" class="button" value="     Submit     " name="submit" />


						</span>
						<span>


							<input type="reset"  class="button" onclick="resetText();"/>
						</span>

					</li>



        </div>

        </form>		


<script  type="text/javascript">

$("form#supplieAdd").submit(function(){         //Send collected member registration data to member_registration.php

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: "member_registration.php",
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            alert(data);
//alert(x); 
//window.opener.CallAlert();
	    //location.reload();
	    document.getElementById("supplieAdd").reset();
	    document.getElementById("closeModel").click();

        },
        cache: false,
        contentType: false,
        processData: false
    });
    //location.href="#close";
    return false;
});

function validatePassword(){                         //Check whether two passwords matches
var pass2=document.getElementById("pass").value;
var pass1=document.getElementById("conpass").value;
if(pass1!=pass2)
	document.getElementById("conpass").setCustomValidity("Passwords Don't Match");

else
	document.getElementById("conpass").setCustomValidity('');

//empty string means no validation error
}
function autoType() {                          //Make password the NIC no unless it is changed later
	
    var t1=document.getElementById("nic");
    var p1=document.getElementById("pass");
    var p2=document.getElementById("conpass");
    var val=t1.value;
    p1.setAttribute('value', val);
    p2.setAttribute('value', val);


}

function resetText(){                   //Reset typed data

document.getElementById("pass").value="";
document.getElementById("conpass").value="";



}

function checkCheckBoxGroup(groupName) {          //Check Whether atleast 1 user role is selected
  var g = document.getElementsByName(groupName);

  for(var i = 0;i<g.length;i++) {
    if (g[i].checked) {

      return true;
    }
  }

  alert("Please check at least one user role");
  return false;
}

</script>

	</div>
	</div>
	</div>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
