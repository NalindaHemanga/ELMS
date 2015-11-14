<?php

require_once 'core/init.php';

if(isset($_SESSION["basket"]))
{
    

}
else{
    header('location: dashboard.php');


}
?>

<!DOCTYPE html>
<html>
<head>
<title>Item Issue Panel 2</title>

<style>
input.item {
    width: 200px;
    height: 20px;
    padding-right: 50px;

}

input.close {
    margin-left: -20px;
    height: 14px;
    width: 14px;
    background:url(img/close_button.png);

    border: 0;
    -webkit-appearance: none;
}
</style>
<link rel="stylesheet" type="text/css" href="css/form.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />
<link rel="stylesheet" type="text/css" href="css/dashboardicon.css" />
<link rel="stylesheet" type="text/css" href="css/itemissue.css" />
<link rel="stylesheet" type="text/css" href="css/modelwindow.css" />
<script src="lib/jquery.min.js"></script>
<script type="text/javascript">

$(document).on("pageload",function(){
  alert("pageload event fired!");
});


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function removeItem(data){


    dataString="copy_no="+data;


        $.ajax({
            type: "GET",
            url: "item_issue_panel2_control.php",
            data: dataString,

            success: function(data) {

                alert(data);
                loadContent();
            }
            });

        var newCount;

    var countNode=document.getElementById("count");
    var count=countNode.textContent;
    if(count=="1"){
        newCount="No";
    }
    else{

        newCount=parseInt(count)-1;
    }
    countNode.innerHTML=newCount;

        
}

function drop(ev) {
    

    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var newli = document.createElement('li');
    var node=document.getElementById(data);
    dataString="copy_no="+data;


        $.ajax({
            type: "GET",
            url: "item_issue_panel2_control.php",
            data: dataString,

            success: function(data) {

                alert(data);
            }
            });

    node.remove();



    newli.setAttribute('id', data+'i');
       newli.innerHTML = '<div><input type="text" class="item" readonly draggable="false" value="'+data+'"name="items[]"/><input id="'+data+'n'+'" type="button" class="close" value="" onclick=\"removeItem(this.id);\"></div>';
        document.getElementById('items').appendChild(newli);








}



function addToBasket(data) {
    
    
    var node=document.getElementById(data);
    
    
    dataString="copy_no="+data;


        $.ajax({
            type: "GET",
            url: "item_issue_panel2_control.php",
            data: dataString,

            success: function(data) {

                alert(data);
            }
            });

    node.remove();
    var newCount;

    var countNode=document.getElementById("count");
    var count=countNode.textContent;
    if(count=="No"){
        newCount=1;
    }
    else{

        newCount=parseInt(count)+1;
    }
    countNode.innerHTML=newCount;


}



function loadContent(){
    $( "#modalContent" ).load("item_basket.php");



}

function closeclick(){
    $('#closelink').get(0).click();
}
</script>






</script>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
		<div id="catTree">
		<?php 

            include 'includes/CategoryTree/CategoryTreeForIssuing.php' ;
            


        ?>


        	</div>
        <div id="content">
            
                <?php 
                    $count=0;
                    if (count($_SESSION["basket"])==0) 
                        $count="No";
                    else
                        $count=count($_SESSION["basket"]);



                ?>
             <label value='0' id="count"><?php  echo $count; ?></label> item/s in the Basket (<a href="#openModal" onclick="loadContent();">View Basket</a>)
             <hr/>

             <div id="sub_content">
                 
             </div>
            

            

           


        
        </div>
        </div>



        <div id="openModal" class="modalDialog">
            
            

            <div id="modalContent">
                
           
            </div>


        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
