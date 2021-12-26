<?php
require 'pdo.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fileUploadProc
 *
 * @author georgehenning
 */
class fileUploadProc {
    
    public static $feedback="";
    
    public function getFb() {
        return  self::$feedback;
    }
    public function checkFileSize($size){
        $size = $_FILES['myfile']['size'];
        if($size <= 100000){
            return true;
        }
        else{
            self::$feedback .= " File is too large.";
            return false;
        }
    }
    public function checkFileType($type){
        $type=$_FILES['myfile']['type'];
        if($type == "application/pdf"){
            return true;
        }
        else{
            return false;
        }
    }
    public function uploadFile(){
        if (!move_uploaded_file($_FILES['myfile']['tmp_name'], 'files/' . $_REQUEST['fileName'])) {
            self::$feedback .= " Error occurred while moving uploaded file.";
        }
        else{
            self::$feedback ="File succesfully stored.";
        }
        return;
    }
    public function putInDb(){
        $file=$_POST['fileName'];
        $path="files/".$file;
        $sql='INSERT INTO pdfs (pdf_name, pdf_path) VALUES ("'.$file.'","'.$path.'")';
        execute($sql,true);
    }
    
}
                
    
    
    //put your code her
