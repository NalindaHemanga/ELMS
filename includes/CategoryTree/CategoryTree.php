<link rel="stylesheet" type="text/css" href="css/leftnav.css" />
<link rel="stylesheet" type="text/css" href="css/category_tree.css" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<div id="leftcolumnwrap">
        	<div id="leftcolumn" style="overflow-y:auto;">
		<div id="" >
		<ul class="leftnav">
		<li class="leftnav" ><a class="home" href="home.php"><font color="#b5dfeb" size="4" face="Agency FB">Categories</font></a></li>
		</ul>
				<ol class="tree">
					<?php
					/*me php kellen wenne category tree eka hadenna ona html code eka genarate wena eka*/
					require 'includes/CategoryTree/category_tree.php'; 
					/*category_tree.php eke thiyenne categories monawada kiyala database eken balala ekata anuwa tree ekata enna ona html code tika echo(print) karana "collapseTree" kiyala funtion ekak.*/ 
					
					foreach ($catagories as $catagory6){
						if ($catagory6->get_parent() == (NULL||0)){
						collapseTree($catagory6, $catagories);
						}
					}
					
					?>
					
				</ol>
            
        
		</div>
        </div>
</div>
<script type="text/javascript">
/*menna AJAX. ewa liyanna one javascript tag ekak athule. me karala thiyenne XMLHttpRequest kiyala ekak yawala ekata ena reply eke widihata page eke content division eka update karala.*/
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
 xmlhttp.open("GET", "itemViewer.php?cat_id=" + cat_id, true);
        xmlhttp.send();
}


</script>
