<?php

	require("core/init.php");
	/*save enterd new password to variables*/

	$newpass = $_POST['newpass'];
	$newpass1 = $_POST['newpass1'];
	$post_email = $_POST['username'];
	$code = $_GET['code'];


	if($newpass == $newpass1){

		$salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId';
		$enc_pass  = md5($salt.$newpass);

		//$enc_pass = crypt($newpass);//encrypt password

		/*update database password column to new password*/

		$quary = "UPDATE member SET member_password='$enc_pass' WHERE member_email='$post_email'";
		DB::getInstance()->directUpdate($quary);

		/*reset the database pass_reset column to 0*/
		$quary1 = "UPDATE member SET pass_reset='0' WHERE member_email='$post_email'";
		DB::getInstance()->directUpdate($quary1);


		echo "Your password has been updated.<p><a href='http://elms.16mb.com/login.php'>Click here to go back</a>";

	}
	else{

		echo "Password must match <a href='forgot_pass.php?code=$code&email=$post_email'>Click here to go back</a>";
	}

?>