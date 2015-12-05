
<link rel="stylesheet" type="text/css" href="css/category_tree.css" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<link rel="stylesheet" type="text/css" href="css/list.css" />
<div id="subcolumnwrap">
        <div id="treecolumn">
		<div id="coltree" style="overflow-y:auto; height:350px; background: #D7DADB;">

		<font size="5" face="Agency FB"><center><strong>Item Categories</strong></center></font>

				<ol class="catList">



					<?php
						require_once 'core/init.php';

						$categoryStruct = Category::getCatList();

						foreach ($categoryStruct as $mcat1){
						//echo "1";
						foreach ($mcat1 as $mcat2){
						$Cur_label=$mcat2->get_label();
						$name=$mcat2->get_name();
						$Cur_id=$mcat2->get_id();
						//if(is_object($mcat2)){echo"%%";}
						//echo"$id ";
						echo "<li class='catList' id=$Cur_label onclick=catCliked('".$Cur_label."','".$name."','".$Cur_id."')>";
						echo "<a for=$Cur_label href='#'>$name</a>";
						echo "</li>";
						echo "<div id=$Cur_label.1>";
						echo "</div>";
							}
						}

					?>
					<div id="mainCat">

					</div>
				</ol>
		</div>
<div style="padding-top:5px;">
<div id="catsetting">
<center>
<font size="4" face="calibri"><center><strong>Category Editor</strong></center></font>
<div id="selectedCatLbl">Please Select a Category</div>


<div id="addNewCat">
<a class="button icon chat" id="addNewCat" onclick="addNewCat();"><span>Add new</span></a>
</div>

<div id= "dltCat">

<a class="button icon chat" disabled><span>Delete</span></a>
</div>

<div id= "editCat">
<a class="button icon chat"><span>Edit</span></a>
</div>


<div id= "submitCat">

</div>

<div >

<div style="float: left; padding-left:50px;">
<a href="#" style="font-family: Georgia, serif; font-size:15px; float: none;" onclick = "showCatMatrix()";>Show category matrix</a>

</div>
</center>
</div>
</div>

       		</div>
</div>


<script type="text/javascript">
var cat_label = "0000";
var cat_NAME;
var cat_ID_new_division = "mainCat";
var cur_cat_id;
var item_Id;

function catCliked(lable,name,id)
{ 
	loadXMLDoc(id);
	newCatCancel();
	cat_label = lable;
	cat_NAME = name;
	cur_cat_id = id;
	document.getElementById("selectedCatLbl").innerHTML=name;
	cat_ID_new_division = lable + ".1"
	var w= "";
	w+= '<a class="button icon chat" id="dltCatBtn" onclick="deleteCat()"><span>Delete</span></a>';
	document.getElementById("dltCat").innerHTML=w;
	var x= "";
	x+= '<a class="button icon chat" id="editCatBtn" onclick="editCat()"><span>Edit</span></a>';
	document.getElementById("editCat").innerHTML=x;
	document.getElementById("editCatTxt").innerHTML="";
}

function addNewCat()
{
    var s= "";
    s+= '<input type="text" id="'+cat_ID_new_division+'name" required="required">'; //Create one textbox as HTML
    document.getElementById(cat_ID_new_division).innerHTML=s;
	var t= "";
	t+= '<a class="button icon chat" id="submit_cat" onclick="submitNewCat()"><span>Add</span></a>';
	document.getElementById("submitCat").innerHTML=t;
	var u= "";
	u+= '<a class="button icon chat" id="addNewCat" onclick="newCatCancel()"><span>Cancel</span></a>';
	document.getElementById("addNewCat").innerHTML=u;
	document.getElementById("dltCat").innerHTML="";
	document.getElementById("editCat").innerHTML="";
}

function submitNewCat()
{
	var newCatTxtId = cat_ID_new_division+"name";
	var newCatTxtValue = document.getElementById(newCatTxtId).value;
	if(newCatTxtValue!=""){
	var dataString ='cat_name1='+ newCatTxtValue;

$.ajax({
type: "POST",
url: "submit_cat.php",
data: dataString,
cache: false,
success: function(result){
alert(result);}
});
setTimeout(function(){reloadpg();},100);

}

}

