<?php 
require '../pdo.php';
function showNames(){
    $sql="SELECT * FROM assignment8 ORDER BY lastname_firstname";
    $results = execute($sql);
    
    foreach ($results as $record) {
        $names = $names . $record['lastname_firstname']."\n";
    }
    
    $nameArr[]=['names'=> $names];
    echo(json_encode($nameArr));
}
showNames();

?>
