
<?php 
require_once 'core/init.php';

date_default_timezone_set('UTC');
//$day = date('l', $timestamp);

$data=$_POST["data"];
$day=$data[0];
$sid=$data[1];
$status=false;
$subjects=array();
$schedule=Schedule::search(["schedule_id"=>$sid]);
$date = $schedule->getScheduleStartDate();
$end_date = $schedule->getScheduleEndDate();
$slots=array("8-9","9-10","10-11","11-12","12-1","1-2","2-3","3-4","4-5");
while(strtotime($date) <= strtotime($end_date)){

	$day2 = date('l', strtotime($date));
	if($day==$day2){

	foreach ($slots as $key => $labtime) {
			
		
		$result=DB::getInstance()->directSelect("SELECT course_id FROM lab_slot WHERE schedule_id=$sid AND lab_slot_date='$date' AND lab_slot_time='$labtime' ;");
		if(count($result)>0){
			$result2=DB::getInstance()->directSelect("SELECT course_name FROM course WHERE course_id=".$result[0]["course_id"].";");
			$subjects[]=$result2[0]["course_name"];

		}else{
			$subjects[]="";
		}
	}

	$status=true;
	break;
	}
	if($status)
		break;
	$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));

}



//var_dump($day);
?>
<input type="text" hidden="true" id="day2" value="<?php echo $day ?>"/>
<div class="datagrid">
<table>
	<thead>
		<tr><th><center>Time</center></th><th><center><?php echo $day ?></center></th></tr>
	</thead>
	<tbody>
	
		<tr><td><center>8.00 a.m. - 9.00 a.m</center></td><td><center><input id="m1" type='text' readonly class="text medium" ondrop='drop(event,"m1")' ondragover="allowDrop(event)" value="<?php echo $subjects[0]; ?>"/><a href="#" onclick='clearContent("m1")'>Clear</a></center></td></tr>
		<tr><td><center>9.00 a.m. - 10.00 a.m</center></td><td><center><input id="m2" type='text' readonly class="text medium" ondrop='drop(event,"m2")' ondragover="allowDrop(event)" value="<?php echo $subjects[1]; ?>"/><a href="#" onclick='clearContent("m2")'>Clear</a></center></td></tr>
		<tr><td><center>10.00 a.m. - 11.00 a.m</center></td><td><center><input id="m3" type='text' readonly class="text medium" ondrop='drop(event,"m3")' ondragover="allowDrop(event)" value="<?php echo $subjects[2]; ?>"/><a href="#" onclick='clearContent("m3")'>Clear</a></center></td></tr>
		<tr><td><center>11.00 a.m. - 12.00 a.m</center></td><td><center><input id="m4" type='text' readonly class="text medium" ondrop='drop(event,"m4")' ondragover="allowDrop(event)" value="<?php echo $subjects[3]; ?>"/><a href="#" onclick='clearContent("m4")'>Clear</a></center></td></tr>
		<tr><td><center>12.00 a.m. - 1.00 p.m</center></td><td><center><input id="m5" type='text' readonly class="text medium" ondrop='drop(event,"m5")' ondragover="allowDrop(event)" value="<?php echo $subjects[4]; ?>"/><a href="#" onclick='clearContent("m5")'>Clear</a></center></td></tr>
		<tr><td><center>1.00 p.m. - 2.00 p.m</center></td><td><center><input id="m6" type='text' readonly class="text medium" ondrop='drop(event,"m6")' ondragover="allowDrop(event)" value="<?php echo $subjects[5]; ?>"/><a href="#" onclick='clearContent("m6")'>Clear</a></center></td></tr>
		<tr><td><center>2.00 p.m. - 3.00 p.m</center></td><td><center><input id="m7" type='text' readonly class="text medium" ondrop='drop(event,"m7")' ondragover="allowDrop(event)" value="<?php echo $subjects[6]; ?>"/><a href="#" onclick='clearContent("m7")'>Clear</a></center></td></tr>
		<tr><td><center>3.00 p.m. - 4.00 p.m</center></td><td><center><input id="m8" type='text' readonly class="text medium" ondrop='drop(event,"m8")' ondragover="allowDrop(event)" value="<?php echo $subjects[7]; ?>"/><a href="#" onclick='clearContent("m8")'>Clear</a></center></td></tr>
		<tr><td><center>4.00 p.m. - 5.00 p.m</center></td><td><center><input id="m9" type='text' readonly class="text medium" ondrop='drop(event,"m9")' ondragover="allowDrop(event)" value="<?php echo $subjects[8]; ?>"/><a href="#" onclick='clearContent("m9")'>Clear</a></center></td></tr>	

		

	</tbody>
</table>
</div>

