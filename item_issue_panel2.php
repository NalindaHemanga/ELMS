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
<script type="text/javascript">
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));

}
</script>






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
            <form>
            <div class="" id="leftpane">
                <div style="position:relative;top:50%;text-align:center;">No Items to be shown !!</div>
            </div>

            <div class="" id="rightpane" ondrop="drop(event)" ondragover="allowDrop(event)">

                    <div style="text-align:center;">Drag and Drop Item copies here to issue</div>
            </div>

            <div class="" id="bottomleft">

            </div>

            <div id="bottomright">
                <div class="" style="text-align:center">
                    <img src="img/icons/trash.png" width="100" height="100" alt="" />
                </div>

            </div>


        </form>
        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
