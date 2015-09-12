<!DOCTYPE html>
<html>
<head>
<title>Template</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

<script language="Javascript" type="text/javascript">
	
	var counter = 0;
	
	
	function addInput(divName){
		
     	
     	
     	     var newli = document.createElement('li');
     	     

 			 newli.setAttribute('id', counter);
      		    newli.innerHTML = '<div><input type="url" class="medium text" name="links[]" placeholder=" Paste Link Here" required="required"><a href="javascript: void(0)" onClick="removeInput(\'dynamicInput\',\''+counter+'\');"> Remove this Link</a></div>';
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
        <div id="content">
			
			
        <div class="form">
       
       	 <form class="form" enctype="multipart/form-data" method="POST" action="form_test.php" >
        	<div class="form_description">
				<h2>Add New Item</h2>
				<p>Use This form to register a new Item</p>
			</div>	
				
			<div class="container" style="width:100%;">
				
				<div class="container" style="width:49%;display:inline-block;">
						
						<ul>
						
							<li>
								<label class="description" for="nic_no">Item Name</label>
        						<div><input type="text" class="large text" name="nic_no" ></div>
        					</li>

        					<li>

        					<label class="description">Item Type</label>
							<span>
									<input name="item_type" class="radio" type="radio" value="non-consumable" checked="checked"/>
										<label class="choice" for="item_type">Non-consumable</label>
									<input name="item_type" class="radio" type="radio" value="consumable" />
										<label class="choice" for="item_type">Consumable</label>
									

							</span> 

							</li>

							<li>
						<label class="description" for="item_desc">Item Description </label>
							<div>
								<textarea name="item_desc" class="small textarea"></textarea> 
						</div> 
					</li>

						<li>
						<label class="description" for="paragraph">Technical Details </label>
							<div>
								<textarea name="item_tec_desc" class="small textarea"></textarea> 
						</div> 
					</li>

					


        			
        				</ul>
				</div>

				<div class="container" style="display:inline-block;width:49%;">
						
						<ul>
							<li>	
								<label class="description">Image of the Item</label>
						
							
									<div>
										<img id="item_pic" src="img/icons/image.png" height="195" width="185" style="border:1px solid #ccc;padding:22px" />
									</div>

									<div>
										<input name="picture" class="file" type="file" accept="image/*" onchange="loadFile(event)" /> 
									</div>

										<script>
 											 var loadFile = function(event) {
    											var reader = new FileReader();
   											 reader.onload = function(){
    										  var output = document.getElementById('item_pic');
     										 output.src = reader.result;
   												 };
   												 reader.readAsDataURL(event.target.files[0]);
  												};
										</script>
						

							</li>


							      				


        				</ul>


				</div>

					<li>
					<label class="description" for="links[]">Reference Links</label>
					</li>
					
					 <div id="dynamicInput">
          				
    				 </div>
    				
    				 <li>
     				<a href="javascript: void(0)" onClick="addInput('dynamicInput');">Click to add Reference Link</a>
     				</li>
				
					<br/><br/>
					<li>
						
						<span>
							<input type="submit" class="button" value="     Submit     " name="submit" />


						</span>
						<span>
							

							<input type="reset"  class="button"/>
						</span>
						
					</li>
        


        </div>

        </form>
        </div>



        </div>
        </div>
		
       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
