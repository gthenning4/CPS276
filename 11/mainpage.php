<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_REQUEST['logout']){
    session_unset();
    session_destroy();
    header('location:login.php');
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
        <title>Main Page</title>
    </head>
    <body>
        <?php
        echo "username: ".$_SESSION['username']."<br>";
        echo "account: ".$_SESSION['account']."<br><br>";
        echo "Date: " . date("m/d/Y") . "<br>";
        ?>
        <form method="post" action="">
            <input type="submit" value="Log Out" name="logout">
        </form>
    </body>
</html>
