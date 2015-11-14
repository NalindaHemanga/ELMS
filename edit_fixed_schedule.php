
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronicdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!empty($_POST['slot'])){
$slots = $_POST['slot'];
$day = array("monday","tuesday","wednesday","thursday","friday");

$z = 1;
for ($x = 0; $x <= 4; $x++) {
    for ($y = 0; $y <=8; $y++) {
    $id = $x+(5*$y);
	$course_id = $slots[$id];
	//echo " -$id- ";

	if($course_id==""){
    		$sql = "UPDATE `electronicdb`.`fixed_schedule` SET `course_id` = NULL WHERE `fixed_schedule`.`fixed_schedule_id` =$z;";}
	else{
		$sql = "UPDATE fixed_schedule SET fixed_schedule_day='".$day[$x]."',fixed_schedule_time='".($y+1)."' ,course_id ='".$course_id."' WHERE  fixed_schedule_id=$z ";
	}
	mysqli_query($conn, $sql);
	$z++;
    }
}
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Edit Fixed Schedule</title>



    <link rel="stylesheet" type="text/css" href="css/content.css" />
    <link rel="stylesheet" type="text/css" href="css/btn.css" />
    <link rel="stylesheet" type="text/css" href="css/wrapper.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />

<style>
input[type="text"] {
    width: 120px;
    height: 20px;
    padding-right: 50px;
}

input[type="button"] {
    margin-left: -29px;

    height: 25px;
    width: 26px;
    background:url(img/close-btn.png);
    border: 0;
    -webkit-appearance: none;
}
</style>


        <script>
            var curCourse;
            var curCourseId;

    function allowDrop(ev) {
        ev.preventDefault();
    }
    function drag(ev,course,courseId) {
        curCourse = course;
        curCourseId = courseId;
        ev.dataTransfer.setData("text", ev.target.id);
    }
    function drop(ev,id) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
       // ev.target.appendChild(document.getElementById(data));
        document.getElementById(id).value = curCourse;
        document.getElementById(id+"h").value = curCourseId;
    }

    function clearContent(id) {
        document.getElementById(id).value = "";
        document.getElementById(id+"h").value = "";
    }


    </script>

</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
            <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <h2> Edit Fixed Schedule </h2>
                <hr width="840px"><br>

            <div id="left" style="width:68%;overflow:auto;display:inline-block;border:3px solid #000000;padding:5px;">


<?php
require_once 'core/init.php';
$sql="SELECT course_name,course.course_id FROM fixed_schedule LEFT JOIN course ON fixed_schedule.course_id=course.course_id ORDER BY fixed_schedule_id;";
$result=DB::getInstance()->directSelect($sql);


