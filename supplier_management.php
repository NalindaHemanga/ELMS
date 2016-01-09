<!DOCTYPE html>
<html>
<head>
<title>Supplier Management</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />

<script src="lib/jquery.min.js"></script>

<script>

function openModel(){
	location.href="#openModal";
}

var counter = 0;


	function addInput(divName){



     	     var newli = document.createElement('li');


 			 newli.setAttribute('id', counter);
      		    newli.innerHTML = '<div><input type="text" class="medium text" name="links[]" required="required" pattern="[0-9]{10}"><a href="javascript: void(0)" onClick="removeInput(\''+divName+'\',\''+counter+'\');"> Remove </a></div>';
         		 document.getElementById(divName).appendChild(newli);
         		 counter++;

 }

    function removeInput(divName,liid) {

  		var d = document.getElementById(divName);

  		var li = document.getElementById(liid);

  		d.removeChild(li);

}

function editSupplier(){
//alert("OK");

		var form=document.getElementById("supplierEditForm");

		var dataString = $(form).serialize();

alert(dataString);
		$.ajax({
			type: "POST",
			url: "edit_supplier.php",
			data: dataString,

			success: function(result) {
//alert(json_data);
				form.reset();
				var div=document.getElementById("dynamicInputTelephone");
				div.innerHTML="";
				document.getElementsByClassName("close")[0].click();

				//var data_array = $.parseJSON(json_data);
				alert(result);
				//closeModal3();
				//$('#supplier_dropdown').append($('<option>', {
       				 //	value: data_array["sup_id"],
        			//	text: data_array["sup_name"],
        			//	selected:"selected"
   				// }));
			}
			});




		return false;




}


function registerSupplier(){

		var form=document.getElementById("supplierForm");

		var dataString = $(form).serialize();


		$.ajax({
			type: "POST",
			url: "remote_supplier_registration.php",
			data: dataString,

			success: function(json_data) {
				
				form.reset();
				var div=document.getElementById("dynamicInput");
				div.innerHTML="";
				document.getElementsByClassName("close")[0].click();

				var data_array = $.parseJSON(json_data);
				alert(data_array['message']);
				closeModal3();
				$('#supplier_dropdown').append($('<option>', {
       				 	value: data_array["sup_id"],
        				text: data_array["sup_name"],
        				selected:"selected"
   				 }));
			}
			});




		return false;

	}



function supplierClicked(id,name1,email,street1,line21,city1,province1,postal,country1,telephoneJson){
	
	telephoneJson = telephoneJson.replace(/%19/g, '"');
//alert(telephoneJson);
	telephone = $.parseJSON(telephoneJson);
	sup_id = id;
	sup_email = email;
	sup_postal = postal;
	name = name1.replace(/%19/g, " ");
	street = street1.replace(/%19/g, " ");
	line2 = line21.replace(/%19/g, " ");
	city = city1.replace(/%19/g, " ");
	province = province1.replace(/%19/g, " ");
	country = country1.replace(/%19/g, " ");

	document.getElementById("companyName").innerHTML=name;
	document.getElementById("supplierEmail").innerHTML=email;
	document.getElementById("supplierStreet").innerHTML=street+",";
	document.getElementById("supplierLine2").innerHTML=line2+",";
	document.getElementById("supplierCity").innerHTML=city+",";
	document.getElementById("supplierProvince").innerHTML=province+",";
	document.getElementById("supplierPostal").innerHTML=postal;
	document.getElementById("supplierCountry").innerHTML=country+".";
     	document.getElementById("addTelephoneNumber").innerHTML="";
     	document.getElementById("submitResetBtn").innerHTML="";
	document.getElementById("dynamicInputTelephone").innerHTML="<li>No telephone numbers</li>";
	arrayLength = telephone.length;
	for (var i = 0; i < arrayLength; i++) {
		if(i==0){document.getElementById("dynamicInputTelephone").innerHTML="";}
		var newElement = document.createElement('li');
		newElement.innerHTML = telephone[i];
		document.getElementById("dynamicInputTelephone").appendChild(newElement);
	}
	

	location.href="#openModal2";
}

