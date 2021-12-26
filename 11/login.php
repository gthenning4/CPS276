<?php
require 'pdo.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}  
$message='';
if (!empty($_REQUEST['username']) && !empty($_REQUEST['pw'])) {

    $user=$_REQUEST['username'];
    $pw = md5($_REQUEST['pw']);
    $secretKey = 'CPS276';
    $cipherMethod = 'AES-128-CBC';
    
    $sql="SELECT * FROM assignment9 WHERE username='".$user."' AND password='".$pw."';";
    $results = execute($sql);
    if(($results[0]['username'] == $user) && ($results[0]['password'] == $pw) ){
        $message = "user was found";
        $_SESSION['username'] = $user;
        $decryptAccount = @openssl_decrypt ($results[0]['account'],$cipherMethod , $secretKey);
        $_SESSION['account'] = $decryptAccount;
        header("Location: mainpage.php"); 
    }
    else{
        $message = "User not found in db. Please try again.";
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
        <title>Assignment 9</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>Login Page</h1>
            <form  action="login.php" method ="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username" >User Name</label>
                    <input type="text" name="username" class="form-control ">
                </div>

                <div class="form-group" >
                <label for="pw">Password</label>
                <input type="password" name="pw" class="form-control"/>
                </div>
                
                <div class="form-group">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
                </div>
            </form>
            <p><?php echo $message ?></p>
        </div>    
    </body>
</html>