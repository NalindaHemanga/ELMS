<?php

	

require_once 'core/init.php';





?>


<!DOCTYPE html>
<html>
<head>
<title>Item Return Panel</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">

			<div  style="width:50%;display:inline-block;vertical-align:top;">
			<ul style="list-style-type:none;">
			<li>
			<font face="Agency FB" color="black" size="6px" ><Strong>Item Return Panel</Strong></font>
			</li>
			<li>
			Pending Returns
			</li>
			</ul>
			</div>

			<div style="width:50%;display:inline-block;vertical-align:top;float:right" >
				<form class="form" id="searchForm"  method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
				<ul>
				<li>

        				<div>

        				<div><input type="search" class="medium text" name="searchVal" id="searchVal" placeholder=" Search Member By NIC" required="required" pattern="[0-9]{9}" title="Enter NIC number without the character at the end"/>  <input type="Submit" value="Search" name="Search"/></div>
        			</li>
        			</ul>

        		</form>

			</div>
			<hr/>

			<div id="result" class='datagrid'>

			<?php

				if(isset($_POST["Search"])){
					 echo "post";

				}

				else{

					$result=Transaction::getPendingReturns();


					echo "<table>";
					echo "<thead><th>Transaction ID</th><th>Description</th><th>Borrowed Date</th><th>Expected Return Date</th><th>Member Name</th></thead><tbody>";
					foreach ($result as $key => $value) {
						$member=Member::search(["member_id"=>$value->getMemberId()]);
						$name = $member->getInitials()." ".$member->getSurname();
						$tid=$value->getTransactionId();

						echo "<tr><td>$tid</td>";
						echo "<td>$name</td>";
						echo "<td>$name</td>";
						echo "<td>$name</td>";
						echo "<td>$name</td></tr>";
						



					}
					echo "</tbody></table>";

					


				}



			?>



			</div>



        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
