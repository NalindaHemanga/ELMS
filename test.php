


<?php





require_once 'core/init.php';
$password="nalinda";
$hash=crypt($password);

$io=Member::search(["member_nic"=>"931390473"]);
print_r($io);


///echo $hash;
if(password_verify("nalinda",$hash)){

	//echo strlen($hash);

}else{


	echo "invalid";
}

echo "test";


//echo date_format(date_add(DateTime::createFromFormat('d/m/Y', date("d/m/Y")),date_interval_create_from_date_string("5 years")),"d/m/Y");
echo date("d/m/Y");
$a=Item::search(["item_id"=>2]);
print_r($a);

$data=array(

	"id"=>null,
	"purpose"=>"sdasd",
	"comment"=>"asdsdf",
	"member_id"=>16


);

$t=new Transaction();
$t->create($data);
$t->add();





?>
<html>
<script type="text/javascript">

function display(msg){

	alert(msg);
}
</script>
</html>

<!DOCTYPE HTML>
<html>
<head>
<style>
#div1, #div2
{float:left; width:100px; height:100px; margin:10px;padding:10px;border:1px solid #aaaaaa;}
</style>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    
	ev.preventDefault();
   var data = ev.dataTransfer.getData("text");
   ev.target.appendChild(document.getElementById(data));
}
</script>
</head>
<body>

<div id="div1" ondrop="drop(event)" >
  <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
</div>

<table border=1 ondrop="drop(event)" id="" ondragover="allowDrop(event)">
<tr><td>Heelloo</td></tr></table>

</body>
</html>
