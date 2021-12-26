<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fileUpload
 *
 * @author georgehenning
 */
class fileUpload {
    public function isCSV($file){
        $type=$file['type'];
        if($type == ("text/csv" ||"text/plain" )){
            return true;
        }
        else{
            return false;
        }
    }
    public function uploadFile(){
        if (!move_uploaded_file($_FILES['myfile']['tmp_name'], 'data/' . $_FILES['myfile']['name'])) {
            echo " Error occurred while moving uploaded file.";
        }
        return;
    }
    //put your code here
}
