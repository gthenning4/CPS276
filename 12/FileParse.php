<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileParse
 *
 * @author georgehenning
 */
class FileParse {
    public $moneyPattern ='/\$\d{0,}\.\d{2}/';
    public $acctPattern='/[a-zA-Z]{2}((\d{8})|(\d{4}))/';
    public $phonePattern='/(\({0,1}\d{3}\){0,1}){0,1}[\s\-]{0,1}\d{3}[\s\-]\d{4}/';
    public $totalMoney=0;
    
    public function buildCell($data){
        return $cell="<td>".$data."</td>";
    }
    public function printMessage(){
        echo "This is a happy message";
    }
    public function buildRow($row){
    $numMatched=0;
    $dataArr=array("","","");
    for($i=0; $i<sizeof($row); $i++){
        $string = $row[$i];
        
        if(preg_match($this->acctPattern,$string, $matches)){
            foreach($matches as $match){
                if(preg_match($this->acctPattern, $match)){
                   $dataArr[0]=$match;
                   $numMatched++;
                }
            }
            
        }
        if(preg_match($this->phonePattern, $string, $matches)){
            foreach($matches as $match){
                if(preg_match($this->phonePattern, $match)){
                   $dataArr[1]=$match;
                   $numMatched++;
                }
            }
        }
        if(preg_match($this->moneyPattern,$string,$matches)){
            foreach($matches as $match){
                if(preg_match($this->moneyPattern, $match)){
                   $dataArr[2]=$match;
                   $numMatched++;
                }
            }
        } 
     }
        $cellStr="";
        foreach($dataArr as $data){
            $cellStr .= self::buildCell($data);
        }
        if($numMatched>0){
            $tableRow="<tr>".$cellStr."</tr>";
            echo $tableRow;
        }
        
    }
    public function sumMoney($rows){
        $money=0;
        foreach ($rows as $row) {
            for($i=0; $i<sizeof($row); $i++){
                $string = $row[$i];
                if(preg_match($this->moneyPattern, $string, $matches)){
                    foreach($matches as $match){
                        $money += (float)substr($match,1,-1);
                    }
                    
                }
                
            }
        }
        setlocale(LC_MONETARY, 'en_US.UTF-8');
        $money=money_format('%.2n', $money);
        return $money;
    }
    public function countRecords($rows){
        $numRecs=0;
        foreach ($rows as $row) {
            $recsFound=false;
            for($i=0; $i<sizeof($row); $i++){
                $string = $row[$i];
                if(self::matchesAnyPattern($string)){
                    $recsFound=true;
                } 
            }
            if($recsFound == true){
                $numRecs++;
            }
        }
        return $numRecs;
    }
    public function matchesAnyPattern($string){
        $match=false;
        if(preg_match($this->moneyPattern, $string)){
                    $match=true;
        }
        else if(preg_match($this->acctPattern, $string)){
                    $match=true;
        }
        else if(preg_match($this->phonePattern, $string)){
            $match=true;
        }
        return $match;
    }
    //put your code here
}

?>
