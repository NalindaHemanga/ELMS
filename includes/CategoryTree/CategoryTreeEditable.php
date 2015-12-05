
<link rel="stylesheet" type="text/css" href="css/category_tree.css" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<link rel="stylesheet" type="text/css" href="css/list.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<div id="subcolumnwrap">
        <div id="treecolumn">
		<div id="coltree" style="overflow-y:auto; height:350px; background: #D7DADB;">

		<font size="5" face="Agency FB"><center><strong>Item Categories</strong></center></font>

				<ul class="catList">
               


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
				</ul>
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

function itemCopyClicked(itemCopyId) {

	alert(itemCopyId);

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
	location.href="#openModal"
	
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

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<script src="jquery.min.js"></script>
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
	    //Window.catCliked(cat_label,cat_NAME,cur_cat_id);
	    location.href="#close";


        },
        cache: false,
        contentType: false,
        processData: false
    });
    //location.href="#close";
    return false;
});

</script>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        </div>		

		</div>
	</div>
</div>
