<?php

    include '../../dbconnection.php';
    $conn = getConnection();


    function getRandomQuote() {
        global $conn;

        $sql = "SELECT authorId, quote, firstName, lastName
                FROM q_quote
                NATURAL JOIN q_author
                ORDER BY RAND()
                LIMIT 1 ";

            $stmt = $conn -> prepare ($sql);
            $stmt -> execute();
            $record = $stmt -> fetch();

        echo "<em>" . $record['quote'] . "</em><br />";
        echo "<a href='getAuthorInfo.php?authorId=" . $record['authorId'] . "' target='_blank'>- " . $record['firstName'] . " " . $record['lastName'] . "</a>";

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random quotes </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            #currentAuthorInfo {
                margin-top: 200px;
            }
        </style>
    </head>
    <body>

    <div id="currentAuthorInfo">
        <h2>Random quote</h2>
        <?=getRandomQuote()?>
    </div>

    </body>
</html>