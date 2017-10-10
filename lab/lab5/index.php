<?php

$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getMaleAuthors() {

    global $dbConn;

    $sql = "SELECT firstName, lastName, gender FROM q_author WHERE gender = 'M'";

    $stmt = $dbConn -> prepare ($sql);

    $stmt -> execute();

    $records = $stmt -> fetchAll();  //retrieves all records;

    foreach($records as $record) {

        echo $record['firstName'] . "  " . $record['lastName'] . "<br />";

    }

}

function getAllQuotes() {
    global $dbConn;

    $sql = "SELECT quote FROM q_quote";

    $stmt = $dbConn -> prepare ($sql);

    $stmt -> execute();

    $records = $stmt -> fetchAll();  //retrieves all records;

    foreach($records as $record) {

        echo $record['quote'] . "<br />";

    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
    </head>
    <body>

<h1> Male Authors </h1>
<?=getMaleAuthors()?>

<h1> All Quotes </h1>
<?=getAllQuotes()?>


    </body>
</html>