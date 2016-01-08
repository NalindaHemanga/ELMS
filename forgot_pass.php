<?php

require("core/init.php");

if($_GET['code']){

	$get_email = $_GET['email'];
	$get_code = $_GET['code'];

	/*get database values to given user name*/

	$quary2 = "SELECT * FROM member WHERE member_email='$get_email'";
	$result2 =DB::getInstance()->directSelect($quary2);
	//print_r($result2);


		$db_code = $result2[0]['pass_reset'];
		$db_email = $result2[0]['member_email'];
		

	if($get_email == $db_email && $get_code == $db_code){
		/*password re-set form*/
		echo "
				<html>
				<head>
				</head>
				<body>
					<form action='pass_reset_complete.php?code=$get_code' method='POST'>
						Enter a new password<br><input type='password' name='newpass'><br>
						Re-enter your password<br><input type='password' name='newpass1'><p>
						<input type='hidden' name='username' value='$db_email'>
						<input type='submit' value='Update Password!'>
					</form>
				</body>
				</html>

		";
	}
}


if(!$_GET['code']){

	echo "
		<html>
		<head>
		</head>
		<body>
			<form action='forgot_pass.php' method='POST'>
				Enter your email<br><input type='email' name='email'><p>
				<input type='submit' value='Submit' name='submit'>
			</form>
		</body>
		</html>

	";


	if(isset($_POST['submit'])){

		/*check weather given email exist or not in the database*/
		$email = $_POST['email'];

		$quary="SELECT * FROM member WHERE member_email='$email'";
		$result =DB::getInstance()->directSelect($quary);
		
		if(count($result) == 0){
			echo "Email doesn't match...!";
		}

		else{
			$db_email = $result[0]["member_email"];
		}

		if(count($result) != 0){
			//print_r($result);

			/*send auto genarated code as a email to requested user*/

			if($email == $db_email){

				$code = rand(10000,1000000);

				$to = $db_email;
				$subject = "Password Reset";
				$body ="

					This is an automated email. Please DO NOT reply to this email.

					Click the link below or paste it into your browser

					http://elms.16mb.com/forgot_pass.php?code=$code&email=$email

				";

				$quary1 = "UPDATE member SET pass_reset='$code' WHERE member_email='$email'";
				$result1 = DB::getInstance()->directUpdate($quary1);

				mail($to, $subject, $body);

				echo "<br><br>Check Your Email";
			}

			else{
				echo "Email doesn't match...!";
			}
		}

	}
}

?>