
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
	<tr><td><center>8.00 a.m. - 9.00 a.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>9.00 a.m. - 10.00 a.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>10.00 a.m. - 11.00 a.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>11.00 a.m. - 12.00 a.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>12.00 a.m. - 1.00 p.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>1.00 p.m. - 2.00 p.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>2.00 p.m. - 3.00 p.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>3.00 p.m. - 4.00 p.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>
	<tr><td><center>4.00 p.m. - 5.00 p.m</center></td><td><center><input type='text' class="text large" ondrop='drop(event,"m1")' ondragover="allowDrop(event)"/></center></td></tr>	

		

	</tbody>
</table>
</div>

