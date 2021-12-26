<?php
    $nameStr="";
    $boxStr="";
    $boxArr= [];
    if($_POST["addNameBtn"]){
        if ($_POST["str"]){
            $input = $_POST["str"];
            $explodeArr = explode(" ",$input);
            $nameStr = $explodeArr[1].", ".$explodeArr[0]."\n";
//            $boxStr = $boxStr.$nameStr;
        }
        if($_POST["namelist"]){
                $explodeBox= explode("\n", $_POST["namelist"]);
                array_push($explodeBox,$nameStr);
                sort($explodeBox);
                foreach($explodeBox as $name){
                    $boxNames = $boxNames.$name;
                }
        }        
        else{
             $boxNames=$nameStr;
        }
        
        $boxData=$boxNames; 
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
        <title>Name List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
        <form  action="" method ="POST">
            <div class="form-group">
            <input type="submit" value="Add Name" name="addNameBtn" class="btn btn-primary">
            <input type="submit" value="Clear Names" name="clearNameBtn" class="btn btn-primary">
            </div>
            
            <div class="form-group">
            <label for="str">Enter Name</label>
            <input type="text" name="str" class="form-control">
            </div>
            
            <div class="form-group">
            <label for="namelist">List of Names</label>
            <textarea style="height: 400px;"  class="form-control" id="namelist" name="namelist"><?php echo $boxData?></textarea>
            </div>
        </form>
        </div>
    </body>
</html>
        