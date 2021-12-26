<?php
require_once "Writer.php";
$writer = new Writer();
if($_POST["folderName"] && $_POST["fileContent"]){
   $message = $writer -> doIt($_POST["folderName"],$_POST["fileContent"]);
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
        <title>Assignment 5</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>File and Directory Assignment</h1>
            <p>Enter a folder name and the contents of a file. Folder names should be exclusively alphanumeric.</p>
            <p><?php echo $message?></p>
            <form  action="" method ="POST">
                
                <div class="form-group">
                <label for="folderName">Folder Name</label>
                <input type="text" name="folderName" class="form-control">
                </div>

                <div class="form-group">
                <label for="fileContent">File Content</label>
                <textarea style="height: 400px;"  class="form-control" name="fileContent"></textarea>
                </div>
                
                <div class="form-group">
                <input type="submit" value="Submit" name="submitBtn" class="btn btn-primary">
                </div>
            </form>
        </div>
    </body>
</html>
