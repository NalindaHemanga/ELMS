
<html>

<head>
	
	<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
	<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
</head>

<body>

<a href="#openModal">Open Modal</a>
<input type="text"/>

<div id="openModal" class="modalDialog">

<div>

	<div class="form">
		<a href="#close" title="Close" class="close">X</a>
       
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

						<span>
							<input type="submit" class="button" value="      SUBMIT      " />


						</span>
						<span>
							

							<input type="reset"  class="button"/>
						</span>

					</li>


        		</ul>
        

        </form>
        </div>
        </div>

</div>

</body>

</html>