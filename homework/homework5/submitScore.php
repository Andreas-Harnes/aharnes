<?php
session_start();
include '../../dbconnection.php';
     $conn = getConnection();

     $sql = "INSERT INTO q_quiz
            (userId, score)
            VALUES
            (:userId, :score)";
     $np = array();
     $np[":userId"]  = $_SESSION["userId"];
     $np[":score"]  = $_GET['score'];

     $stmt = $conn->prepare($sql);
     $stmt->execute($np);
?>
