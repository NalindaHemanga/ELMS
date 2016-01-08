<?php
	require_once 'core/init.php';

	session_start();

	$logged_user = $_SESSION['logged_in_user'];
	$quary="SELECT * FROM member where member_email='$logged_user'";
	$result = DB::getInstance()->directSelect($quary);
	$nic = $result[0]["member_nic"];
	print_r($result);



?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>
<script type='text/javascript'>
var nic = '<?php echo $nic; ?>';
document.write(nic);
document.getElementById("nic").value=nic; 
</script>


<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>

		<div id="contentwrap">
        <div id="content">


        <div class="form">

       	 <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return checkCheckBoxGroup('m_type[]');" >
        	<div class="form_description">
				<h2>My Profile</h2>
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
        </div>



        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>