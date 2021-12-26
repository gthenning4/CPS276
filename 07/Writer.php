<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Writer
 *
 * @author georgehenning
 */
class Writer {
    
    public $path="directories/";
 
    function dirExists($path, $dirName){
        $exists=false;
        $dirArr=scandir($path);
        foreach($dirArr as $thing){
            if($thing == $dirName){
                $exists = true;
            }
        }
        return $exists;
    }
    function writeFile($dirPath, $string){
        $file = fopen($dirPath."/readme.txt","w");
        fwrite($file, $string);
        fclose($file);
    }
    function doIt($dir,$str){
        $message=$this -> path." ".$dir;
            if(self::dirExists($this -> path, $dir)){
                $message = "A directory with that name already exists.";
            }
            else{
                $dirPath= $this -> path.$dir;
                mkdir($dirPath);
                self::writeFile($dirPath, $str);
                $message="File was created successfully: "."<a href='".$dirPath."/readme.txt'>".$dirPath."/readme.txt"."</a>"; 
            }
        return $message;
    }
}
