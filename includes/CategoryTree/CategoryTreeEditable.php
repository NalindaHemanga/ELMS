
<link rel="stylesheet" type="text/css" href="css/category_tree.css" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
<link rel="stylesheet" type="text/css" href="css/button.css" />
<div id="subcolumnwrap">
        <div id="treecolumn">
		<div id="coltree" style="overflow-y:auto; height:350px; background: #D7DADB;">
		
		<font size="5" face="Agency FB"><center><strong>Item Categories</strong></center></font>
		
				<ol class="tree">
					<?php
					
					require 'includes/CategoryTree/category_tree_editable.php'; 
					 
					
					foreach ($catagories as $catagory){
						if ($catagory->get_parent() == (NULL||0)){
						collapseTree($catagory, $catagories);
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
</center>
</div>
</div>
            
       		</div>
</div>


<script type="text/javascript">
var cat_ID = 0;
var cat_NAME;
var cat_ID_new_division = "mainCat";

function catCliked(cat_id,name)
{
	loadXMLDoc(cat_id)
	newCatCancel();
	cat_ID = cat_id;
	cat_NAME = name;
	document.getElementById("selectedCatLbl").innerHTML=name;
	cat_ID_new_division = cat_id + ".1"
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
    s+= '<input type="text" id="'+cat_ID_new_division+'name" required="required"/>'; //Create one textbox as HTML
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
	var newCatTxtValue = document.getElementById(newCatTxtId).value
	if(newCatTxtValue!=""){
	var dataString = 'parent1='+ cat_ID + '&cat_name1='+ newCatTxtValue;	
		
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
        var dataString = 'CatId='+ cat_ID + '&cat_name='+ cat_NAME;
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
        var dataString = 'CatId='+ cat_ID + '&edited_cat_name='+ editedCatName;
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
 xmlhttp.open("GET", "itemViewerEditable.php?cat_id=" + cat_id, true);
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



</script>
