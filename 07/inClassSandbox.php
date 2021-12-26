<?php 
$path="directories/";
    $message="";
    $dirPath="";
    function dirExists($path, $dirName){
        $exists=false;
        $dirArr=scandir($path);
        foreach($dirArr as $thing){
            if($thing == $dirName){
                $exists = true;
            }
        }
        return $exists;
    }

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
        echo(exec("whoami"));
        echo dirExists($path, "testDir");
        // put your code here
        ?>
    </body>
</html>
