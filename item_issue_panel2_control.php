
<?php

    require_once 'core/init.php';
    $copy_no=$_GET["copy_no"];


    if(!isset($_SESSION["items"])){
        $_SESSION["items"]=array();

    }else if(in_array($copy_no,$_SESSION["items"])){
        $key=array_search($copy_no,$_SESSION["items"]);
        unset($_SESSION["items"][$key]);
    }
    else{
        array_push($_SESSION["items"],$copy_no);

    }
?>
