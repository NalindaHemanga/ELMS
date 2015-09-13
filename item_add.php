<?php
  
    require_once 'core/init.php';
  

    if(count($_POST) > 0) {
        
       
		
    	$item_data = array(

		
		"no" 					=>	$_POST["item_no"],
		"name"	 				=> 	$_POST["item_name"],
		"type"					=>	$_POST["item_type"],
		"technical_details" 	=> 	$_POST["item_tec_desc"],
		"description"			=>  $_POST["item_desc"],
		"quantity" 				=>	0,
		"category"				=>  $_POST["category"],
		"reference" 			=>	$_POST["reference"]

	);

    	
    	
    	
    	$temp_path=$_FILES["item_picture"]["tmp_name"];
    	$img_type = pathinfo($_FILES["item_picture"]["name"],PATHINFO_EXTENSION);
    	

    	move_uploaded_file($temp_path, "img/items/" . $_POST["item_no"].".".$img_type);
    	



        $_SESSION['form_data'] = $item_data;

        
        header("Location: item_add.php",true,303);
        die();
    }
    else if (isset($_SESSION['form_data'])){
        

        

     $new_item = new Item();
     $new_item->create($_SESSION["form_data"]);
	
	if($new_item->register()){

		$message = "You have successfully Inserted an Item !!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	} 

	else{
		
		
		$message = "The Item insertion was unsuccessful.";
		echo "<script type='text/javascript'>alert('$message');</script>";	


	}

        

        unset($_SESSION["form_data"]);
        
    }
    
?>





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
      		    newli.innerHTML = '<div><input type="url" class="medium text" name="reference[]" placeholder=" Paste Link Here" required="required"><a href="javascript: void(0)" onClick="removeInput(\'dynamicInput\',\''+counter+'\');"> Remove this Link</a></div>';
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
       
       	 <form class="form" enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
        	<div class="form_description">
				<h2>Add New Item</h2>
				<p>Use This form to register a new Item</p>
			</div>	
				
			<div class="container" style="width:100%;">
				
				<div class="container" style="width:49%;display:inline-block;">
						
						<ul>
						
							<li>
								<label class="description" for="item_no">Item No</label>
        						<div><input type="text" class="large text" name="item_no" ></div>
        					</li>

							<li>
								<label class="description" for="item_name">Item Name</label>
        						<div><input type="text" class="large text" name="item_name" ></div>
        					</li>

        					 <li>
                                <label class="description" for="category">Item Category</label>
                                <select class="element large select" name="category">  
                                    <option value="" selected="selected">Select</option>
                                    <?php
                                    	$categories=Category::getAllCategories();
                                    	foreach ($categories as $key => $value) {
                                    		echo '<option value="'.$value['category_id'].'"\>'.$value['category_name']."</option>";
                                    	}

                                    ?>
                                       
                                </select>
                                
                            </li>

        					

							<li>
						<label class="description" for="item_desc">Item Description </label>
							<div>
								<textarea name="item_desc" class="small textarea"></textarea> 
						</div> 
					</li>

						<li>
						<label class="description" for="item_tec_desc">Technical Details </label>
							<div>
								<textarea name="item_tec_desc" class="small textarea"></textarea> 
						</div> 
					</li>

					


        			
        				</ul>
				</div>

				<div class="container" style="display:inline-block;width:49%;vertical-align:top">
						
						<ul>
						
							<li>	
							
							
								<label class="description">Image of the Item</label>
						
							
									<div>
										<img id="item_pic" src="img/icons/image.png" height="195" width="185" style="border:1px solid #ccc;padding:22px" />
									</div>

									<div>
										<input name="item_picture" class="file" type="file" accept="image/*" onchange="loadFile(event)" /> 
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

        					<label class="description">Item Type</label>
							<span>
									<input name="item_type" class="radio" type="radio" value="1" checked="checked"/>
										<label class="choice" for="item_type">Non-consumable</label>
									<input name="item_type" class="radio" type="radio" value="0" />
										<label class="choice" for="item_type">Consumable</label>
									

							</span> 

							</li>

					<li>
					<label class="description" for="reference[]">Reference Links</label>
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
