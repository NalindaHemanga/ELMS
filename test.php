


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



//echo date_format(date_add(DateTime::createFromFormat('d/m/Y', date("d/m/Y")),date_interval_create_from_date_string("5 years")),"d/m/Y");
echo date("d/m/Y");
$a=Item::search(["item_id"=>2]);
print_r($a);




?>
<html>
<script type="text/javascript">

function display(msg){

	alert(msg);
}
</script>
</html>


						
        				
        			







