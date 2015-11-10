<a href="#close" title="Close" class="close" id="closelink">X</a>
<style>
th, td { 
    padding: 10px; 
    text-align: center;
}
</style>
<?php
$c=0;
require 'core/init.php';

                if(count($_SESSION["basket"])==0){
                    echo "<div style='text-align:center;'><h3>The Basket is Empty</h3></div>";

                }
                else{
                    $basket=$_SESSION["basket"];
                     echo "<div style='text-align:center;'><h1>Item Basket</h1></div>";
                    echo "<center><table border=1 frame=hsides rules=rows>";
                        echo "<tr><th>Index</th><th>Item Name</th><th>Item Copy No</th><th>Quantity</th><th>Actions</th></tr>";
                    foreach ($basket as $key => $value) {
                        
                        $c=$c+1;

                        echo "<tr>";
                        echo "<td>".$c."</td>";
                        echo "<td>".$value["item_copy_name"]."</td>";
                        echo "<td>".$value["item_copy_no"]."</td>";
                         echo "<td>1</td>";
                         echo "<td><button id='".$value["item_copy_no"]."' onclick='removeItem(this.id);'>Remove</button></td>";

                        echo "</tr>";
                        
                    }


                    echo "</table></center>";
                    echo "</br></br></br></xhr>";
                    echo "<div style='text-align:right;'><a href='item_issue_panel3.php' onclick='closeclick()'><h3>Proceed to item checkout >></h3></a></div>";
                      

                }


           ?>