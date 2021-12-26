<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calc output</title>
    </head>
    <body>
        <?php
        // put your code here
        require_once "Calculator.php";
        $Calculator = new Calculator();
        echo $Calculator->calc("/", 10, 0);
        echo("<br>");//will output Cannot divide by zero
        echo $Calculator->calc("*", 10, 2);
        echo("<br>");//will output The product of the numbers is 20
        echo $Calculator->calc("/", 10, 2);
        echo("<br>");//will output The division of the numbers is 5
        echo $Calculator->calc("-", 10, 2);
        echo("<br>");//will output The difference of the numbers is 8
        echo $Calculator->calc("+", 10, 2);
        echo("<br>");//will output The sum of the numbers is 12
        echo $Calculator->calc("*", 10);
        echo("<br>");//will output You must enter a string and two numbers
        echo $Calculator->calc(10);
        echo("<br>");//will output You must enter a string and two numbers
        echo $Calculator->calc("a",5,4);
        echo("<br>");//will output You must enter a string and two numbers
        ?>
    </body>
</html>
