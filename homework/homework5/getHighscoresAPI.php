<?php
    session_start();
    include '../../dbconnection.php';

    $conn = getConnection();

    $sql = "SELECT userId, COUNT(userId) AS userCount, ROUND(AVG(score),2) AS averageScore
            FROM q_quiz
            WHERE userId = :userId
            GROUP BY userId";

    $np = array();
    $np[":userId"]  = $_SESSION["userId"];

    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($np);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);

    echo json_encode($record);
?>