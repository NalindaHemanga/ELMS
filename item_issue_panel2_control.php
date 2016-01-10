
<?php

    require_once 'core/init.php';

    $member_role=$_SESSION['roles'];
    
    if(in_array("Laboratory Assistant", $member_role)){

    }else{
        header('location:restricted_page.php');
    }
    
    $copy_no=$_GET["copy_no"];


    if(!isset($_SESSION["items"])){
        $_SESSION["items"]=array();
        print("one");

    }else if(in_array($copy_no,$_SESSION["items"])){
        $key=array_search($copy_no,$_SESSION["items"]);

        unset($_SESSION["items"][$key]);
        unset($_SESSION["basket"][$key]);
        print("You removed the item from the basket successfully !");

        
    }
    else{
        array_push($_SESSION["items"],$copy_no);
        $itemCopy=ItemCopy::search(["item_copy_no"=>$copy_no]);
        
        $data=array(
            "item_copy_id"=>$itemCopy->get_id(),
            "item_copy_no"=>$itemCopy->get_no(),
            "item_copy_name"=>$itemCopy->get_item_name(),
            "quantity"=>1,
            "condition"=>$itemCopy->get_condition()
            );

        array_push($_SESSION["basket"],$data);
        

        print("You have added the item to the basket successfully !");

    }
?>
