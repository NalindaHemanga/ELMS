








<!DOCTYPE html>
<html>
<head>
    <title>Edit Fixed Schedule</title>



    <link rel="stylesheet" type="text/css" href="css/content.css" />
    <link rel="stylesheet" type="text/css" href="css/btn.css" />
    <link rel="stylesheet" type="text/css" href="css/wrapper.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />




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

    function clearContent(id) {
          document.getElementById(id).value = "";
      }



    </script>

    <style>
    input[type="text"] {
        width: 200px;
        height: 20px;
        padding-right: 50px;
    }

    input[type="button"] {
        margin-left: -27px;
        height: 16px;
        width: 16px;
        background:url(img/close_button.png);
        border: 0;
        -webkit-appearance: none;
    }
    </style>
</head>
<body>
    <div id="wrapper">
		<?php include "includes/header.php" ?>

		<?php include "includes/leftnav.php" ?>
		<div id="contentwrap">
        <div id="content">
            <form>
                <h2> Edit Fixed Schedule </h2>
                <hr width="840px"><br>

            <div id="left" style="width:68%;overflow-x:auto;display:inline-block;border:3px solid #000000;padding:5px;">


<?php

    require_once 'core/init.php';
    $sql="SELECT course_name FROM fixed_schedule LEFT JOIN course ON fixed_schedule.course_id=course.course_id ORDER BY fixed_schedule_id;";
    $result=DB::getInstance()->directSelect($sql);
