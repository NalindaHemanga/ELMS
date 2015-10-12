<!DOCTYPE html>
<html>
<head>
<title>Member_Search</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
<link rel="stylesheet" type="text/css" href="css/font.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

</head>
<body>


		
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>

		<div id="contentwrap">
        <div id="content">

                	<div class="form">

            			<form class="form" method="POST" action="member_search_display.php" >

            					<msf style="margin-left:200px;">MEMBER  SEARCH</msf>

            					<div style="height: 120px"></div>



                				<div style="margin-left:30px"><label class="description" for="nic_no"><msf1>ENTER NIC HERE</msf1></label>
                    				<input id="nic_no" name="nic_no" type="search" size="70"  style="margin-left:170px">
               					</div>
 
            

								<div style="height: 165px"></div>



                 				<div style="margin-left:450px">
                 					
                                    <span>
                            		<input type="submit" class="button" value="     Submit     " name="submit" />
                                    </span>
                                    

                                    <span>
                                    <input type="Button" id="Button" class="button"     value="     Back     " name="Back"   onclick=# />
                                
                                              <script type="text/javascript">
                                    
                                                document.getElementById("Button").onclick = function () {   // This javascript function acts as an onclick function that redirects to the given php file or url
                                                location.href = "user_manager_dashboard.php"; };                       // Button should be given an id so that function can be attached to that id
                                              </script>
                            		</span>
								</div>




            			</form>
        
        		</div>
        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>