function newCatCancel()
{
	document.getElementById(cat_ID_new_division).innerHTML="";
	document.getElementById("submitCat").innerHTML="";
	var v= "";
	v+= '<a class="button icon chat" id="addNewCat" onclick="addNewCat()"><span>Add New</span></a>';
	document.getElementById("addNewCat").innerHTML=v;
}

function deleteCat()
{
    if (confirm("Are you sure that you want to delete this category? " + cat_NAME) == true) {
        var dataString = 'CatLabel='+ cat_label + '&cat_name='+ cat_NAME;
	$.ajax({
	type: "POST",
	url: "delete_cat.php",
	data: dataString,
	cache: false,
	success: function(result){
	}
	});
	setTimeout(function(){reloadpg();},100);
    } else {

    }
}

function editCat()
{
    var y= "";
    y+= '<input type="text" name="editCatName" id="editCatNameTxtbx" value="'+cat_NAME+'"required>'; //Create one textbox as HTML
    document.getElementById("selectedCatLbl").innerHTML=y;
    document.getElementById("editCat").innerHTML='<a class="button icon chat" id="doneEditCatBtn" onclick="submitEditedCat()"><span>Done</span></a>';
    document.getElementById("addNewCat").innerHTML='<a class="button icon chat" disabled><span>Add new</span></a>';
    document.getElementById("dltCat").innerHTML='<a class="button icon chat" disabled><span>Delete</span></a>';
}

function submitEditedCat()
{
    if (confirm("Are you sure that you want to change the category " + cat_NAME + "?") == true) {
	var editedCatName = document.getElementById("editCatNameTxtbx").value;
        var dataString = 'CatLabel='+ cat_label + '&edited_cat_name='+ editedCatName;
	$.ajax({
	type: "POST",
	url: "edit_cat.php",
	data: dataString,
	cache: false,
	success: function(result){
	}
	});
	setTimeout(function(){reloadpg();},100);
    } else {

    }
}

function reloadpg()
{
location.reload();
}

function addItemForm()
{
	var send = "addItemUI.php?cat_id="+cat_ID+"&cat_name="+cat_NAME;
	window.location = send;

}


function loadXMLDoc(cat_id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "itemViewer.php?cat_id=" + cat_id + "&editable=" + 1, true);
        xmlhttp.send();

}


function addItemSubmit() {
var nic_no = document.getElementById("nic_no").value;
var item_type = document.getElementById("item_type").value;
var item_desc = document.getElementById("item_desc").value;
var item_tec_desc = document.getElementById("item_tec_desc").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = "nic_no1=" + nic_no + "&item_type1=" + item_type + "&item_desc1=" + item_desc + "&item_tec_desc1=" + item_tec_desc;

// AJAX code to submit form.
$.ajax({
type: "POST",
url: "submit_item.php",
data: dataString,
cache: false,
success: function(html) {
alert(html);
}
});

return false;
}


function itemClicked(itemId) {

item_Id = itemId;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "getItemDetails.php?item_id=" + itemId + "&cat_label=" + cat_label, true);
        xmlhttp.send();
}

function itemCopyClicked(itemCopyId,itemCopyOwner,itemCopyStatus,itemCopyBarcode,itemCopyPrice,itemCopyInstalledDate,itemCopySupplier,itemCopyNo) {

	document.getElementById("itemCopyNo").innerHTML="  Details on copy "+itemCopyNo;
	document.getElementById("itemCopyOwner").innerHTML="Owner: "+itemCopyOwner;
	document.getElementById("itemCopyStatus").innerHTML="Status: "+itemCopyStatus;
	document.getElementById("itemCopyBarcode").innerHTML="Barcode: "+itemCopyBarcode;
	document.getElementById("itemCopyPrice").innerHTML="Price: "+itemCopyPrice;
	document.getElementById("itemCopyInstalledDate").innerHTML="Installed On: "+itemCopyInstalledDate;
	document.getElementById("itemCopySupplier").innerHTML="Supplier: "+itemCopySupplier;
	//document.getElementById("itemCopyEditBtn").innerHTML="Supplier: ";
	location.href="#openModal4";

}


