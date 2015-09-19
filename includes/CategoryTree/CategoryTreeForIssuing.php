
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
						echo "<li>";
						echo "<label for=$Cur_label>".$name."</label> <input type='checkbox' class='check' id=$Cur_label onclick=catCliked('".$Cur_label."','".$name."','".$Cur_id."') />";
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

</div>
</div>

<script type="text/javascript">
var cat_label = "0000";
var cat_NAME;
var cat_ID_new_division = "mainCat";
var cur_cat_id;

function catCliked(lable,name,id)
{
	loadXMLDoc(id)
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



function reloadpg()
{
location.reload();
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
 xmlhttp.open("GET", "itemViewer.php?cat_id=" + cat_id + "&editable=" + 0, true);
        xmlhttp.send();

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
 xmlhttp.open("GET", "getItemDetails.php?item_id=" + itemId, true);
        xmlhttp.send();
}

function itemCopyClicked(itemCopyId) {

	alert(itemCopyId);

}
</script>


