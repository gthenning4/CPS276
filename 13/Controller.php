<?php
//* Current Customer System
require_once('../09/pdo.php');
require_once 'MyModel.php';
$name='';
$data = null;

if(!empty($_REQUEST['viewid'])){
    $id=$_REQUEST['viewid'];
    $row = MyModel::getModel()->getDataForId($id);
    $personID = $row['personID'];
    $person_name = $row['person_name'];
    $provider_number = $row['provider_number'];
    $locationID = $row['locationID'];
    require_once('detailsView.php');
    exit(1);
}
if (!empty($_REQUEST['save']) || !empty($_REQUEST['back'])) {
    if (!empty($_REQUEST['save'])) {
        MyModel::getModel()->updateRecord();
    }
    header("Location: Controller.php");
}
if(!empty($_REQUEST['editid'])){
    $id = $_REQUEST['editid'];
    $row = MyModel::getModel()->getDataForId($id);
    $personID = $row['personID'];
    $person_name = $row['person_name'];
    $provider_number = $row['provider_number'];
    $locationID = $row['locationID'];
    require_once 'editView.php';
    exit(1);
}
if (!empty($_REQUEST['deleteid'])) {
    $id=$_REQUEST['deleteid'];
    MyModel::getModel()->deleteRecord($id);
    
    $name = MyModel::getModel()->getNameFromSession();
    $data = MyModel::getModel()->getDataForName($name);
}
if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $data = MyModel::getModel()->getDataForName($name);
} 


require_once 'searchView.php';
?>


