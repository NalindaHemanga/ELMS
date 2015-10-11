
<link rel="stylesheet" type="text/css" href="css/category_tree.css" />

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
						echo "<li class='node'>";
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

		<div style="padding-top:5px;">
<div id="catsetting">
<center>
<font size="4" face="calibri"><center><strong>Search Item Copy</strong></center></font>
<form class="form" onsubmit="return searchItemCopy();" id="searchForm">
				<ul>
				<li>



        				<div><input type="search" class="large text" name="copy_no" id="copy_no" placeholder=" Enter Copy No" required="required"/>  </div>
        		</li>
        		<li>
        				<div><input type="submit" value="Search" /></div>
        			</li>
        			</ul>

        		</form>
</center>
</div>
</div>

</div>
</div>
<script src="lib/jquery.min.js"></script>
<script type="text/javascript">
var cat_label = "0000";
var cat_NAME;
var cat_ID_new_division = "mainCat";
var cur_cat_id;

function catCliked(lable,name,id)
{
	loadXMLDoc(id)

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
    document.getElementById("leftpane").innerHTML=xmlhttp.responseText;
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
    document.getElementById("leftpane").innerHTML=xmlhttp.responseText;
    }
  }
 xmlhttp.open("GET", "getItemDetailsIssue.php?item_id=" + itemId, true);
        xmlhttp.send();
}

function itemCopyClicked(itemCopyId) {

	alert(itemCopyId);

}

function searchItemCopy(){



	var val=document.getElementById("copy_no").value;

	dataString="copy_no="+val;



		$.ajax({
			type: "GET",
			url: "getItemDetailsIssue.php",
			data: dataString,

			success: function(data) {

				$("#leftpane").html(data);
			}
			});



	return false;
}

</script>
