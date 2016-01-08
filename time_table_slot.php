
<?php 
require_once 'core/init.php';
$timestamp = strtotime('2009-10-22');

//$day = date('l', $timestamp);


//var_dump($day);
?>

<div class="datagrid">
<table>
	<thead>
		<tr><th><center>Time</center></th><th><center><?php echo $_POST["dayy"]; ?></center></th></tr>
	</thead>
	<tbody>
	
		<tr><td><center>8.00 a.m. - 9.00 a.m</center></td><td><center><input id="m1" type='text' readonly class="text medium" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>9.00 a.m. - 10.00 a.m</center></td><td><center><input id="m2" type='text' class="text medium" ondrop='drop(event,"m2")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>10.00 a.m. - 11.00 a.m</center></td><td><center><input id="m3" type='text' class="text medium" ondrop='drop(event,"m3")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>11.00 a.m. - 12.00 a.m</center></td><td><center><input id="m4" type='text' class="text medium" ondrop='drop(event,"m4")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>12.00 a.m. - 1.00 p.m</center></td><td><center><input id="m5" type='text' class="text medium" ondrop='drop(event,"m5")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>1.00 p.m. - 2.00 p.m</center></td><td><center><input id="m6" type='text' class="text medium" ondrop='drop(event,"m6")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>2.00 p.m. - 3.00 p.m</center></td><td><center><input id="m7" type='text' class="text medium" ondrop='drop(event,"m7")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>3.00 p.m. - 4.00 p.m</center></td><td><center><input id="m8" type='text' class="text medium" ondrop='drop(event,"m8")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>
		<tr><td><center>4.00 p.m. - 5.00 p.m</center></td><td><center><input id="m9" type='text' class="text medium" ondrop='drop(event,"m9")' ondragover="allowDrop(event)"/><a href="#">Clear</a></center></td></tr>	

		

	</tbody>
</table>
</div>