function itemCopyDelete(itemCopyId) {

    if (confirm("Are you sure that you want to delete this item Copy? ") == true) {
        var dataString = 'itemCopyId='+ itemCopyId;
	$.ajax({
	type: "POST",
	url: "delete_item_copy.php",
	data: dataString,
	cache: false,
	success: function(result){
	itemClicked(item_Id);	
	}
	});
	//setTimeout(function(){reloadpg();},100);
    } else {

    }
}


function itemDelete(itemId) {

    if (confirm("Are you sure that you want to delete this item? ") == true) {
        var dataString = 'itemId='+ itemId;
	$.ajax({
	type: "POST",
	url: "delete_item.php",
	data: dataString,
	cache: false,
	success: function(result){
	alert(result);
	catCliked(cat_lable,cat_NAME,cur_cat_id);	
	}
	});
	//setTimeout(function(){reloadpg();},100);
    } else {

    }
}


function showCatMatrix(){

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "showCatMatrix.php", true);
        xmlhttp.send();
}

function cellClicked(itemId,catLabel) {

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "getItemDetails.php?item_id=" + itemId + "&cat_label=" + catLabel, true);
        xmlhttp.send();
}

function addItemClicked(cat_id) {

	//loadOpenModel(cat_id);
	document.getElementById("Modal_h2").innerHTML= "Add new item to "+cat_NAME;
	document.getElementById("categoryNo").value=cat_label;
	document.getElementById("categoryId").value=cur_cat_id;
	//show open model
	location.href="#openModal";
//setTimeout(function(){location.href="#openModal2";},5000);
	//location.href="#openModal2"
	
}

function loadOpenModel(cat_id){

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("modalContent").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "item_add.php?cat_id=" + cat_id + "&cat_name=" + cat_NAME + "&cat_no" + cat_label, true);
        xmlhttp.send();
}


var counter = 0;
function addInput(divName){

	var newli = document.createElement('li');
	newli.setAttribute('id', counter);
	newli.innerHTML = '<div><input type="url" class="medium text" name="reference[]" placeholder=" Paste Link Here" required="required"><a 		href="javascript: void(0)" onClick="removeInput(\'dynamicInput\',\''+counter+'\');"> Remove this Link</a></div>';
	document.getElementById(divName).appendChild(newli);
	counter++;
}

function removeInput(divName,liid) {

  	var d = document.getElementById(divName);
	var li = document.getElementById(liid);
	d.removeChild(li);

}

  /* function CallAlert()

    {

        alert("This is parent window's alert function.");

    }*/

function AddItemCopyClicked(item_id,itemName){

	var itemNameSet = itemName.replace("%19", " ");
	document.getElementById("itemId").value=item_id;
	document.getElementById("itemName").value=itemNameSet;
	location.href="#openModal2"

	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>


<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<div id = "modalContent">

        <div class="form">

       	 <form class="form" enctype="multipart/form-data" id="data" method="post">
        	<div class="form_description">
				<h2 id="Modal_h2"></h2>
				<p>Use This form to register a new Item</p>
			</div>

			<div class="container" style="width:100%;">

				<div class="container" style="width:49%;display:inline-block;">

						<ul>



							<li>
								<label class="description" for="item_name">Item Name</label>
        						<div><input type="text" class="large text" name="item_name" required="required"></div>
        					</li>




							<li>
						<label class="description" for="item_desc">Item Description </label>
							<div>
								<textarea name="item_desc" class="small textarea"></textarea>
								<input type="hidden" name="categoryNo" id="categoryNo" >
								<input type="hidden" name="categoryId" id="categoryId" >
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
									<input name="item_type" class="radio" type="radio" value="1" checked="checked" />
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
							<input type="submit" class="button" value="Submit" name="submit" />


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
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!--<script src="jquery.min.js"></script>-->
<script type="text/javascript">

$("form#data").submit(function(){

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: "item_add.php",
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            alert(data);
//alert(x); 
//window.opener.CallAlert();
	    //location.reload();
	    document.getElementById("data").reset();
	    location.href="#close";
	    catCliked(cat_label,cat_NAME,cur_cat_id);


        },
        cache: false,
        contentType: false,
        processData: false
    });
    //location.href="#close";
    return false;
});

