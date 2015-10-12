<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>


<link rel="stylesheet" type="text/css" href="css/edit-schedule-content.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />

    
    <script src="jquery-2.1.4.min.js"></script>
    
    <script>
        var curCourse;
        
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev,course) {
    curCourse = course;
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,id) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
   // ev.target.appendChild(document.getElementById(data));
    document.getElementById(id).value = curCourse;
}
</script>
        
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>
		
		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
            <div id="left">

        	<h2> Edit Fixed Schedule </h2>
            <hr width="700px"><br>
            
            
            
            <table border="1" style="overflow:auto" padding="0" cellspacing="0" id="boxid">
        			
                    <tr>
        				<td><b> Time </b></td>
        				<td><b> Monday </b></td>
        				<td><b> Tuesday </b></td>
        				<td><b> Wednesday </b></td>
        				<td><b> Thursday </b></td>
        				<td><b> Friday </b></td>
                    </tr>
                   
                    <tr>
                        <td>08.00-09.00</td>
                        <td><input  type="text" value="" name="m1"></td>
                        <td><input id="t1" type="text" value="" name="t1" ondrop='drop(event,"t1")' ondragover="allowDrop(event)"></td>
                        <td><input type="text" value="" name="w1" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                        <td><input type="text" value="" name="th1" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                        <td><input type="text" value="" name="f1" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                            
                    </tr>
                    <tr>
                        <td>09.00-10.00</td>
                         <td><input type="text" value=""  name="m2"></td>
                        <td><input type="text" value="" name="t2"></td>
                        <td><input type="text" value=""  name="w2"></td>
                        <td><input type="text" value=""  name="th2"></td>
                        <td><input type="text" value=""  name="f2"></td>
                    </tr>
                    <tr>
                        <td>10.00-11.00</td>
                        <td><input type="text" value=""  name="m3"></td>
                        <td><input type="text" value=""  name="t3"></td>
                        <td><input type="text" value=""  name="w3"></td>
                        <td><input type="text" value=""  name="th3"></td>
                        <td><input type="text" value=""  name="f3"></td>
                    </tr>
                    <tr>
                        <td>11.00-12.00</td>
                       <td><input type="text" value=""  name="m4"></td>
                        <td><input type="text" value=""  name="t4"></td>
                        <td><input type="text" value=""  name="w4"></td>
                        <td><input type="text" value="" name="th4"></td>
                        <td><input type="text" value="" name="f4"></td>
                    </tr>
                    <tr>
                        <td>12.00-01.00</td>
                         <td><input type="text" value=""  name="m5"></td>
                        <td><input type="text" value="" name="t5"></td>
                        <td><input type="text" value="" name="w5"></td>
                        <td><input type="text" value="" name="th5"></td>
                        <td><input type="text" value="" name="f5"></td>
                    </tr>
                    <tr>
                        <td>01.00-02.00</td>
                        <td><input type="text" value=""  name="m6"></td>
                        <td><input type="text" value="" name="t6"></td>
                        <td><input type="text" value="" name="w6"></td>
                        <td><input type="text" value="" name="th6"></td>
                        <td><input type="text" value="" name="f6"></td>
                    </tr>
                    <tr>
                        <td>02.00-03.00</td>
                        <td><input type="text" value="" name="m7"></td>
                        <td><input type="text" value="" name="t7"></td>
                        <td><input type="text" value="" name="w7"></td>
                        <td><input type="text" value="" name="th7"></td>
                        <td><input type="text" value="" name="f7"></td>
                    </tr>
                    <tr>
                        <td>03.00-04.00</td>
                         <td><input type="text" value="" name="m8"></td>
                        <td><input type="text" value="" name="t8"></td>
                        <td><input type="text" value="" name="w8"></td>
                        <td><input type="text" value="" name="th8"></td>
                        <td><input type="text" value="" name="f8"></td>
                    </tr>
                    <tr>
                        <td>04.00-05.00</td>
                        <td><input type="text" value="" name="m9"></td>
                        <td><input type="text" value="" name="t9"></td>
                        <td><input type="text" value="" name="w9"></td>
                        <td><input type="text" value="" name="th9"></td>
                        <td><input type="text" value="" name="f9"></td>
                 </tr>
		              
                </table>
<!--
<script>

            $(function () {
    $("td").dblclick(function () {
        var OriginalContent = $(this).text();
         
        $(this).addClass("cellEditing");
        $(this).html("<input type='text' value='" + OriginalContent + "' />");
        $(this).children().first().focus();
 
        $(this).children().first().keypress(function (e) {
            if (e.which == 13) {
                var newContent = $(this).val();
                $(this).parent().text(newContent);
                $(this).parent().removeClass("cellEditing");
            }
        });
         
    $(this).children().first().blur(function(){
        $(this).parent().text(OriginalContent);
        $(this).parent().removeClass("cellEditing");
    });
    });
});
    
</script>
                
-->
                
<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("electronicdb", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$time = $_POST['Time'];
$day = $_POST['day'];
$course = $_POST['course_name'];

if($time !=''||$day !=''){
//Insert Query of SQL
$query = mysql_query("insert into fixed_schedule(Time, day, course_name) values ('$time', '$day', '$course')");
    
    
   echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server
?>
                
                
                
                
                
                
                

<br> <br> 
                
                <div id="123" draggable="true"
ondragstart='drag(event,"electronics")'> electronic </div>
                
                
 <div class="form">               
 <form action="" method="post">
          
                <label>Time:</label>
                <select name="Time">
    <option value="8-9">08.00-09.00</option>
    <option value="9-10">09.00-10.00</option>
    <option value="10-11">10.00-11.00</option>
    <option value="11-12">11.00-12.00</option>
     <option value="12-1">12.00-01.00</option>
    <option value="1-2">01.00-02.00</option>
    <option value="2-3">02.00-03.00</option>
    <option value="3-4">03.00-04.00</option>
     <option value="4-5">04.00-05.00</option>
  </select>
                <label>Day:</label>
                <select name="day">
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednesday</option>
    <option value="thursday">Thursday</option>
     <option value="friday">Friday</option>
                </select>
                <br><br>
                <label >Course Name:</label>
                <select name="course_name">
    <option value="electronics">Electronics</option>
    <option value="robotics">Robotics</option>
    <option value="embeded_systems">Embeded Systems</option>
    
                </select> <br>
                <input type="submit" id="button" value=" Submit" name="submit" onclick = "pdateTable()"/>
     
                </form>
            </div>  
     
     <br><br><br>
<a href="#">View Schedule</a>

</div>





        </div>
        </div>
		
        <div id="footerwrap">
        <div id="footer">
			<div align="center">
				<font color="white" size="2px" align="center">&copy; 2015, All rights reserved by University of Colombo School of Computing
				<br>
				No: 35, Reid Avenue, Colombo 7, Sri Lanka.</font>
			
			</div>
        </div>
        </div>
    </div>
</body>
</html>


