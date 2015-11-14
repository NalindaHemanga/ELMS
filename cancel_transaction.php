<?php

require_once 'core/init.php';

		unset($_SESSION["basket"]);
		unset($_SESSION["items"]);

header("location: item_issue_panel1.php");



?>