</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- ///////////////////////////////////////--------openModal2-----////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div id="openModal2" class="modalDialog">
	<div>
		<a href="#close2" title="Close" class="close">X</a>
		<div id = "modalContent2">

        <div class="form">

<script  type="text/javascript">


</script>


<form class="form" id="data2" enctype="multipart/form-data" method="POST" >
        	<div class="form_description">
				<h2>Item Copy Registration -  Name</h2>
				<p>Use This form to register an Item Copy into Name</p>
			</div>

			<div class="container" style="width:100%;">

				<div class="container" style="width:49%;display:inline-block;">

						<ul>

							<!--<li>
								<label class="description" for="item_no">Item No</label>
        						<div><input type="text" class="large text" name="item_no" required="required" ></div>
        					</li> -->




        					<li>

        					<label class="description">Copy Owner</label>
							<span>
									<input name="copy_owner" class="radio" type="radio" value="1" checked="checked"/>
										<label class="choice" for="copy_owner">Electronic Laboratory</label>
									<input name="copy_owner" class="radio" type="radio" value="0" />
										<label class="choice" for="copy_owner">SCORE Laboratory</label>


							</span>

							</li>

						    <li>
								<input type="hidden" name="itemId" id="itemId" >
								<input type="hidden" name="itemName" id="itemName" >

								<label class="description" for="item_c_barcode">Barcode</label>
        						<div><input type="text" class="large text" name="barcode" ></div>
        					</li>
                            <li>
								<label class="description" for="item_unit_price">Unit Price</label>
        						<div><input type="text" class="large text" name="price" ></div>
        					</li>
                            <li>
                                <label class="description" for="supplier">Supplier ( <a onclick=addNewSup(); ><font color="blue">Add New</font></a> )</label>

                                <select class="element large select" id="supplier_dropdown" name="supplier">
                                    <option value="" selected="selected" required="required">Select</option>
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
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!--<script src="jquery.min.js"></script>-->
<script type="text/javascript">

$("form#data2").submit(function(){

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: "item_copy_add.php",
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            alert(data);
//alert(x); 
//window.opener.CallAlert();
	    //location.reload();
	    document.getElementById("data2").reset();
	    location.href="#close2";

        },
        cache: false,
        contentType: false,
        processData: false
    });
    //location.href="#close";
    return false;
});

function addNewSup(){

	location.href="#close2";
	location.href="#openModal3";

	}

</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



<!-- ///////////////////////////////////////--------openModal3-----/////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div id="openModal3" class="modalDialog">

<div>

	<div class="form">
		<a onclick=closeModal3(); title="Close" class="close">X</a>

       	 <form id="supplierForm" class="form" onsubmit="return registerSupplier();">
        	<div class="form_description">
				<h2>Supplier Registration</h2>
				<p>Use This form to register a new supplier</p>
			</div>

			<div class="container" style="width:100%;">



						<ul>

							<li>
								<label class="description" for="company">Company Name</label>
        						<div><input id="name" type="text" class="medium text" name="company" required="required" ></div>
        					</li>



							<li>
								<label class="description"for="email">E-mail Address</label>
        						<div><input type="email" class="medium text" name="email" required="required"></div>
        					</li>

        					<li>
		<label class="description" for="element_1">Address </label>

		<div>
			<input id="street" name="street" class="element text medium"  type="text" required="required">
			<label for="street">Street Address</label>
		</div>

		<div>
			<input id="line2" name="line2" class="element text medium" value="" type="text" required="required">
			<label for="line2">Address Line 2</label>
		</div>

		<div class="left">
			<input id="city" name="city" class="element text small"  type="text" required="required">
			<label for="city">City</label>
		</div>

		<div class="right">
			<input id="province" name="province" class="element text small"  type="text">
			<label for="province">State / Province / Region</label>
		</div>

		<div class="left">
			<input id="postal" name="postal" class="element text small" maxlength="15"  type="text">
			<label for="postal">Postal / Zip Code</label>
		</div>

		<div class="right">
			<select class="element select small" id="country" name="country" required="required">

