


<?php

require_once 'core/init.php';
$password="nalinda";
$hash=crypt($password);


///echo $hash;
if(password_verify("nalinda",$hash)){

	//echo strlen($hash);

}else{


	echo "invalid";
}



echo date_format(date_add(DateTime::createFromFormat('d/m/Y', date("d/m/Y")),date_interval_create_from_date_string("5 years")),"d/m/Y");

$a=DB::getInstance()->search("member",array("member_remarks"=>"Borrow Allowed","member_nic"=>"931390473"));
if(count($a)==0)
	echo "Nice";
else
	print_r($a);


$GLOBALS["form_data"]=array("id"=>"001","name"=>"nalinda");
$GLOBALS["form_data2"]=array("id"=>"001","name"=>"nalinda");

print_r($GLOBALS["form_data"]);
echo isset($GLOBALS["form_data"]);
$GLOBALS["form_data"]="NULL";
if($GLOBALS["form_data"]=="NULL") echo "did it !";


$var="helloo_world";

echo '<input type="button" value="click me" onClick="alert(\"asdasd\");">';


?>
<html>
<script type="text/javascript">

function display(msg){

	alert(msg);
}
</script>
</html>


						
        				
        			







