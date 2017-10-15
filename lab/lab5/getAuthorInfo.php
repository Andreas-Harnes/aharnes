<?php
    include '../../dbconnection.php';
    $conn = getConnection();

    $currentAuthor = $_GET["authorId"];

    $sql = "SELECT *
            FROM q_author
            WHERE authorId = '$currentAuthor'";

    $stmt = $conn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch();

    function getAuthorName() {
        global $record;
        echo "<h1>" . $record['firstName'] . " " . $record['lastName'] . "</h1>";

    }

    function getAuthorBio() {
        global $record;
        echo "<p>" . $record['biography'] . "</p>";
    }

    function getAuthorPic() {
        global $record;
        //echo $record["picture"];
        echo " <img src='". $record['picture'] . "' heigth='800' width='400'>";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title> Author information</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <?=getAuthorPic()?>
    <div id="currentAuthorInfo">
        <?=getAuthorName()?>
        <?=getAuthorBio()?>
    </div>

</body>

</html>