<option value="Afghanistan" >Afghanistan</option>
<option value="Albania" >Albania</option>
<option value="Algeria" >Algeria</option>
<option value="Andorra" >Andorra</option>
<option value="Antigua and Barbuda" >Antigua and Barbuda</option>
<option value="Argentina" >Argentina</option>
<option value="Armenia" >Armenia</option>
<option value="Australia" >Australia</option>
<option value="Austria" >Austria</option>
<option value="Azerbaijan" >Azerbaijan</option>
<option value="Bahamas" >Bahamas</option>
<option value="Bahrain" >Bahrain</option>
<option value="Bangladesh" >Bangladesh</option>
<option value="Barbados" >Barbados</option>
<option value="Belarus" >Belarus</option>
<option value="Belgium" >Belgium</option>
<option value="Belize" >Belize</option>
<option value="Benin" >Benin</option>
<option value="Bhutan" >Bhutan</option>
<option value="Bolivia" >Bolivia</option>
<option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
<option value="Botswana" >Botswana</option>
<option value="Brazil" >Brazil</option>
<option value="Brunei" >Brunei</option>
<option value="Bulgaria" >Bulgaria</option>
<option value="Burkina Faso" >Burkina Faso</option>
<option value="Burundi" >Burundi</option>
<option value="Cambodia" >Cambodia</option>
<option value="Cameroon" >Cameroon</option>
<option value="Canada" >Canada</option>
<option value="Cape Verde" >Cape Verde</option>
<option value="Central African Republic" >Central African Republic</option>
<option value="Chad" >Chad</option>
<option value="Chile" >Chile</option>
<option value="China" >China</option>
<option value="Colombia" >Colombia</option>
<option value="Comoros" >Comoros</option>
<option value="Congo" >Congo</option>
<option value="Cook Islands and Niue" >Cook Islands and Niue</option>
<option value="Costa Rica" >Costa Rica</option>
<option value="CÃ´te d'Ivoire" >CÃ´te d'Ivoire</option>
<option value="Croatia" >Croatia</option>
<option value="Cuba" >Cuba</option>
<option value="Cyprus" >Cyprus</option>
<option value="Czech Republic" >Czech Republic</option>
<option value="Denmark" >Denmark</option>
<option value="Djibouti" >Djibouti</option>
<option value="Dominica" >Dominica</option>
<option value="Dominican Republic" >Dominican Republic</option>
<option value="East Timor" >East Timor</option>
<option value="Ecuador" >Ecuador</option>
<option value="Egypt" >Egypt</option>
<option value="El Salvador" >El Salvador</option>
<option value="Equatorial Guinea" >Equatorial Guinea</option>
<option value="Eritrea" >Eritrea</option>
<option value="Estonia" >Estonia</option>
<option value="Ethiopia" >Ethiopia</option>
<option value="Fiji" >Fiji</option>
<option value="Finland" >Finland</option>
<option value="France" >France</option>
<option value="Gabon" >Gabon</option>
<option value="Gambia" >Gambia</option>
<option value="Georgia" >Georgia</option>
<option value="Germany" >Germany</option>
<option value="Ghana" >Ghana</option>
<option value="Greece" >Greece</option>
<option value="Grenada" >Grenada</option>
<option value="Guatemala" >Guatemala</option>
<option value="Guinea" >Guinea</option>
<option value="Guinea-Bissau" >Guinea-Bissau</option>
<option value="Guyana" >Guyana</option>
<option value="Haiti" >Haiti</option>
<option value="Honduras" >Honduras</option>
<option value="Hong Kong" >Hong Kong</option>
<option value="Hungary" >Hungary</option>
<option value="Iceland" >Iceland</option>
<option value="India" >India</option>
<option value="Indonesia" >Indonesia</option>
<option value="Iran" >Iran</option>
<option value="Iraq" >Iraq</option>
<option value="Ireland" >Ireland</option>
<option value="Israel" >Israel</option>
<option value="Italy" >Italy</option>
<option value="Jamaica" >Jamaica</option>
<option value="Japan" >Japan</option>
<option value="Jordan" >Jordan</option>
<option value="Kazakhstan" >Kazakhstan</option>
<option value="Kenya" >Kenya</option>
<option value="Kiribati" >Kiribati</option>
<option value="North Korea" >North Korea</option>
<option value="South Korea" >South Korea</option>
<option value="Kuwait" >Kuwait</option>
<option value="Kyrgyzstan" >Kyrgyzstan</option>
<option value="Laos" >Laos</option>
<option value="Latvia" >Latvia</option>
<option value="Lebanon" >Lebanon</option>
<option value="Lesotho" >Lesotho</option>
<option value="Liberia" >Liberia</option>
<option value="Libya" >Libya</option>
<option value="Liechtenstein" >Liechtenstein</option>
<option value="Lithuania" >Lithuania</option>
<option value="Luxembourg" >Luxembourg</option>
<option value="Macedonia" >Macedonia</option>
<option value="Madagascar" >Madagascar</option>
<option value="Malawi" >Malawi</option>
<option value="Malaysia" >Malaysia</option>
<option value="Maldives" >Maldives</option>
<option value="Mali" >Mali</option>
<option value="Malta" >Malta</option>
<option value="Marshall Islands" >Marshall Islands</option>
<option value="Mauritania" >Mauritania</option>
<option value="Mauritius" >Mauritius</option>
<option value="Mexico" >Mexico</option>
<option value="Micronesia" >Micronesia</option>
<option value="Moldova" >Moldova</option>
<option value="Monaco" >Monaco</option>
<option value="Mongolia" >Mongolia</option>
<option value="Montenegro" >Montenegro</option>
<option value="Morocco" >Morocco</option>
<option value="Mozambique" >Mozambique</option>
<option value="Myanmar" >Myanmar</option>
<option value="Namibia" >Namibia</option>
<option value="Nauru" >Nauru</option>
<option value="Nepal" >Nepal</option>
<option value="Netherlands" >Netherlands</option>
<option value="New Zealand" >New Zealand</option>
<option value="Nicaragua" >Nicaragua</option>
<option value="Niger" >Niger</option>
<option value="Nigeria" >Nigeria</option>
<option value="Norway" >Norway</option>
<option value="Oman" >Oman</option>
<option value="Pakistan" >Pakistan</option>
<option value="Palau" >Palau</option>
<option value="Panama" >Panama</option>
<option value="Papua New Guinea" >Papua New Guinea</option>
<option value="Paraguay" >Paraguay</option>
<option value="Peru" >Peru</option>
<option value="Philippines" >Philippines</option>
<option value="Poland" >Poland</option>
<option value="Portugal" >Portugal</option>
<option value="Puerto Rico" >Puerto Rico</option>
<option value="Qatar" >Qatar</option>
<option value="Romania" >Romania</option>
<option value="Russia" >Russia</option>
<option value="Rwanda" >Rwanda</option>
<option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
<option value="Saint Lucia" >Saint Lucia</option>
<option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
<option value="Samoa" >Samoa</option>
<option value="San Marino" >San Marino</option>
<option value="Sao Tome and Principe" >Sao Tome and Principe</option>
<option value="Saudi Arabia" >Saudi Arabia</option>
<option value="Senegal" >Senegal</option>
<option value="Serbia and Montenegro" >Serbia and Montenegro</option>
<option value="Seychelles" >Seychelles</option>
<option value="Sierra Leone" >Sierra Leone</option>
<option value="Singapore" >Singapore</option>
<option value="Slovakia" >Slovakia</option>
<option value="Slovenia" >Slovenia</option>
<option value="Solomon Islands" >Solomon Islands</option>
<option value="Somalia" >Somalia</option>
<option value="South Africa" >South Africa</option>
<option value="Spain" >Spain</option>
<option value="Sri Lanka" selected="selected">Sri Lanka</option>
<option value="Sudan" >Sudan</option>
<option value="Suriname" >Suriname</option>
<option value="Swaziland" >Swaziland</option>
<option value="Sweden" >Sweden</option>
<option value="Switzerland" >Switzerland</option>
<option value="Syria" >Syria</option>
<option value="Taiwan" >Taiwan</option>
<option value="Tajikistan" >Tajikistan</option>
<option value="Tanzania" >Tanzania</option>
<option value="Thailand" >Thailand</option>
<option value="Togo" >Togo</option>
<option value="Tonga" >Tonga</option>
<option value="Trinidad and Tobago" >Trinidad and Tobago</option>
<option value="Tunisia" >Tunisia</option>
<option value="Turkey" >Turkey</option>
<option value="Turkmenistan" >Turkmenistan</option>
<option value="Tuvalu" >Tuvalu</option>
<option value="Uganda" >Uganda</option>
<option value="Ukraine" >Ukraine</option>
<option value="United Arab Emirates" >United Arab Emirates</option>
<option value="United Kingdom" >United Kingdom</option>
<option value="United States" >United States</option>
<option value="Uruguay" >Uruguay</option>
<option value="Uzbekistan" >Uzbekistan</option>
<option value="Vanuatu" >Vanuatu</option>
<option value="Vatican City" >Vatican City</option>
<option value="Venezuela" >Venezuela</option>
<option value="Vietnam" >Vietnam</option>
<option value="Yemen" >Yemen</option>
<option value="Zambia" >Zambia</option>
<option value="Zimbabwe" >Zimbabwe</option>

			</select>
		<label for="element_1_6">Country</label>
	</div>
		</li>







        					<li>
					<label class="description" for="links[]">Telephone</label>
					</li>

					 <div id="dynamicInput">

    				 </div>

    				 <li>
     				<a href="javascript: void(0)" onClick="addInput2('dynamicInput');">Click to add Telephone Number</a>
     				</li>



     				<br/><br/>


					<li>

						<span>
							<input type="submit" class="button" value="     Submit     " name="submit"  />


						</span>
						<span>


							<input type="reset"  class="button" />
						</span>

					</li>

					</ul>



        </div>

        </form>
        </div>
        </div>

