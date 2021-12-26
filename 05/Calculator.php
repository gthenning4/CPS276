<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calculator
 *
 * @author georgehenning
 */

class Calculator {
    private function goodData($op,$num1,$num2){
            if(is_string($op) && is_int($num1) && is_int($num2)){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    function calc($oper,$num1,$num2){
        $result=1;
        
        if (self::goodData($oper,$num1,$num2)){
            switch ($oper){
                case "+": 
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    if ($num2 != 0){
                        $result = $num1 / $num2;
                    }
                    else {
                        $result = "Cannot divide by 0.";
                    }
                    break;
                default: $result=("operand no bueno.");
            }
            return $result;
        }
        else{
            $result = "You must enter a string and two numbers.";
            return $result;
        }
    }
}
