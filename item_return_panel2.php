<!DOCTYPE html>
<html>
<head>
<title>Item Return Panel 2</title>


<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/forumtable.css" />

<style>
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 75px;
  cursor: pointer;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before,
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '';
  position: absolute;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  left:0; top: -3px;
  width: 130px; height: 20px;
  background: #DDDDDD;
  border-radius: 15px;
  transition: background-color .2s;
}
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  width: 10px; height: 10px;
  transition: all .2s;
  border-radius: 50%;
  background: #7F8C9A;
  top: 2px; left: 5px;
}

/* on checked */
[type="checkbox"]:checked + label:before {
  background:#34495E; 
}
[type="checkbox"]:checked + label:after {
  background: #39D2B4;
  top: 2px; left: 115px;
}

[type="checkbox"]:checked + label .ui,
[type="checkbox"]:not(:checked) + label .ui:before,
[type="checkbox"]:checked + label .ui:after {
  position: absolute;
  left: 6px;
  width: 100px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  transition: all .2s;
}
[type="checkbox"]:not(:checked) + label .ui:before {
  content: "Not Returned";
  left: 32px
}
[type="checkbox"]:checked + label .ui:after {
  content: "Returned";
  color: #39D2B4;
}
[type="checkbox"]:focus + label:before {
  border: 1px dashed #777;
  box-sizing: border-box;
  margin-top: -1px;
}



</style>

<script type="text/javascript">
  
function changeSelect(idn){

  var selectEle=document.getElementById(idn+idn);
  var checkboxEle=document.getElementById(idn);
  if(checkboxEle.checked){
    selectEle.disabled=false;
  }else{
    selectEle.options[0].selected="selected";
    selectEle.disabled=true;
  }


}



</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
        <form action="item_return_panel2_control.php" method="post">
        <h3>Transaction Details</h3>

        	<div class="datagrid">
        	
        		<?php

				
					 $value=Transaction::searchPendingReturns($_GET["t_id"]);


					
					
						$member=Member::search(["member_id"=>$value->getMemberId()]);
						$name = $member->getInitials()." ".$member->getSurname();
            $nic= $member->getNicNo();
						$tid=$value->getTransactionId();
						$desc=$value->getPurpose();
						$bdate=$value->getBorrowedDate();
						$edate=$value->getExpectedReturnDate();
						$bcomment=$value->getBorrowComment();
						$rcomment=$value->getReturnComment();


						

				?>
			<table>
			<tr><th>Transaction ID</th><td><?php echo $tid; ?></td></tr>
			<tr><th>Member Name</th><td><?php echo $name; ?></td></tr>
			<tr><th>Transaction Description</th><td><?php echo $desc; ?></td></tr>
			<tr><th>Borrowed Date</th><td><?php echo $bdate; ?></td></tr>
			<tr><th>Expected Return Date</th><td><?php echo $edate; ?></td></tr>
			<tr><th>Comments</th><td><?php echo $bcomment; ?></td></tr>


			</table>

        	</div>
          <input hidden name="condition[]">
          <input hidden name="returned[]">
        	<h3>Borrowed Items</h3>
        	<div class="datagrid">

        	<?php

        			echo "<table>";
					echo "<thead><th>Item Copy No</th><th>Return Status</th><th>Condition/Status</th></thead><tbody>";


					$result=$value->getTransactions();
					foreach ($result as $key => $value) {
						$itemCopyId=$value->getItemCopyId();
						$itemCopy=ItemCopy::search(["item_copy_id"=>$itemCopyId]);
						$itemCopyNo = $itemCopy->get_no();
						$bcon=$value->getBorrowedQuantity();
						$rcon=$value->getReturnedQuantity();
					   $k=$itemCopyId.$itemCopyId;
						


						echo "<tr><td>$itemCopyNo</td>";
						//echo "<td>$bcon</td>";
						//echo "<td><input type='number' class='large text' value='$bcon'/></td>";
            echo "<td><input onclick='changeSelect(this.id);' type='checkbox' name='returned[]' value='$itemCopyId' id='$itemCopyId'/><label for='$itemCopyId'><span class='ui'></span></label></td>";
						echo "<td>";
						echo "<select class='large select' disabled='disabled' id='$k' name='condition[]' required='required'>";
            echo "<option value='' selected='selected'>Select</option>";
						echo "<option value='Working Properly'>Working Properly</option>";
						echo "<option value='Working With defects'>Working With defects</option>";
						echo "<option value='Not Working'>Not Working</option>";
            echo "<option value='Misplaced'>Misplaced</option>";

						echo "</select>";
						echo "</td></tr>";
						
						



					}
					echo "</tbody></table>";



						?>
            </div>
            <br/>
            <label>Comments</label>
          <textarea name="comment" class="small textarea"><?php echo $rcomment; ?></textarea> <br/>

        	<input name="tid" hidden value="<?php echo $_GET["t_id"]?>">

        	<h3>Remarks</h3>
        	
        	        	<label>User Remark</label><br/>
        	<select name="remark" required="required" class='medium select'>
            <option value="" selected="selected">Select</option>
        		<option value="Borrow Allowed" >Borrow Allowed</option>
        		<option value="Borrow Disallowed">Borrow Disallowed</option>
        	</select>
        	<br/><br/>
        	<a href="#openModal">View Transaction History</a>

          <?php

          echo "<div id='openModal' class='modalDialog'>";

echo "<div>";

  echo "<div class='form'>";
    echo "<a href='#close' title='Close' class='close'>X</a>";

       

       $records=Transaction::getHistory($nic,100);
    echo "<div class='datagrid'>";
    echo "<table border='1px' padding='2px'>";
    echo "<thead><tr><th>Item Copy No</th><th>Item Name</th><th>Borrowed Date</th><th>Returned Date</th><th>Comments</th></tr></thead>";
    foreach ($records as $key => $value) {
      echo "<tbody><tr><td>".$value["item_copy_no"]."</td><td>".$value["item_name"]."<td>".$value["borrowed_date"]."</td>"."<td>".$value["returned_date"]."</td>"."<td>".$value["return_comment"]."</td></tr></tbody>";
    }



    echo "</table>";

    echo "</div>";


       
       echo "</div>";
       echo "</div>";

echo "</div>";

          ?>

        	<br/><br/>

        	<input type="submit" class="button" value="     Complete Return     " name="submit" />
        	
        	
			</form>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
