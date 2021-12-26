<?php 
  $buildTable= function($rows,$cols){
    $tableStr="<table>";
    for($r=1; $r<=$rows; $r++){
      $tableStr .= "<tr>";
        for($c=1; $c<=$cols; $c++){
          $tableStr .= "<td>";
          $tableStr .= "Row ".$r." "."Cell ".$c;
          $tableStr .="</td>";
        }
      $tableStr .= "</tr>";   
    }
    return $tableStr.= "</table>";
  }
    ;
    
    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo($buildTable(15,5));
        // put your code here
        ?>
    </body>
</html>
