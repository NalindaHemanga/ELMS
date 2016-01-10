<!DOCTYPE html>
<html>
<head>
<title>UCSC-Electronic lab management system</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<script src="lib/jquery.min.js"></script>
<script language="Javascript" type="text/javascript">

	var counter = 0;


	function addInput(divName){



		var newli = document.createElement('li');


		newli.setAttribute('id', counter);
		newli.innerHTML = '<div><input type="text" class="medium text" name="links[]" placeholder=" Paste Link Here" required="required"><a href="javascript: void(0)" onClick="removeInput(\'dynamicInput\',\''+counter+'\');">Remove this Link</a></div>';
		document.getElementById(divName).appendChild(newli);
		counter++;

	}

    function removeInput(divName,liid) {

  		var d = document.getElementById(divName);

  		var li = document.getElementById(liid);

  		d.removeChild(li);

}




</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>

		<div id="contentwrap">
		<div id="catTree">
		<?php include "includes/CategoryTree/CategoryRestricted.php" ?>
        	</div>
		<div id="content">




       	 	</div>
		</div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
