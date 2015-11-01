<a href="#close" title="Close" class="close">X</a>

<?php
require 'core/init.php';

                if(count($_SESSION["basket"])==0){
                    echo "<div style='text-align:center;'><h3>The Basket is Empty</h3></div>";

                }
                else{
                    $basket=$_SESSION["basket"];
                     echo "<div style='text-align:center;'><h1>Item Basket</h1><hr/></div>";
                    
                    foreach ($basket as $key => $value) {
                        
                        $c=$key+1;
                        echo "<center><table>";
                        echo "<tr>";
                        echo "<td>Item".$c." --> </td>";
                        echo "<td>".$value["item_copy_name"]."</td>";

                        echo "</tr>";
                        echo "</table></center>";
                        echo "<hr/>";
                    }




                }


           ?>