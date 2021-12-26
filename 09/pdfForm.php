<?php
require 'fileUploadProc.php';
$upload = new fileUploadProc();
$test = "";
if (isset($_POST['submit']) && !empty($_FILES['myfile'])){

    if ($upload ->checkFileSize() && $upload ->checkFileSize() ){
        $upload ->uploadFile();
        $upload ->putInDb();
    }
    $test = $upload ->getFb();
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
        <title>Assignment 7</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>File Upload</h1>
            <a href="fileList.php">Show File List</a>
            <p><?php echo $test?></p>
            <form  action="" method ="POST" enctype="multipart/form-data">
                <div class="form-group">
                <label for="fileName">File Name</label>
                <input type="text" name="fileName" class="form-control">
                </div>

                <div class="form-group">
                <label for="file">File:</label>
                <input type="file" accept=".pdf" name="myfile"/>
                </div>
                
                <div class="form-group">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>    
    </body>
</html>
