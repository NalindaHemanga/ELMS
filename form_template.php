<!DOCTYPE html>
<html>
<head>
<title>Template1</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<script src="js/calendar.js"></script>

</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		
		<div id="contentwrap">
        <div id="content">
			
			
        <div class="form">
       
       	 <form class="form" enctype="multipart/form-data" method="POST" >
        		<div class="form_description">
					<h2>Template Form</h2>
					<p>This is your form description</p>
				</div>	
		
				<ul>
					
					<!-- PROFILE PICTURE -->

					<li>	
						<label class="description">Profile Picture</label>
						
							
							<div>
								<img id="pro_pic" src="img/profile_pictures/default.jpg" height="175" width="150"  />
							</div>

							<div>
								<input name="picture" class="file" type="file" accept="image/*" onchange="loadFile(event)" /> 
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

					<!-- Search Box -->

					<li>
						<label class="description"for="textbox">Text</label>
        				<div><input type="search" class="medium text" name="textbox"></div>
        			</li>	
					
					<!-- TEXT BOX -->

					<li>
						<label class="description"for="textbox">Text</label>
        				<div><input type="text" class="medium text" name="textbox"></div>
        			</li>

        			<!-- DROP DOWN -->

        			<li>
						<label class="description" for="dropdown">Drop Down</label>
							<div>
								<select class="medium select" name="dropdown"> 
									
									<option value="0" selected="selected">Select</option>
									<option value="1" >First option</option>
									<option value="2" >Second option</option>
									<option value="3" >Third option</option>

								</select>
							</div> 
					</li>	

					<!-- CHECK BOX -->

					<li>
						<label class="description" for="dropdown">Drop Down</label>
							<div>
								<select class="medium select" name="dropdown"> 
								
									<option value="1" >First option</option>
									<option value="2" >Second option</option>
									<option value="3" >Third option</option>

								</select>
							</div> 
					</li>	

					<li>
						<label class="description">Checkboxes</label>
							<span>
									
									<input  name="first_option" class="checkbox" type="checkbox" value="1" />
										<label class="choice" for="first_option">First option</label>
									<input name="second_option" class="checkbox" type="checkbox" value="1" />
										<label class="choice" for="second_option">Second option</label>
									<input name="third_option" class="checkbox" type="checkbox" value="1" />
										<label class="choice" for="third_option">Third option</label>

							</span> 
					</li>	
        		
					<!-- RADIO BUTTON -->
					
					<li>
						<label class="description">Multiple Choice </label>
							<span>
									<input name="first_option" class="radio" type="radio" value="1" checked="checked"/>
										<label class="choice" for="first_option">First option</label>
									<input name="second_option" class="radio" type="radio" value="2" />
										<label class="choice" for="second_option">Second option</label>
									<input name="third_option" class="radio" type="radio" value="3" />
										<label class="choice" for="third_option">Third option</label>

							</span> 
					</li>	

					<!-- TEXTAREA -->

					<li>
						<label class="description" for="paragraph">Paragraph </label>
							<div>
								<textarea name="paragraph" class="small textarea"></textarea> 
						</div> 
					</li>

					<!-- NAME -->
					
					<li  >
						<label class="description">Name </label>
							<span>
								<input name= "initials" class="text" maxlength="255" size="8" value="" placeholder=" Initials"/>
							</span>
		
							<span>
								<input name= "surname" class="text" maxlength="255" size="14" value="" placeholder=" Surname"/>
							</span> 
					</li>	

					<li>


					<!-- DATE -->

		<li id="li_1" >
		<label class="description" for="element_1">Date </label>
		<span>
			<input id="element_1_1" name="month" class="element text" disabled="disabled" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_1">MM</label>
		</span>
		<span>
			<input id="element_1_2" name="date" class="element text" disabled="disabled" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_2">DD</label>
		</span>
		<span>
	 		<input id="element_1_3" name="year" class="element text" disabled="disabled" size="4" maxlength="4" value="" type="text">
			<label for="element_1_3">YYYY</label>
		</span>
	
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>

						<span>
							<input type="submit" class="button" value="      SUBMIT      " />


						</span>
						<span>
							

							<input type="reset"  class="button"/>
						</span>

					</li>


					<li id="li_1" >
		<label class="description" for="element_1">Address </label>
		
		<div>
			<input id="element_1_1" name="element_1_1" class="element text large" value="" type="text">
			<label for="element_1_1">Street Address</label>
		</div>
	
		<div>
			<input id="element_1_2" name="element_1_2" class="element text large" value="" type="text">
			<label for="element_1_2">Address Line 2</label>
		</div>
	
		<div class="left">
			<input id="element_1_3" name="element_1_3" class="element text medium" value="" type="text">
			<label for="element_1_3">City</label>
		</div>
	
		<div class="right">
			<input id="element_1_4" name="element_1_4" class="element text medium" value="" type="text">
			<label for="element_1_4">State / Province / Region</label>
		</div>
	
		<div class="left">
			<input id="element_1_5" name="element_1_5" class="element text medium" maxlength="15" value="" type="text">
			<label for="element_1_5">Postal / Zip Code</label>
		</div>
	
		<div class="right">
			<select class="element select medium" id="element_1_6" name="element_1_6"> 
			
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



        		</ul>
        		<button style="width:15em;background:#43D14C;">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-191-circle-plus.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> New </font></div></button>
        		<button style="width:10em;">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-17-bin.png" width="13" height="15" /><font face="Calibri" color="black" size="4"> Delete </font></div></button>
        		<button style="width:10em;">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-151-edit.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Edit </font></div></button>
        		<button style="width:10em;">   <div><img src="img/icons/glyphicons_free/glyphicons/png/glyphicons-28-search.png" width="13" height="13" /><font face="Calibri" color="black" size="4"> Search </font></div></button>

        </form>
        </div>



        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
