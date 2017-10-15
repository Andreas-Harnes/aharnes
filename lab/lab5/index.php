<?php

    include '../../dbconnection.php';
    $conn = getConnection();

    $sql = "SELECT authorId, quote, firstName, lastName
                FROM q_quote
                NATURAL JOIN q_author
                ORDER BY RAND()
                LIMIT 1 ";

    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch();


    function getRandomQuote() {
        global $record;

        echo "<em>" . $record['quote'] . "</em><br />";
        echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=" . $record['authorId'] . "' >- " . $record['firstName'] . " " . $record['lastName'] . "</a>";

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

    <iframe id="authorIframe" name="authorInfo" width="600" height=1000></iframe>


    </body>
</html>