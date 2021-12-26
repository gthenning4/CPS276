<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author george
 */
class Question {
    public $round;
    public $value;
    public $dailyDouble;
    public $category;        
    public $comments;
    public $clue;
    public $answer;
    public $date;
    public $notes;
    
    function __construct($round, $value, $dailyDouble, $category, $comments, $clue, $answer, $date, $notes) {
        $this->round = $round;
        $this->value = $value;
        $this->dailyDouble = $dailyDouble;
        $this->category = $category;
        $this->comments = $comments;
        $this->clue = $clue;
        $this->answer = $answer;
        $this->date = $date;
        $this->notes = $notes;
    }
    
    function tsvToQuestions($path){
        $contentsAsArray = file($path,FILE_SKIP_EMPTY_LINES);
        $rows = array();
        foreach ($contentsAsArray as $line) {
            $lineAsArray = split('\t',$line);
            $rows[]=$lineAsArray;
        }
        echo $rows;
    }

}
