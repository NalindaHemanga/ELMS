<!DOCTYPE html>
<html>
<head>
<title>Edit Fixed Schedule</title>


<link rel="stylesheet" type="text/css" href="css/edit-schedule-content.css" />
<link rel="stylesheet" type="text/css" href="css/content.css" />
<link rel="stylesheet" type="text/css" href="css/btn.css" />
<link rel="stylesheet" type="text/css" href="css/wrapper.css" />

    
   
    
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
            <hr width="840px"><br>
                
                <label>Year:</label> 
                 <select name="Year">
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
    <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
     <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  <option value="2026">2026</option>
    <option value="2027">2027</option>
  <option value="2028">2028</option>
  <option value="2029">2029</option>
  <option value="2030">2030</option>
</select>
                <label>Semester No:</label>
                <select name="Semester">
  <option value="semester 1">Semester I</option>
  <option value="semester 2">Semester II</option>
                </select><br><br>
                

            
            
             
            <table width="100%" height="300px" border="1" style="overflow:auto;" padding="0" cellspacing="0" >
        			
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
                        <td><input id="m1" readonly="readonly" type="text" value="" name="m1" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"></td>
                        <td><input id="t1" readonly="readonly" type="text" value="" name="t1" ondrop='drop(event,"t1")' ondragover="allowDrop(event)"></td>
                        <td><input id="w1" readonly="readonly" type="text" value="" name="w1" ondrop='drop(event,"w1")' ondragover="allowDrop(event)"></td>
                        <td><input id="th1" readonly="readonly" type="text" value="" name="th1" ondrop='drop(event,"th1")' ondragover="allowDrop(event)"></td>
                        <td><input id="f1" readonly="readonly" type="text" value="" name="f1" ondrop='drop(event,"f1")' ondragover="allowDrop(event)"></td>
                            
                    </tr>
                    <tr>
                        <td>09.00-10.00</td>
                         <td><input id="m2" readonly="readonly" type="text" value="" name="m2" ondrop='drop(event,"m2")' ondragover="allowDrop(event)"></td>
                        <td><input id="t2" readonly="readonly" type="text" value="" name="t2" ondrop='drop(event,"t2")' ondragover="allowDrop(event)"></td>
                        <td><input id="w2" readonly="readonly" type="text" value="" name="w2" ondrop='drop(event,"w2")' ondragover="allowDrop(event)"></td>
                        <td><input id="th2" readonly="readonly" type="text" value="" name="th2" ondrop='drop(event,"th2")' ondragover="allowDrop(event)"></td>
                        <td><input id="f2" readonly="readonly" type="text" value="" name="f2" ondrop='drop(event,"f2")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>10.00-11.00</td>
                        <td><input id="m3" readonly="readonly" type="text" value="" name="m3" ondrop='drop(event,"m3")' ondragover="allowDrop(event)"></td>
                        <td><input id="t3" readonly="readonly" type="text" value="" name="t3" ondrop='drop(event,"t3")' ondragover="allowDrop(event)"></td>
                        <td><input id="w3" readonly="readonly" type="text" value="" name="w3" ondrop='drop(event,"w3")' ondragover="allowDrop(event)"></td>
                        <td><input id="th3" readonly="readonly" type="text" value="" name="th3" ondrop='drop(event,"th3")' ondragover="allowDrop(event)"></td>
                        <td><input id="f3" readonly="readonly" type="text" value="" name="f3" ondrop='drop(event,"f3")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>11.00-12.00</td>
                       <td><input id="m4" readonly="readonly" type="text" value="" name="m4" ondrop='drop(event,"m4")' ondragover="allowDrop(event)"></td>
                        <td><input id="t4" readonly="readonly" type="text" value="" name="t4" ondrop='drop(event,"t4")' ondragover="allowDrop(event)"></td>
                        <td><input id="w4" readonly="readonly" type="text" value="" name="w4" ondrop='drop(event,"w4")' ondragover="allowDrop(event)"></td>
                        <td><input id="th4" readonly="readonly" type="text" value="" name="th4" ondrop='drop(event,"th4")' ondragover="allowDrop(event)"></td>
                        <td><input id="f4" readonly="readonly" type="text" value="" name="f4" ondrop='drop(event,"f4")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>12.00-01.00</td>
                         <td><input id="m5" readonly="readonly" type="text" value="" name="m5" ondrop='drop(event,"m5")' ondragover="allowDrop(event)"></td>
                        <td><input id="t5" readonly="readonly" type="text" value="" name="t5" ondrop='drop(event,"t5")' ondragover="allowDrop(event)"></td>
                        <td><input id="w5" readonly="readonly" type="text" value="" name="w5" ondrop='drop(event,"w5")' ondragover="allowDrop(event)"></td>
                        <td><input id="th5" readonly="readonly" type="text" value="" name="th5" ondrop='drop(event,"th5")' ondragover="allowDrop(event)"></td>
                        <td><input id="f5" readonly="readonly" type="text" value="" name="f5" ondrop='drop(event,"f5")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>01.00-02.00</td>
                        <td><input id="m6" readonly="readonly" type="text" value="" name="m6" ondrop='drop(event,"m6")' ondragover="allowDrop(event)"></td>
                        <td><input id="t6" readonly="readonly" type="text" value="" name="t6" ondrop='drop(event,"t6")' ondragover="allowDrop(event)"></td>
                        <td><input id="w6" readonly="readonly" type="text" value="" name="w6" ondrop='drop(event,"w6")' ondragover="allowDrop(event)"></td>
                        <td><input id="th6" readonly="readonly" type="text" value="" name="th6" ondrop='drop(event,"th6")' ondragover="allowDrop(event)"></td>
                        <td><input id="f6" readonly="readonly" type="text" value="" name="f6" ondrop='drop(event,"f6")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>02.00-03.00</td>
                        <td><input id="m7" readonly="readonly" type="text" value="" name="m7" ondrop='drop(event,"m7")' ondragover="allowDrop(event)"></td>
                        <td><input id="t7" readonly="readonly" type="text" value="" name="t7" ondrop='drop(event,"t7")' ondragover="allowDrop(event)"></td>
                        <td><input id="w7" readonly="readonly" type="text" value="" name="w7" ondrop='drop(event,"w7")' ondragover="allowDrop(event)"></td>
                        <td><input id="th7" readonly="readonly" type="text" value="" name="th7" ondrop='drop(event,"th7")' ondragover="allowDrop(event)"></td>
                        <td><input id="f7" readonly="readonly" type="text" value="" name="f7" ondrop='drop(event,"f7")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>03.00-04.00</td>
                         <td><input id="m8" readonly="readonly" type="text" value="" name="m8" ondrop='drop(event,"m8")' ondragover="allowDrop(event)"></td>
                        <td><input id="t8" readonly="readonly" type="text" value="" name="t8" ondrop='drop(event,"t8")' ondragover="allowDrop(event)"></td>
                        <td><input id="w8" readonly="readonly" type="text" value="" name="w8" ondrop='drop(event,"w8")' ondragover="allowDrop(event)"></td>
                        <td><input id="th8" readonly="readonly" type="text" value="" name="th8" ondrop='drop(event,"th8")' ondragover="allowDrop(event)"></td>
                        <td><input id="f8" readonly="readonly" type="text" value="" name="f8" ondrop='drop(event,"f8")' ondragover="allowDrop(event)"></td>
                    </tr>
                    <tr>
                        <td>04.00-05.00</td>
                        <td><input id="m9" readonly="readonly" type="text" value="" name="m9" ondrop='drop(event,"m9")' ondragover="allowDrop(event)"></td>
                        <td><input id="t9" readonly="readonly" type="text" value="" name="t9" ondrop='drop(event,"t9")' ondragover="allowDrop(event)"></td>
                        <td><input id="w9" readonly="readonly" type="text" value="" name="w9" ondrop='drop(event,"w9")' ondragover="allowDrop(event)"></td>
                        <td><input id="th9" readonly="readonly" type="text" value="" name="th9" ondrop='drop(event,"th9")' ondragover="allowDrop(event)"></td>
                        <td><input id="f9" readonly="readonly" type="text" value="" name="f9" ondrop='drop(event,"f9")' ondragover="allowDrop(event)"></td>
                 </tr>
		              
                </table><br>
                 <input type="submit" id="button" value=" Submit" name="submit"/> 

                
           
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
                
                
<br> 
                
</div>
           

<div id="right">
      <fieldset style="float:right;width:130px;height:150px; margin-top:130px;">
    <legend>Courses</legend>
          
                <div id="1" draggable="true"
ondragstart='drag(event,"Electronics")'><font color="#0d6f94">Electronics</font></div>
                
                <div id="2" draggable="true"
ondragstart='drag(event,"Robotics")'><font color="#0d6f94"> Robotics</font> </div>
                
                <div id="3" draggable="true"
ondragstart='drag(event,"Embeded Systems")'><font color="#0d6f94"> Embeded Systems </font> </div>
    </fieldset><br><br><br>
   

          
          
            
            
            </div>



 
            </div>
        </div>
        </div>
		
        <div id="footerwrap">
        <div id="footer">
            <?php include "includes/footer.php" ?>
		
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