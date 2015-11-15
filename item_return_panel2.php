<!DOCTYPE html>
<html>
<head>
<title>Item Return Panel 2</title>



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
        <h3>Transaction Details</h3>

        	<div class="datagrid">
        	
        		<?php

				
					 $value=Transaction::searchPendingReturns($_GET["t_id"]);


					
					
						$member=Member::search(["member_id"=>$value->getMemberId()]);
						$name = $member->getInitials()." ".$member->getSurname();
						$tid=$value->getTransactionId();
						$desc=$value->getPurpose();
						$bdate=$value->getBorrowedDate();
						$edate=$value->getExpectedReturnDate();
						$comment=$value->getBorrowComment();


						

				?>
			<table>
			<tr><th>Transaction ID</th><td><?php echo $tid; ?></td></tr>
			<tr><th>Member Name</th><td><?php echo $name; ?></td></tr>
			<tr><th>Transaction Description</th><td><?php echo $desc; ?></td></tr>
			<tr><th>Borrowed Date</th><td><?php echo $bdate; ?></td></tr>
			<tr><th>Expected Return Date</th><td><?php echo $edate; ?></td></tr>
			<tr><th>Comments</th><td><?php echo $comment; ?></td></tr>


			</table>

        	</div>

        	<h3>Borrowed Items</h3>
        	<div class="datagrid">

        	<?php

        			echo "<table>";
					echo "<thead><th>Item Copy No</th><th>Borrowed Quantity</th><th>Return Quantity</th><th>Condition</th><th>Return</th></thead><tbody>";


					$result=$value->getTransactions();
					foreach ($result as $key => $value) {
						$itemCopyId=$value->getItemCopyId();
						$itemCopy=ItemCopy::search(["item_copy_id"=>$itemCopyId]);
						$itemCopyNo = $itemCopy->get_no();
						$bcon=$value->getBorrowedQuantity();
						$rcon=$value->getReturnedQuantity();
						


						echo "<tr><td>$itemCopyNo</td>";
						echo "<td>$bcon</td>";
						echo "<td><input type='number' class='large text' value='$bcon'/></td>";
						echo "<td>";
						echo "<select class='large select' name='condition'>";
						echo "<option value='Working Properly'>Working Properly</option>";
						echo "<option value='Working With defects'>Working With defects</option>";
						echo "<option value='Not Working'>Not Working</option>";

						echo "</select>";
						echo "</td>";
						echo "<td><input type='checkbox' name='returned[]' value='$itemCopyId'/></td></tr>";
						



					}
					echo "</tbody></table>";



						?>

        	</div>
			
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