function supplierEditClicked(){
//alert(line2);
	document.getElementById("companyName").innerHTML="<input id=\"name\" type=\"text\" class=\"medium text\" name=\"company\" required=\"required\" value=\""+name+"\">";
	document.getElementById("supId").value=sup_id;
	document.getElementById("supplierEmail").innerHTML="<input type=\"email\" class=\"medium text\" name=\"email\" required=\"required\" value=\""+sup_email+"\">";
	document.getElementById("supplierStreet").innerHTML="<input id=\"street\" name=\"street\" class=\"element text medium\"  type=\"text\" required=\"required\" value=\""+street+"\"> <label for=\"street\">Street Address</label>";
	document.getElementById("supplierLine2").innerHTML='<input id="line2" name="line2" class="element text medium" type="text" required="required" value="'+line2+'"> <label for="line2">Address Line 2</label>';
	document.getElementById("supplierCity").innerHTML='<input id="city" name="city" class="element text small"  type="text" required="required" value="'+city+'"> <label for="city">City</label>';
	document.getElementById("supplierProvince").innerHTML='<input id="province" name="province" class="element text small"  type="text" value="'+province+'"><label for="province">State / Province / Region</label>';
	document.getElementById("supplierPostal").innerHTML='<input id="postal" name="postal" class="element text small" maxlength="15"  type="text" value="'+sup_postal+'"> <label for="postal">Postal / Zip Code</label>';
	document.getElementById("supplierCountry").innerHTML=document.getElementById("supplierCountry1").innerHTML;

     	document.getElementById("addTelephoneNumber").innerHTML='<a href="javascript: void(0)" onClick="addInput(\'dynamicInputTelephone\');">Click to add Telephone Number</a>';
	document.getElementById("dynamicInputTelephone").innerHTML="";
     	document.getElementById("submitResetBtn").innerHTML="<span><input type=\"submit\" class=\"button\" value=\"     Submit     \" name=\"submit\"/> </span><span><input type=\"reset\"  class=\"button\" /></span>";

	for (var i = 0; i < arrayLength; i++) {
		if(i==0){document.getElementById("dynamicInputTelephone").innerHTML="";}
		var newli = document.createElement('li');
		newli.setAttribute('id', counter);
      		newli.innerHTML = '<div><input type="text" class="medium text" name="links[]" required="required" pattern="[0-9]{10}" value="'+telephone[i]+'"><a href="javascript: void(0)" onClick="removeInput(\'dynamicInputTelephone\',\''+counter+'\');"> Remove </a></div>';
         	document.getElementById("dynamicInputTelephone").appendChild(newli);
         	counter++;
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
        <font face="Agency FB" color="black" size="6px" ><Strong>Supplier Management Panel</Strong></font>
        <br/><br/>
        	
        </div>

        <div style="text-align:right;width:28%;display:inline-block;vertical-align:top;">
			<button style="width:15em;background:#43D14C;" onclick="openModel();">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Add new supplier </font></div></button>
		</div>	

		<?php

			echo "<div class='datagrid'><table>
    		<thead><tr><th>Supplier Name</th><th>Supplier E-mail</th></tr></thead>";
			$allDetails = Supplier::getDetails();
			foreach ($allDetails as $key => $value) {
    			$id=$value->getId();
    			$name=$value->getCompany();
    			$email=$value->getEmail();
//<<<<<<< Updated upstream
    			
//=======
			$street=$value->getStreet();
			$line2=$value->getLine2();
			$city=$value->getCity();
			$province=$value->getProvince();
			$postal=$value->getPostal();
			$country=$value->getCountry();
			$nameReplaced = str_replace(" ","%19",$name);
			$streetReplaced = str_replace(" ","%19",$street);
			$line2Replaced = str_replace(" ","%19",$line2);
			$cityReplaced = str_replace(" ","%19",$city);
			$provinceReplaced = str_replace(" ","%19",$province);
			$countryReplaced = str_replace(" ","%19",$country);
			$telephone=$value->getTelephone();
			$telephoneReplaced=str_replace('"',"%19",json_encode($telephone));

    			//$des=$value->get_Description();
    			//$telephone=$value->getTelephone();
    			//echo "<a href='forum_view_posts.php?cid=".$id."' class='cat_links'>  <b>$title</b>:  <br> Posted By <i>$pst_usr</i> </a>  ";
//>>>>>>> Stashed changes
		    echo "
		        <tbody><tr><td><a onclick=\"supplierClicked($id,'$nameReplaced','$email','$streetReplaced','$line2Replaced','$cityReplaced','$provinceReplaced','$postal','$countryReplaced','	$telephoneReplaced');\" style='text-decoration: none; color:#0912cb;'>$name</a></td><td>$email</td></tr>
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

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div id="openModal" class="modalDialog">

<div>

	<div class="form">
		<a href="#close" title="Close" class="close">X</a>

       	 <form id="supplierForm" class="form" onsubmit="return registerSupplier();">
        	<div class="form_description">
				<h2>Supplier Registration</h2>
				<p>Use This form to register a new supplier</p>
			</div>

			<div class="container" style="width:100%;">



						<ul>

							<li>
								<label class="description" for="company">Company Name</label>
        						<div><input id="name" type="text" class="medium text" name="company" required="required" ></div>
        					</li>



							<li>
								<label class="description"for="email">E-mail Address</label>
        						<div><input type="email" class="medium text" name="email" required="required"></div>
        					</li>

        					<li>
		<label class="description" for="element_1">Address </label>

		<div>
			<input id="street" name="street" class="element text medium"  type="text" required="required">
			<label for="street">Street Address</label>
		</div>

		<div>
			<input id="line2" name="line2" class="element text medium" value="" type="text" required="required">
			<label for="line2">Address Line 2</label>
		</div>

		<div class="left">
			<input id="city" name="city" class="element text small"  type="text" required="required">
			<label for="city">City</label>
		</div>

		<div class="right">
			<input id="province" name="province" class="element text small"  type="text">
			<label for="province">State / Province / Region</label>
		</div>

		<div class="left">
			<input id="postal" name="postal" class="element text small" maxlength="15"  type="text">
			<label for="postal">Postal / Zip Code</label>
		</div>

		<div class="right" id="supplierCountry1">
			<select class="element select small" id="country" name="country" required="required">

<option value="Afghanistan" >Afghanistan</option>
<option value="Albania" >Albania</option>
<option value="Algeria" >Algeria</option>
<option value="Andorra" >Andorra</option>
<option value="Antigua and Barbuda" >Antigua and Barbuda</option>
<option value="Argentina" >Argentina</option>
<option value="Armenia" >Armenia</option>
<option value="Australia" >Australia</option>
<option value="Austria" >Austria</option>
<option value="Azerbaijan" >Azerbaijan</option>
<option value="Bahamas" >Bahamas</option>
<option value="Bahrain" >Bahrain</option>
<option value="Bangladesh" >Bangladesh</option>
<option value="Barbados" >Barbados</option>
<option value="Belarus" >Belarus</option>
<option value="Belgium" >Belgium</option>
<option value="Belize" >Belize</option>
<option value="Benin" >Benin</option>
<option value="Bhutan" >Bhutan</option>
<option value="Bolivia" >Bolivia</option>
<option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
<option value="Botswana" >Botswana</option>
<option value="Brazil" >Brazil</option>
<option value="Brunei" >Brunei</option>
<option value="Bulgaria" >Bulgaria</option>
<option value="Burkina Faso" >Burkina Faso</option>
<option value="Burundi" >Burundi</option>
<option value="Cambodia" >Cambodia</option>
<option value="Cameroon" >Cameroon</option>
<option value="Canada" >Canada</option>
<option value="Cape Verde" >Cape Verde</option>
<option value="Central African Republic" >Central African Republic</option>
<option value="Chad" >Chad</option>
<option value="Chile" >Chile</option>
<option value="China" >China</option>
<option value="Colombia" >Colombia</option>
<option value="Comoros" >Comoros</option>
<option value="Congo" >Congo</option>
<option value="Cook Islands and Niue" >Cook Islands and Niue</option>
<option value="Costa Rica" >Costa Rica</option>
<option value="CÃ´te d'Ivoire" >CÃ´te d'Ivoire</option>
<option value="Croatia" >Croatia</option>
<option value="Cuba" >Cuba</option>
<option value="Cyprus" >Cyprus</option>
<option value="Czech Republic" >Czech Republic</option>
<option value="Denmark" >Denmark</option>
<option value="Djibouti" >Djibouti</option>
<option value="Dominica" >Dominica</option>
<option value="Dominican Republic" >Dominican Republic</option>
<option value="East Timor" >East Timor</option>
<option value="Ecuador" >Ecuador</option>
<option value="Egypt" >Egypt</option>
<option value="El Salvador" >El Salvador</option>
<option value="Equatorial Guinea" >Equatorial Guinea</option>
<option value="Eritrea" >Eritrea</option>
<option value="Estonia" >Estonia</option>
<option value="Ethiopia" >Ethiopia</option>
<option value="Fiji" >Fiji</option>
<option value="Finland" >Finland</option>
<option value="France" >France</option>
<option value="Gabon" >Gabon</option>
<option value="Gambia" >Gambia</option>
<option value="Georgia" >Georgia</option>
<option value="Germany" >Germany</option>
<option value="Ghana" >Ghana</option>
<option value="Greece" >Greece</option>
<option value="Grenada" >Grenada</option>
<option value="Guatemala" >Guatemala</option>
<option value="Guinea" >Guinea</option>
<option value="Guinea-Bissau" >Guinea-Bissau</option>
<option value="Guyana" >Guyana</option>
<option value="Haiti" >Haiti</option>
<option value="Honduras" >Honduras</option>
<option value="Hong Kong" >Hong Kong</option>
<option value="Hungary" >Hungary</option>
<option value="Iceland" >Iceland</option>
<option value="India" >India</option>
<option value="Indonesia" >Indonesia</option>
<option value="Iran" >Iran</option>
<option value="Iraq" >Iraq</option>
<option value="Ireland" >Ireland</option>
<option value="Israel" >Israel</option>
<option value="Italy" >Italy</option>
<option value="Jamaica" >Jamaica</option>
<option value="Japan" >Japan</option>
<option value="Jordan" >Jordan</option>
<option value="Kazakhstan" >Kazakhstan</option>
<option value="Kenya" >Kenya</option>
<option value="Kiribati" >Kiribati</option>
<option value="North Korea" >North Korea</option>
<option value="South Korea" >South Korea</option>
<option value="Kuwait" >Kuwait</option>
<option value="Kyrgyzstan" >Kyrgyzstan</option>
<option value="Laos" >Laos</option>
<option value="Latvia" >Latvia</option>
<option value="Lebanon" >Lebanon</option>
<option value="Lesotho" >Lesotho</option>
<option value="Liberia" >Liberia</option>
<option value="Libya" >Libya</option>
<option value="Liechtenstein" >Liechtenstein</option>
<option value="Lithuania" >Lithuania</option>
<option value="Luxembourg" >Luxembourg</option>
<option value="Macedonia" >Macedonia</option>
<option value="Madagascar" >Madagascar</option>
<option value="Malawi" >Malawi</option>
<option value="Malaysia" >Malaysia</option>
<option value="Maldives" >Maldives</option>
<option value="Mali" >Mali</option>
<option value="Malta" >Malta</option>
<option value="Marshall Islands" >Marshall Islands</option>
<option value="Mauritania" >Mauritania</option>
<option value="Mauritius" >Mauritius</option>
<option value="Mexico" >Mexico</option>
<option value="Micronesia" >Micronesia</option>
<option value="Moldova" >Moldova</option>
<option value="Monaco" >Monaco</option>
<option value="Mongolia" >Mongolia</option>
<option value="Montenegro" >Montenegro</option>
<option value="Morocco" >Morocco</option>
<option value="Mozambique" >Mozambique</option>
<option value="Myanmar" >Myanmar</option>
<option value="Namibia" >Namibia</option>
<option value="Nauru" >Nauru</option>
<option value="Nepal" >Nepal</option>
<option value="Netherlands" >Netherlands</option>
<option value="New Zealand" >New Zealand</option>
<option value="Nicaragua" >Nicaragua</option>
<option value="Niger" >Niger</option>
<option value="Nigeria" >Nigeria</option>
<option value="Norway" >Norway</option>
<option value="Oman" >Oman</option>
<option value="Pakistan" >Pakistan</option>
<option value="Palau" >Palau</option>
<option value="Panama" >Panama</option>
<option value="Papua New Guinea" >Papua New Guinea</option>
<option value="Paraguay" >Paraguay</option>
<option value="Peru" >Peru</option>
<option value="Philippines" >Philippines</option>
<option value="Poland" >Poland</option>
<option value="Portugal" >Portugal</option>
<option value="Puerto Rico" >Puerto Rico</option>
<option value="Qatar" >Qatar</option>
<option value="Romania" >Romania</option>
<option value="Russia" >Russia</option>
<option value="Rwanda" >Rwanda</option>
<option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
<option value="Saint Lucia" >Saint Lucia</option>
<option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
<option value="Samoa" >Samoa</option>
<option value="San Marino" >San Marino</option>
<option value="Sao Tome and Principe" >Sao Tome and Principe</option>
<option value="Saudi Arabia" >Saudi Arabia</option>
<option value="Senegal" >Senegal</option>
<option value="Serbia and Montenegro" >Serbia and Montenegro</option>
<option value="Seychelles" >Seychelles</option>
<option value="Sierra Leone" >Sierra Leone</option>
<option value="Singapore" >Singapore</option>
<option value="Slovakia" >Slovakia</option>
<option value="Slovenia" >Slovenia</option>
<option value="Solomon Islands" >Solomon Islands</option>
<option value="Somalia" >Somalia</option>
<option value="South Africa" >South Africa</option>
<option value="Spain" >Spain</option>
<option value="Sri Lanka" selected="selected">Sri Lanka</option>
<option value="Sudan" >Sudan</option>
<option value="Suriname" >Suriname</option>
<option value="Swaziland" >Swaziland</option>
<option value="Sweden" >Sweden</option>
<option value="Switzerland" >Switzerland</option>
<option value="Syria" >Syria</option>
<option value="Taiwan" >Taiwan</option>
<option value="Tajikistan" >Tajikistan</option>
<option value="Tanzania" >Tanzania</option>
<option value="Thailand" >Thailand</option>
<option value="Togo" >Togo</option>
<option value="Tonga" >Tonga</option>
<option value="Trinidad and Tobago" >Trinidad and Tobago</option>
<option value="Tunisia" >Tunisia</option>
<option value="Turkey" >Turkey</option>
<option value="Turkmenistan" >Turkmenistan</option>
<option value="Tuvalu" >Tuvalu</option>
<option value="Uganda" >Uganda</option>
<option value="Ukraine" >Ukraine</option>
<option value="United Arab Emirates" >United Arab Emirates</option>
<option value="United Kingdom" >United Kingdom</option>
<option value="United States" >United States</option>
<option value="Uruguay" >Uruguay</option>
<option value="Uzbekistan" >Uzbekistan</option>
<option value="Vanuatu" >Vanuatu</option>
<option value="Vatican City" >Vatican City</option>
<option value="Venezuela" >Venezuela</option>
<option value="Vietnam" >Vietnam</option>
<option value="Yemen" >Yemen</option>
<option value="Zambia" >Zambia</option>
<option value="Zimbabwe" >Zimbabwe</option>

			</select>
		<label for="element_1_6">Country</label>
	</div>
		</li>







        					<li>
					<label class="description" for="links[]">Telephone</label>
					</li>

					 <div id="dynamicInput">

    				 </div>

    				 <li>
     				<a href="javascript: void(0)" onClick="addInput('dynamicInput');">Click to add Telephone Number</a>
     				</li>



     				<br/><br/>


					<li>

						<span>
							<input type="submit" class="button" value="     Submit     " name="submit" />


						</span>
						<span>


							<input type="reset"  class="button" />
						</span>

					</li>

					</ul>



        </div>

        </form>
        </div>
        </div>

</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<div id="openModal2" class="modalDialog">

<div>

	<div class="form">
		<a href="#close" title="Close" class="close">X</a>

       	 <form id="supplierEditForm" class="form" onsubmit="return editSupplier();">
        	<div class="form_description">
				<h2>Supplier Details</h2>
				<div><p>Click on the edit button to alter the details</p>
<div style="float:right; padding-right:10px;"><a onclick="supplierEditClicked()" onmouseover="" style="cursor: pointer;"><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-151-edit.png" height="25" width="25" /></a></div></div>
			</div>

			<div class="container" style="width:100%;">



						<ul>

							<li>
								<label class="description" for="company">Company Name</label>
        						<div id="companyName"><input id="name" type="text" class="medium text" name="company" required="required" ></div>
<div><input id="supId" type="hidden" name="supId"></div>
        					</li>



							<li>
								<label class="description"for="email">E-mail Address</label>
        						<div id="supplierEmail"><input type="email" class="medium text" name="email" required="required"></div>
        					</li>

        					<li>
		<label class="description" for="element_1">Address </label>
		
		<div id="supplierStreet">
			<input id="street" name="street" class="element text medium"  type="text" required="required">
			<label for="street">Street Address</label>
		</div>

		<div id="supplierLine2">
			<input id="line2" name="line2" class="element text medium" value="" type="text" required="required">
			<label for="line2">Address Line 2</label>
		</div>

		<div class="left" id="supplierCity">
			<input id="city" name="city" class="element text small"  type="text" required="required">
			<label for="city">City</label>
		</div>

		<div class="right" id="supplierProvince">
			<input id="province" name="province" class="element text small"  type="text">
			<label for="province">State / Province / Region</label>
		</div>

		<div class="left" id="supplierPostal">
			<input id="postal" name="postal" class="element text small" maxlength="15"  type="text">
			<label for="postal">Postal / Zip Code</label>
		</div>

		<div class="right" id="supplierCountry">
			<select class="element select small" id="country" name="country" required="required">

<option value="Afghanistan" >Afghanistan</option>
<option value="Albania" >Albania</option>
<option value="Algeria" >Algeria</option>
<option value="Andorra" >Andorra</option>
<option value="Antigua and Barbuda" >Antigua and Barbuda</option>
<option value="Argentina" >Argentina</option>
<option value="Armenia" >Armenia</option>
<option value="Australia" >Australia</option>
<option value="Austria" >Austria</option>
<option value="Azerbaijan" >Azerbaijan</option>
<option value="Bahamas" >Bahamas</option>
<option value="Bahrain" >Bahrain</option>
<option value="Bangladesh" >Bangladesh</option>
<option value="Barbados" >Barbados</option>
<option value="Belarus" >Belarus</option>
<option value="Belgium" >Belgium</option>
<option value="Belize" >Belize</option>
<option value="Benin" >Benin</option>
<option value="Bhutan" >Bhutan</option>
<option value="Bolivia" >Bolivia</option>
<option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
<option value="Botswana" >Botswana</option>
<option value="Brazil" >Brazil</option>
<option value="Brunei" >Brunei</option>
<option value="Bulgaria" >Bulgaria</option>
<option value="Burkina Faso" >Burkina Faso</option>
<option value="Burundi" >Burundi</option>
<option value="Cambodia" >Cambodia</option>
<option value="Cameroon" >Cameroon</option>
<option value="Canada" >Canada</option>
<option value="Cape Verde" >Cape Verde</option>
<option value="Central African Republic" >Central African Republic</option>
<option value="Chad" >Chad</option>
<option value="Chile" >Chile</option>
<option value="China" >China</option>
<option value="Colombia" >Colombia</option>
<option value="Comoros" >Comoros</option>
<option value="Congo" >Congo</option>
<option value="Cook Islands and Niue" >Cook Islands and Niue</option>
<option value="Costa Rica" >Costa Rica</option>
<option value="CÃ´te d'Ivoire" >CÃ´te d'Ivoire</option>
<option value="Croatia" >Croatia</option>
<option value="Cuba" >Cuba</option>
<option value="Cyprus" >Cyprus</option>
<option value="Czech Republic" >Czech Republic</option>
<option value="Denmark" >Denmark</option>
<option value="Djibouti" >Djibouti</option>
<option value="Dominica" >Dominica</option>
<option value="Dominican Republic" >Dominican Republic</option>
<option value="East Timor" >East Timor</option>
<option value="Ecuador" >Ecuador</option>
<option value="Egypt" >Egypt</option>
<option value="El Salvador" >El Salvador</option>
<option value="Equatorial Guinea" >Equatorial Guinea</option>
<option value="Eritrea" >Eritrea</option>
<option value="Estonia" >Estonia</option>
<option value="Ethiopia" >Ethiopia</option>
<option value="Fiji" >Fiji</option>
<option value="Finland" >Finland</option>
<option value="France" >France</option>
<option value="Gabon" >Gabon</option>
<option value="Gambia" >Gambia</option>
<option value="Georgia" >Georgia</option>
<option value="Germany" >Germany</option>
<option value="Ghana" >Ghana</option>
<option value="Greece" >Greece</option>
<option value="Grenada" >Grenada</option>
<option value="Guatemala" >Guatemala</option>
<option value="Guinea" >Guinea</option>
<option value="Guinea-Bissau" >Guinea-Bissau</option>
<option value="Guyana" >Guyana</option>
<option value="Haiti" >Haiti</option>
<option value="Honduras" >Honduras</option>
<option value="Hong Kong" >Hong Kong</option>
<option value="Hungary" >Hungary</option>
<option value="Iceland" >Iceland</option>
<option value="India" >India</option>
<option value="Indonesia" >Indonesia</option>
<option value="Iran" >Iran</option>
<option value="Iraq" >Iraq</option>
<option value="Ireland" >Ireland</option>
<option value="Israel" >Israel</option>
<option value="Italy" >Italy</option>
<option value="Jamaica" >Jamaica</option>
<option value="Japan" >Japan</option>
<option value="Jordan" >Jordan</option>
<option value="Kazakhstan" >Kazakhstan</option>
<option value="Kenya" >Kenya</option>
<option value="Kiribati" >Kiribati</option>
<option value="North Korea" >North Korea</option>
<option value="South Korea" >South Korea</option>
<option value="Kuwait" >Kuwait</option>
<option value="Kyrgyzstan" >Kyrgyzstan</option>
<option value="Laos" >Laos</option>
<option value="Latvia" >Latvia</option>
<option value="Lebanon" >Lebanon</option>
<option value="Lesotho" >Lesotho</option>
<option value="Liberia" >Liberia</option>
<option value="Libya" >Libya</option>
<option value="Liechtenstein" >Liechtenstein</option>
<option value="Lithuania" >Lithuania</option>
<option value="Luxembourg" >Luxembourg</option>
<option value="Macedonia" >Macedonia</option>
<option value="Madagascar" >Madagascar</option>
<option value="Malawi" >Malawi</option>
<option value="Malaysia" >Malaysia</option>
<option value="Maldives" >Maldives</option>
<option value="Mali" >Mali</option>
<option value="Malta" >Malta</option>
<option value="Marshall Islands" >Marshall Islands</option>
<option value="Mauritania" >Mauritania</option>
<option value="Mauritius" >Mauritius</option>
<option value="Mexico" >Mexico</option>
<option value="Micronesia" >Micronesia</option>
<option value="Moldova" >Moldova</option>
<option value="Monaco" >Monaco</option>
<option value="Mongolia" >Mongolia</option>
<option value="Montenegro" >Montenegro</option>
<option value="Morocco" >Morocco</option>
<option value="Mozambique" >Mozambique</option>
<option value="Myanmar" >Myanmar</option>
<option value="Namibia" >Namibia</option>
<option value="Nauru" >Nauru</option>
<option value="Nepal" >Nepal</option>
<option value="Netherlands" >Netherlands</option>
<option value="New Zealand" >New Zealand</option>
<option value="Nicaragua" >Nicaragua</option>
<option value="Niger" >Niger</option>
<option value="Nigeria" >Nigeria</option>
<option value="Norway" >Norway</option>
<option value="Oman" >Oman</option>
<option value="Pakistan" >Pakistan</option>
<option value="Palau" >Palau</option>
<option value="Panama" >Panama</option>
<option value="Papua New Guinea" >Papua New Guinea</option>
<option value="Paraguay" >Paraguay</option>
<option value="Peru" >Peru</option>
<option value="Philippines" >Philippines</option>
<option value="Poland" >Poland</option>
<option value="Portugal" >Portugal</option>
<option value="Puerto Rico" >Puerto Rico</option>
<option value="Qatar" >Qatar</option>
<option value="Romania" >Romania</option>
<option value="Russia" >Russia</option>
<option value="Rwanda" >Rwanda</option>
<option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
<option value="Saint Lucia" >Saint Lucia</option>
<option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
<option value="Samoa" >Samoa</option>
<option value="San Marino" >San Marino</option>
<option value="Sao Tome and Principe" >Sao Tome and Principe</option>
<option value="Saudi Arabia" >Saudi Arabia</option>
<option value="Senegal" >Senegal</option>
<option value="Serbia and Montenegro" >Serbia and Montenegro</option>
<option value="Seychelles" >Seychelles</option>
<option value="Sierra Leone" >Sierra Leone</option>
<option value="Singapore" >Singapore</option>
<option value="Slovakia" >Slovakia</option>
<option value="Slovenia" >Slovenia</option>
<option value="Solomon Islands" >Solomon Islands</option>
<option value="Somalia" >Somalia</option>
<option value="South Africa" >South Africa</option>
<option value="Spain" >Spain</option>
<option value="Sri Lanka" selected="selected">Sri Lanka</option>
<option value="Sudan" >Sudan</option>
<option value="Suriname" >Suriname</option>
<option value="Swaziland" >Swaziland</option>
<option value="Sweden" >Sweden</option>
<option value="Switzerland" >Switzerland</option>
<option value="Syria" >Syria</option>
<option value="Taiwan" >Taiwan</option>
<option value="Tajikistan" >Tajikistan</option>
<option value="Tanzania" >Tanzania</option>
<option value="Thailand" >Thailand</option>
<option value="Togo" >Togo</option>
<option value="Tonga" >Tonga</option>
<option value="Trinidad and Tobago" >Trinidad and Tobago</option>
<option value="Tunisia" >Tunisia</option>
<option value="Turkey" >Turkey</option>
<option value="Turkmenistan" >Turkmenistan</option>
<option value="Tuvalu" >Tuvalu</option>
<option value="Uganda" >Uganda</option>
<option value="Ukraine" >Ukraine</option>
<option value="United Arab Emirates" >United Arab Emirates</option>
<option value="United Kingdom" >United Kingdom</option>
<option value="United States" >United States</option>
<option value="Uruguay" >Uruguay</option>
<option value="Uzbekistan" >Uzbekistan</option>
<option value="Vanuatu" >Vanuatu</option>
<option value="Vatican City" >Vatican City</option>
<option value="Venezuela" >Venezuela</option>
<option value="Vietnam" >Vietnam</option>
<option value="Yemen" >Yemen</option>
<option value="Zambia" >Zambia</option>
<option value="Zimbabwe" >Zimbabwe</option>

			</select>
		<label for="element_1_6">Country</label>
	</div>
		</li>







        					<li>
					<label class="description" for="links[]">Telephone</label>
					</li>

					 <div id="dynamicInputTelephone">

    				 </div>

    				 <li id="addTelephoneNumber">
     				
     				</li>



     				<br/><br/>


					<li id="submitResetBtn">

						<span>
							<input type="submit" class="button" value="     Submit     " name="submit" />


						</span>
						<span>


							<input type="reset"  class="button" />
						</span>

					</li>

					</ul>



        </div>

        </form>
        </div>
        </div>

</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php

    require_once 'core/init.php';


    if(count($_POST) > 0) {



    	$supplier_data = array(

		"company" 	 	=> 	$_POST["company"],
		"email" 		=>	$_POST["email"],
		"street"	 	=>	$_POST["street"],
		"line2"			=>	$_POST["line2"],
		"city" 			=> 	$_POST["city"],
		"province" 		=>  $_POST["province"],
		"postal" 		=>	$_POST["postal"],
		"country" 		=>	$_POST["country"],
		"telephone"		=>	$_POST["links"]

	);

		$_SESSION['form_data'] = $supplier_data;


        header("Location: supplier_registration.php",true,303);
        die();
    }
    else if (isset($_SESSION['form_data'])){




     $new_supplier = new Supplier();
     print_r($_SESSION["form_data"]);
     $new_supplier->create($_SESSION["form_data"]);

			if($new_supplier->register()){

				$message = "You have successfully Registered the Supplier !!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}

			else{


				$message = "The Supplier Registration was unsuccessful.";
				echo "<script type='text/javascript'>alert('$message');</script>";


			}



        unset($_SESSION["form_data"]);

    }

?>

