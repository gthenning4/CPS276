
<?php
require 'pdo.php';
$sql = "SELECT * FROM pdfs";
$results = execute($sql);
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
        foreach ($results as $record){
            echo ($record['pdf_name']."<br>");
            echo ($record['pdf_path'])."<br>";
        }
        // put your code here
        ?>
    </body>
</html>