?>






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
           <td><input id="m1" readonly="readonly" type="text" value="<?php print($result[0]["course_name"]) ?>" name="slot[1]" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m1")'></td>
           <td><input id="t1" readonly="readonly" type="text" value="<?php print($result[9]["course_name"]) ?>" name="slot[2]" ondrop='drop(event,"t1")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t1")'></td>
           <td><input id="w1" readonly="readonly" type="text" value="<?php print($result[18]["course_name"]) ?>" name="slot[3]" ondrop='drop(event,"w1")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w1")'></td>
           <td><input id="th1" readonly="readonly" type="text" value="<?php print($result[27]["course_name"]) ?>" name="slot[4]" ondrop='drop(event,"th1")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th1")'></td>
           <td><input id="f1" readonly="readonly" type="text" value="<?php print($result[36]["course_name"]) ?>" name="slot[5]" ondrop='drop(event,"f1")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f1")'></td>

       </tr><?php print($result[0]["course_name"]) ?>
       <tr>
           <td>09.00-10.00</td>
            <td><input id="m2" readonly="readonly" type="text" value="<?php print($result[1]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m2")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m2")'></td>
           <td><input id="t2" readonly="readonly" type="text" value="<?php print($result[10]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t2")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t2")'></td>
           <td><input id="w2" readonly="readonly" type="text" value="<?php print($result[19]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w2")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w2")'></td>
           <td><input id="th2" readonly="readonly" type="text" value="<?php print($result[28]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th2")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th2")'></td>
           <td><input id="f2" readonly="readonly" type="text" value="<?php print($result[37]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f2")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f2")'></td>
       </tr>
       <tr>
           <td>10.00-11.00</td>
           <td><input id="m3" readonly="readonly" type="text" value="<?php print($result[2]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m3")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m3")'></td>
           <td><input id="t3" readonly="readonly" type="text" value="<?php print($result[11]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t3")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t3")'></td>
           <td><input id="w3" readonly="readonly" type="text" value="<?php print($result[20]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w3")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w3")'></td>
           <td><input id="th3" readonly="readonly" type="text" value="<?php print($result[29]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th3")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th3")'></td>
           <td><input id="f3" readonly="readonly" type="text" value="<?php print($result[38]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f3")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f3")'></td>
       </tr>
       <tr>
           <td>11.00-12.00</td>
          <td><input id="m4" readonly="readonly" type="text" value="<?php print($result[3]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m4")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m4")'></td>
           <td><input id="t4" readonly="readonly" type="text" value="<?php print($result[12]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t4")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f4")'></td>
           <td><input id="w4" readonly="readonly" type="text" value="<?php print($result[21]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w4")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w4")'></td>
           <td><input id="th4" readonly="readonly" type="text" value="<?php print($result[30]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th4")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th4")'></td>
           <td><input id="f4" readonly="readonly" type="text" value="<?php print($result[39]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f4")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f4")'></td>
       </tr>
       <tr>
           <td>12.00-01.00</td>
            <td><input id="m5" readonly="readonly" type="text" value="<?php print($result[4]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m5")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m5")'></td>
           <td><input id="t5" readonly="readonly" type="text" value="<?php print($result[13]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t5")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t5")'></td>
           <td><input id="w5" readonly="readonly" type="text" value="<?php print($result[22]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w5")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w5")'></td>
           <td><input id="th5" readonly="readonly" type="text" value="<?php print($result[31]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th5")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th5")'></td>
           <td><input id="f5" readonly="readonly" type="text" value="<?php print($result[40]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f5")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f5")'></td>
       </tr>
       <tr>
           <td>01.00-02.00</td>
           <td><input id="m6" readonly="readonly" type="text" value="<?php print($result[5]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m6")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m6")'></td>
           <td><input id="t6" readonly="readonly" type="text" value="<?php print($result[14]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t6")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t6")'></td>
           <td><input id="w6" readonly="readonly" type="text" value="<?php print($result[23]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w6")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w6")'></td>
           <td><input id="th6" readonly="readonly" type="text" value="<?php print($result[32]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th6")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th6")'></td>
           <td><input id="f6" readonly="readonly" type="text" value="<?php print($result[41]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f6")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f6")'></td>
       </tr>
       <tr>
           <td>02.00-03.00</td>
           <td><input id="m7" readonly="readonly" type="text" value="<?php print($result[6]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m7")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m7")'></td>
           <td><input id="t7" readonly="readonly" type="text" value="<?php print($result[15]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t7")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t7")'></td>
           <td><input id="w7" readonly="readonly" type="text" value="<?php print($result[24]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w7")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w7m1")'></td>
           <td><input id="th7" readonly="readonly" type="text" value="<?php print($result[33]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th7")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th7")'></td>
           <td><input id="f7" readonly="readonly" type="text" value="<?php print($result[42]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f7")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f7")'></td>
       </tr>
       <tr>
           <td>03.00-04.00</td>
            <td><input id="m8" readonly="readonly" type="text" value="<?php print($result[7]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m8")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m8")'></td>
           <td><input id="t8" readonly="readonly" type="text" value="<?php print($result[16]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t8")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t8m1")'></td>
           <td><input id="w8" readonly="readonly" type="text" value="<?php print($result[25]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w8")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w8")'></td>
           <td><input id="th8" readonly="readonly" type="text" value="<?php print($result[34]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th8")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th8")'></td>
           <td><input id="f8" readonly="readonly" type="text" value="<?php print($result[43]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f8")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f8")'></td>
       </tr>
       <tr>
           <td>04.00-05.00</td>
           <td><input id="m9" readonly="readonly" type="text" value="<?php print($result[8]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"m9")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("m9")'></td>
           <td><input id="t9" readonly="readonly" type="text" value="<?php print($result[17]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"t9")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("t9")'></td>
           <td><input id="w9" readonly="readonly" type="text" value="<?php print($result[26]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"w9")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("w9")'></td>
           <td><input id="th9" readonly="readonly" type="text" value="<?php print($result[35]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"th9")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("th9")'></td>
           <td><input id="f9" readonly="readonly" type="text" value="<?php print($result[44]["course_name"]) ?>" name="slot[]" ondrop='drop(event,"f9")' ondragover="allowDrop(event)"><input type="button" value="" onclick='clearContent("f9")'></td>
    </tr>

   </table><br>







<br>

</div>

<div id="right" style="width:29%;overflow:auto;display:inline-block;vertical-align:top">
      <fieldset style="float:right;width:200px; margin-top:130px;">
    <legend>Courses</legend>

                <div id="1" draggable="true"
ondragstart='drag(event,"Electronics")'><font color="#0d6f94">Electronics</font></div>

                <div id="2" draggable="true"
ondragstart='drag(event,"Robotics")'><font color="#0d6f94"> Robotics</font> </div>

                <div id="3" draggable="true"
ondragstart='drag(event,"Embeded Systems")'><font color="#0d6f94"> Embeded Systems </font> </div>



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
