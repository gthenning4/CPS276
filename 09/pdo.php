<?php

// If you include this file in your php script, you can simply call 'execute' to execute sql queries.


$db = null;
 
function getPDO() {
    global $db;
    if ($db != null) {
        return $db;
    }
    try {
        // This is the instructors connection string.
        // Substitute your own string if you wish to connect to your database.
        $db = new PDO('mysql:host=localhost;dbname=ghenning','ghenning','RGUzG9qgaRYJ');
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); 
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
//        echo("connected to db.");
        return $db;
    }
    catch (Exception $e2) {
        echo('DB Connection Error - ' . $e2->getMessage());
        exit();
    }
}

function execute($sql,$returnResults=true,$bindingValues=null) {
// Uncomment the following when debugging your sql
//echo($sql . '<br>');    

    $db = getPDO();
    try {
        $statement = $db->prepare($sql);
        if ($bindingValues != null) {
            for ($counter=0; $counter < sizeof($bindingValues); $counter++) {
                $statement->bindParam($counter + 1, $bindingValues[$counter]);
            }
        }
        if (!$statement) {
            echo('DB Prepare Error - ' . $sql);
            exit();
        }
        $statement->execute();
        $results = array();
        if ($returnResults) {
            $results = $statement->fetchAll();
        }
        $statement->closeCursor();
        return $results;
    }
    catch (Exception $e2) {
        echo('DB Error - ' . $sql);
        echo('<br>' . $e2->getMessage());
        exit();
    }
}
?>

