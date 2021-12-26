<?php
require 'fileUpload.php';
$upload = new fileUpload();
require 'FileParse.php';
$fp = new FileParse();
$submitted=false;
if (isset($_POST['submit']) && !empty($_FILES['myfile'])){
    $submitted=true;
}
if ($submitted){
    $file=$_FILES['myfile'];
    $path='data/'.$file['name'];
    if ($upload ->isCSV($file)){
        if($upload->uploadFile()){
            if(!file_exists($path)){
                echo "file not found";
            }   
        }
    }
    $contentsAsArray = file($path,FILE_SKIP_EMPTY_LINES);
    $rows = array();
    foreach ($contentsAsArray as $line) {
        $lineAsArray = split(',',$line);
        $rows[]=$lineAsArray;
    }
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
        <title>Upload CSV</title>
    </head>
    <body>
        <form  action="" method ="POST" enctype="multipart/form-data">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                <input type="file" name="myfile"/>
         </form>
        <?php
            if($submitted){
                echo("<br>");
                echo('<table border="1" cellspacing="0" cellpadding="2">'.'<tr><th>File Name</th><th>Records</th><th>Total</th></tr>');
                echo('<tr><td>'.$file['name'].'</td><td>'.$fp->countRecords($rows).'</td><td>'.$fp->sumMoney($rows).'</td></tr></table>');
                echo "<br>";
                echo ( //build data table and header
                        '<table border="1" cellspacing="0" cellpadding="2">'
                        . '<tr><th>Acct</th><th>Phone Number</th><th>Amount</th></tr>'
                );
                foreach ($rows as $row) {
                    $fp->buildRow($row);
                }
                echo("</table>");
            }
        ?>
    </body>
</html>