</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!--<script src="jquery.min.js"></script>-->
<script type="text/javascript">

	var counter = 0;
	

    function addInput2(divName){



        var newli = document.createElement('li');


        newli.setAttribute('id', counter);
        newli.innerHTML = '<div><input type="text" class="medium text" name="tel[]" required="required" pattern="[0-9]{10}"><a href="javascript: void(0)" onClick="removeInput2(\'dynamicInput\',\''+counter+'\');"> Remove </a></div>';
        document.getElementById(divName).appendChild(newli);
        counter++;

    }

    function removeInput2(divName,liid) {

  		var d = document.getElementById(divName);

  		var li = document.getElementById(liid);

  		d.removeChild(li);

}

	function registerSupplier(){

		var form=document.getElementById("supplierForm");

		var dataString = $(form).serialize();


		$.ajax({
			type: "POST",
			url: "remote_supplier_registration.php",
			data: dataString,

			success: function(json_data) {

				form.reset();
				var div=document.getElementById("dynamicInput");
				div.innerHTML="";
				document.getElementsByClassName("close")[0].click();

				var data_array = $.parseJSON(json_data);
				alert(data_array['message']);
				closeModal3();
				$('#supplier_dropdown').append($('<option>', {
       				 	value: data_array["sup_id"],
        				text: data_array["sup_name"],
        				selected:"selected"
   				 }));
			}
			});




		return false;

	}



function closeModal3(){

	//location.href="#close2";
	location.href="#openModal2";

	}

</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!-- ///////////////////////////////////////--------openModal4-----////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div id="openModal4" class="modalDialog">
	<div>
		<a href="#close4" title="Close" class="close">X</a>
		<div id = "modalContent2">

        <div class="form">
		<h3><div id="itemCopyNo"></div></h3>
		
		<ul>
		<li><div id="itemCopyOwner"></div></li><br>
		<li><div id="itemCopyStatus"></div></li><br>
		<li><div id="itemCopyBarcode"></div></li><br>
		<li><div id="itemCopyPrice"></div></li><br>
		<li><div id="itemCopyInstalledDate"></div></li><br>
		<li><div id="itemCopySupplier"></div></li><br>
		</ul>
		<div id="itemCopyEditBtn"></div>

<script  type="text/javascript">


</script>

	</div>
	</div>
	</div>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


