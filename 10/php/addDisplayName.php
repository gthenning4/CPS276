<?php
require '../pdo.php';

$data = $_REQUEST['data'];
$decoded = json_decode($data);
$name=$decoded->name;
$exploded= explode(" ", $name);
$nameStr= $exploded[1].",".$exploded[0];

$sql = "INSERT INTO assignment8 (lastname_firstname) VALUES ('".$nameStr."')";
execute($sql);


function showNames(){
    $query="SELECT * FROM assignment8 ORDER BY lastname_firstname";
$results = execute($query);

foreach ($results as $record) {
    $names = $names . $record['lastname_firstname']."\n";
}
$nameArr[]=['names'=> $names];

console.log($names);
echo(json_encode($nameArr));
}

showNames();


//write the code for adding and displaying the names here when the "Add Name" button is clicked
?>

