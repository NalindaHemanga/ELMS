<!DOCTYPE html>
<html>
<head>
<title>Item Copy</title>



<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />



</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		
		<div id="contentwrap">
        <div id="content">
			
			
        <div class="form">
       
       	 <form class="form" enctype="multipart/form-data" method="POST" action="#" >
        	<div class="form_description">
				<h2>Item Copy Registration</h2>
				<p>Use This form to register an Item Copy</p>
			</div>	
				
			<div class="container" style="width:100%;">
				
				<div class="container" style="width:49%;display:inline-block;">
						
						<ul>
						
							<li>
								<label class="description" for="item_no">Item No</label>
        						<div><input type="text" class="large text" name="item_no" ></div>
        					</li>

        					 <li>
                                <label class="description" for="cat">Item Category</label>
                                <select class="element large select">  
                                    <option value="" selected="selected">Select</option>
                                    <?php
                                    	$categories=Category::getAllCategories();
                                    	foreach ($categories as $key => $value) {
                                    		echo "<option value=".$value['category_id'].">".$value['category_name']."</option>";
                                    	}

                                    ?>
                                       
                                </select>
                                
                            </li>


        					<li>

        					<label class="description">Copy Owner</label>
							<span>
									<input name="copy_owner" class="radio" type="radio" value="non-consumable" checked="checked"/>
										<label class="choice" for="copy_owner">Electronic Laboratory</label>
									<input name="copy_owner" class="radio" type="radio" value="consumable" />
										<label class="choice" for="copy_owner">SCORE Laboratory</label>
									

							</span> 

							</li>

						    <li>
								<label class="description" for="item_c_barcode">Barcode</label>
        						<div><input type="text" class="large text" name="item_c_barcode" ></div>
        					</li>
                            <li>
								<label class="description" for="item_unit_price">Unit Price</label>
        						<div><input type="text" class="large text" name="item_unit_price" ></div>
        					</li>
                            <li>
                                <label class="description" for="supplier">Supplier</label>
                                <select class="element large select">  
                                    <option value="" selected="selected">Select</option>
                                    <?php
                                    	$suppliers=Supplier::getAllSuppliers();
                                    	foreach ($suppliers as $key => $value) {
                                    		echo "<option value=".$value['supplier_id'].">".$value['supplier_name']."</option>";
                                    	}

                                    ?>
                                       
                                </select>
                                
                            </li>

	
        				</ul>
				</div>
				<br/><br/>
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
