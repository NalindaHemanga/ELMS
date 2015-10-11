<!DOCTYPE html>
<html>
<head>
<title>Item Issue Panel 2</title>


<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
<link rel="stylesheet" type="text/css" href="css/itemissue.css" />
<script src="lib/jquery.min.js"></script>






</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
		<div id="catTree">
		<?php include 'includes/CategoryTree/CategoryTreeForIssuing.php' ?>


        	</div>
        <div id="content">
            <div class="" id="leftpane">
                <div style="position:relative;top:50%;text-align:center;">No Items to be shown !!</div>
            </div>

            <div class="" id="rightpane">
                
                    <div style="text-align:center;">Drag and Drop Item copies here to issue</div>
            </div>



        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