?>






            <table width="100%" height="300px" border="1" style="overlow:auto;" padding="0" cellspacing="0" >

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
                        <td><input id="m1" readonly="readonly" type="text" value="<?php print($result[0]['course_name']) ?>" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"><input id="m1h" type="hidden" value="<?php print($result[0]['course_id']) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m1")'></td>
                        <td><input id="t1" readonly="readonly" type="text" value="<?php print($result[9]["course_name"]) ?>" ondrop='drop(event,"t1")' ondragover="allowDrop(event)"><input id="t1h" type="hidden" value="<?php print($result[9]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t1")'></td>
                        <td><input id="w1" readonly="readonly" type="text" value="<?php print($result[18]["course_name"]) ?>" ondrop='drop(event,"w1")' ondragover="allowDrop(event)"><input id="w1h" type="hidden" value="<?php print($result[18]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w1")'></td>
                        <td><input id="th1" readonly="readonly" type="text" value="<?php print($result[27]["course_name"]) ?>" ondrop='drop(event,"th1")' ondragover="allowDrop(event)"><input id="th1h" type="hidden" value="<?php print($result[27]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th1")'></td>
                        <td><input id="f1" readonly="readonly" type="text" value="<?php print($result[36]["course_name"]) ?>" ondrop='drop(event,"f1")' ondragover="allowDrop(event)"><input id="f1h" type="hidden" value="<?php print($result[36]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f1")'></td>

                    </tr><?php print($result[0]["course_name"]) ?>
                    <tr>
                        <td>09.00-10.00</td>
                         <td><input id="m2" readonly="readonly" type="text" value="<?php print($result[1]["course_name"]) ?>" ondrop='drop(event,"m2")' ondragover="allowDrop(event)"><input id="m2h" type="hidden" value="<?php print($result[1]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m2")'></td>
                        <td><input id="t2" readonly="readonly" type="text" value="<?php print($result[10]["course_name"]) ?>" ondrop='drop(event,"t2")' ondragover="allowDrop(event)"><input id="t2h" type="hidden" value="<?php print($result[10]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t2")'></td>
                        <td><input id="w2" readonly="readonly" type="text" value="<?php print($result[19]["course_name"]) ?>" ondrop='drop(event,"w2")' ondragover="allowDrop(event)"><input id="w2h" type="hidden" value="<?php print($result[19]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w2")'></td>
                        <td><input id="th2" readonly="readonly" type="text" value="<?php print($result[28]["course_name"]) ?>" ondrop='drop(event,"th2")' ondragover="allowDrop(event)"><input id="th2h" type="hidden" value="<?php print($result[28]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th2")'></td>
                        <td><input id="f2" readonly="readonly" type="text" value="<?php print($result[37]["course_name"]) ?>" ondrop='drop(event,"f2")' ondragover="allowDrop(event)"><input id="f2h" type="hidden" value="<?php print($result[37]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f2")'></td>
                    </tr>
                    <tr>
                        <td>10.00-11.00</td>
                        <td><input id="m3" readonly="readonly" type="text" value="<?php print($result[2]["course_name"]) ?>" ondrop='drop(event,"m3")' ondragover="allowDrop(event)"><input id="m3h" type="hidden" value="<?php print($result[2]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m3")'></td>
                        <td><input id="t3" readonly="readonly" type="text" value="<?php print($result[11]['course_name']); ?>" ondrop='drop(event,"t3")' ondragover="allowDrop(event)"><input id="t3h" type="hidden" value="<?php print($result[11]['course_id']); ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t3")'></td>
                        <td><input id="w3" readonly="readonly" type="text" value="<?php print($result[20]["course_name"]) ?>" ondrop='drop(event,"w3")' ondragover="allowDrop(event)"><input id="w3h" type="hidden" value="<?php print($result[20]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w3")'></td>
                        <td><input id="th3" readonly="readonly" type="text" value="<?php print($result[29]["course_name"]) ?>" ondrop='drop(event,"th3")' ondragover="allowDrop(event)"><input id="th3h" type="hidden" value="<?php print($result[29]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th3")'></td>
                        <td><input id="f3" readonly="readonly" type="text" value="<?php print($result[38]["course_name"]) ?>" ondrop='drop(event,"f3")' ondragover="allowDrop(event)"><input id="f3h" type="hidden" value="<?php print($result[38]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f3")'></td>
                    </tr>
                    <tr>
                        <td>11.00-12.00</td>
                       <td><input id="m4" readonly="readonly" type="text" value="<?php print($result[3]["course_name"]) ?>" ondrop='drop(event,"m4")' ondragover="allowDrop(event)"><input id="m4h" type="hidden" value="<?php print($result[3]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m4")'></td>
                        <td><input id="t4" readonly="readonly" type="text" value="<?php print($result[12]["course_name"]) ?>" ondrop='drop(event,"t4")' ondragover="allowDrop(event)"><input id="t4h" type="hidden" value="<?php print($result[12]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t4")'></td>
                        <td><input id="w4" readonly="readonly" type="text" value="<?php print($result[21]["course_name"]) ?>" ondrop='drop(event,"w4")' ondragover="allowDrop(event)"><input id="w4h" type="hidden" value="<?php print($result[21]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w4")'></td>
                        <td><input id="th4" readonly="readonly" type="text" value="<?php print($result[30]["course_name"]) ?>" ondrop='drop(event,"th4")' ondragover="allowDrop(event)"><input id="th4h" type="hidden" value="<?php print($result[30]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th4")'></td>
                        <td><input id="f4" readonly="readonly" type="text" value="<?php print($result[39]["course_name"]) ?>" ondrop='drop(event,"f4")' ondragover="allowDrop(event)"><input id="f4h" type="hidden" value="<?php print($result[39]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f4")'></td>
                    </tr>
                    <tr>
                        <td>12.00-01.00</td>
                         <td><input id="m5" readonly="readonly" type="text" value="<?php print($result[4]["course_name"]) ?>" ondrop='drop(event,"m5")' ondragover="allowDrop(event)"><input id="m5h" type="hidden" value="<?php print($result[4]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m5")'></td>
                        <td><input id="t5" readonly="readonly" type="text" value="<?php print($result[13]["course_name"]) ?>" ondrop='drop(event,"t5")' ondragover="allowDrop(event)"><input id="t5h" type="hidden" value="<?php print($result[13]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t5")'></td>
                        <td><input id="w5" readonly="readonly" type="text" value="<?php print($result[22]["course_name"]) ?>" ondrop='drop(event,"w5")' ondragover="allowDrop(event)"><input id="w5h" type="hidden" value="<?php print($result[22]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w5")'></td>
                        <td><input id="th5" readonly="readonly" type="text" value="<?php print($result[31]["course_name"]) ?>" ondrop='drop(event,"th5")' ondragover="allowDrop(event)"><input id="th5h" type="hidden" value="<?php print($result[31]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th5")'></td>
                        <td><input id="f5" readonly="readonly" type="text" value="<?php print($result[40]["course_name"]) ?>" ondrop='drop(event,"f5")' ondragover="allowDrop(event)"><input id="f5h" type="hidden" value="<?php print($result[40]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f5")'></td>
                    </tr>
                    <tr>
                        <td>01.00-02.00</td>
                        <td><input id="m6" readonly="readonly" type="text" value="<?php print($result[5]["course_name"]) ?>" ondrop='drop(event,"m6")' ondragover="allowDrop(event)"><input id="m6h" type="hidden" value="<?php print($result[5]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m6")'></td>
                        <td><input id="t6" readonly="readonly" type="text" value="<?php print($result[14]["course_name"]) ?>" ondrop='drop(event,"t6")' ondragover="allowDrop(event)"><input id="t6h" type="hidden" value="<?php print($result[14]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t6")'></td>
                        <td><input id="w6" readonly="readonly" type="text" value="<?php print($result[23]["course_name"]) ?>" ondrop='drop(event,"w6")' ondragover="allowDrop(event)"><input id="w6h" type="hidden" value="<?php print($result[23]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w6")'></td>
                        <td><input id="th6" readonly="readonly" type="text" value="<?php print($result[32]["course_name"]) ?>" ondrop='drop(event,"th6")' ondragover="allowDrop(event)"><input id="th6h" type="hidden" value="<?php print($result[32]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th6")'></td>
                        <td><input id="f6" readonly="readonly" type="text" value="<?php print($result[41]["course_name"]) ?>" ondrop='drop(event,"f6")' ondragover="allowDrop(event)"><input id="f6h" type="hidden" value="<?php print($result[41]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f6")'></td>
                    </tr>
                    <tr>
                        <td>02.00-03.00</td>
                        <td><input id="m7" readonly="readonly" type="text" value="<?php print($result[6]["course_name"]) ?>" ondrop='drop(event,"m7")' ondragover="allowDrop(event)"><input id="m7h" type="hidden" value="<?php print($result[6]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m7")'></td>
                        <td><input id="t7" readonly="readonly" type="text" value="<?php print($result[15]["course_name"]) ?>" ondrop='drop(event,"t7")' ondragover="allowDrop(event)"><input id="t7h" type="hidden" value="<?php print($result[15]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t7")'></td>
                        <td><input id="w7" readonly="readonly" type="text" value="<?php print($result[24]["course_name"]) ?>" ondrop='drop(event,"w7")' ondragover="allowDrop(event)"><input id="w7h" type="hidden" value="<?php print($result[24]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w7")'></td>
                        <td><input id="th7" readonly="readonly" type="text" value="<?php print($result[33]["course_name"]) ?>" ondrop='drop(event,"th7")' ondragover="allowDrop(event)"><input id="th7h" type="hidden" value="<?php print($result[33]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th7")'></td>
                        <td><input id="f7" readonly="readonly" type="text" value="<?php print($result[42]["course_name"]) ?>" ondrop='drop(event,"f7")' ondragover="allowDrop(event)"><input id="f7h" type="hidden" value="<?php print($result[42]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f7")'></td>
                    </tr>
                    <tr>
                        <td>03.00-04.00</td>
                         <td><input id="m8" readonly="readonly" type="text" value="<?php print($result[7]["course_name"]) ?>" ondrop='drop(event,"m8")' ondragover="allowDrop(event)"><input id="m8h" type="hidden" value="<?php print($result[7]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m8")'></td>
                        <td><input id="t8" readonly="readonly" type="text" value="<?php print($result[16]["course_name"]) ?>" ondrop='drop(event,"t8")' ondragover="allowDrop(event)"><input id="t8h" type="hidden" value="<?php print($result[16]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t8")'></td>
                        <td><input id="w8" readonly="readonly" type="text" value="<?php print($result[25]["course_name"]) ?>" ondrop='drop(event,"w8")' ondragover="allowDrop(event)"><input id="w8h" type="hidden" value="<?php print($result[25]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w8")'></td>
                        <td><input id="th8" readonly="readonly" type="text" value="<?php print($result[34]["course_name"]) ?>" ondrop='drop(event,"th8")' ondragover="allowDrop(event)"><input id="th8h" type="hidden" value="<?php print($result[34]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th8")'></td>
                        <td><input id="f8" readonly="readonly" type="text" value="<?php print($result[43]["course_name"]) ?>" ondrop='drop(event,"f8")' ondragover="allowDrop(event)"><input id="f8h" type="hidden" value="<?php print($result[43]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f8")'></td>
                    </tr>
                    <tr>
                        <td>04.00-05.00</td>
                        <td><input id="m9" readonly="readonly" type="text" value="<?php print($result[8]["course_name"]) ?>" ondrop='drop(event,"m9")' ondragover="allowDrop(event)"><input id="m9h" type="hidden" value="<?php print($result[8]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("m9")'></td>
                        <td><input id="t9" readonly="readonly" type="text" value="<?php print($result[17]["course_name"]) ?>" ondrop='drop(event,"t9")' ondragover="allowDrop(event)"><input id="t9h" type="hidden" value="<?php print($result[17]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("t9")'></td>
                        <td><input id="w9" readonly="readonly" type="text" value="<?php print($result[26]["course_name"]) ?>" ondrop='drop(event,"w9")' ondragover="allowDrop(event)"><input id="w9h" type="hidden" value="<?php print($result[26]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("w9")'></td>
                        <td><input id="th9" readonly="readonly" type="text" value="<?php print($result[35]["course_name"]) ?>" ondrop='drop(event,"th9")' ondragover="allowDrop(event)"><input id="th9h" type="hidden" value="<?php print($result[35]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("th9")'></td>
                        <td><input id="f9" readonly="readonly" type="text" value="<?php print($result[44]["course_name"]) ?>" ondrop='drop(event,"f9")' ondragover="allowDrop(event)"><input id="f9h" type="hidden" value="<?php print($result[44]["course_id"]) ?>" name="slot[]"><input type="button" value="" onclick='clearContent("f9")'></td>
                 </tr>

                </table><br>







<br>

</div>

<div id="right" style="width:29%;overflow:auto;display:inline-block;vertical-align:top">
      <fieldset style="float:right;width:200px; margin-top:130px;">
    <legend>Courses</legend>

<?php

$sql = "SELECT * FROM `course`";
$courses = DB::getInstance()->directSelect($sql);
foreach($courses as $course){
	$courseId = $course['course_id'];
	$courseName = $course['course_name'];
	echo "<div style=\"padding:3px;\"><div style=\"border-style: solid; border-width:1px;\"draggable=\"true\" ondragstart='drag(event,\"$courseName\",\"$courseId\")'><font color=\"#0d6f94\">$courseName</font></div></div>";
}

?>

    </fieldset><br><br><br>






            </div>

             <input type="submit" class="button" value="     Submit     " name="submit" />
         </form>
        </div>
        </div>

       <?php include "includes/footer.php" ?>
    </div>
</body>
</html>
