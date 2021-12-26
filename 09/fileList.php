<?php
$cwd= getcwd();
$fileArr= scandir($cwd."/files");
$links="";
$numFiles= sizeof($fileArr);
for($i=2; $i<$numFiles; $i++){
    $links .= "<li><a target='_blank' href='files/".$fileArr[$i]."'>".$fileArr[$i]."</a></li>";
}
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>List of PDF files</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>List of Files</h1>
            <a href="pdfForm.php">Add a file</a>
            <ul>
                <?php echo $links;?>
            </ul>
        </div>
    </body>
</html>
