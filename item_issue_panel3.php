
<?php

require_once 'core/init.php';

	$member_role=$_SESSION['roles'];
	
	if(in_array("Laboratory Assistant", $member_role)){

	}else{
		header('location:restricted_page.php');
	}

if(isset($_SESSION["basket"]))
{
	

}
else{
	header('location: dashboard.php');


}



?>

<!DOCTYPE html>
<html>
<head>
<title>Item Checkout</title>


<link rel="stylesheet" type="text/css" href="css/forumtable.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />
<script src="lib/jquery.min.js"></script>
<script>

function loadContent(){

	$( "#modalContent" ).load("item_basket_view.php");
}

function addTransaction(){

		var form=document.getElementById("checkoutForm");

		var dataString = $(form).serialize();
		

		$.ajax({
			type: "POST",
			url: "item_issue_panel3_control.php",
			data: dataString,

			success: function(data) {

			
				
				var content=document.getElementById("content");
				content.innerHTML=data;


			}
			});




		return false;

	}






</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
			<div style="text-align:left;display:inline-block;width:33%">
				<a href="item_issue_panel2.php"><h4> << Edit Item Basket</h4></a>

			</div>
			<div style="text-align:center;display:inline-block;width:33%">
				
			</div>
			<div style="text-align:right;display:inline-block;width:33%">
				<a href="#openModal" onclick="loadContent();"><h4> View Basket</h4></a>
			</div>

		<div class="form">
       
       	 <form class="form" onsubmit="return addTransaction();" id="checkoutForm">


       	 	<div class="form_description">
					<h2>Item Checkout</h2>
					<p>Fill out this form to complete item transaction</p>
				</div>

				<ul>
					
					<li>
						<label class="description" for="member_name">Member Name</label>
        				<div><input type="text" class="medium text" name="member_name" readonly value="<?php echo $_SESSION['member_details']['initials']." ".$_SESSION['member_details']['surname'] ?>"></div>
        			</li>
        			<?php
						$date=date_create(date('Y-m-d'));
						date_add($date,date_interval_create_from_date_string("7 days"));
						
					?>

        			<li>
						<label class="description" for="expected_return_date">Expected Return Date</label>
        				<div><input type="date" class="medium text" name="expected_return_date" value="<?php echo date_format($date,"Y-m-d"); ?>"></div>
        			</li>

        			<li>
						<label class="description" for="purpose">Purpose of issuing</label>
							<div>
								<textarea name="purpose" class="small textarea" required="required"></textarea> 
						</div> 
					</li>
        			

					<li>
						<label class="description" for="comments">Comments</label>
							<div>
								<textarea name="comments" class="small textarea"></textarea> 
						</div> 
					</li>

					<li>

						<span>
							<input type="submit" class="button" value="     Checkout     " name="submit" />


						</span>
						

					</li>

						

				</ul>





       	 </form>
       	 </div>


			
        </div>
        </div>

        <div id="openModal" class="modalDialog">
            
            

            <div id="modalContent">
                
           
            </div>


        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>



<div id='success' class="modalDialog">

</div>

<div id='error' class="modalDialog">
</div>
