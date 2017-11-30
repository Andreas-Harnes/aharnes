<?php

include '../../dbconnection.php';

$conn = getConnection();

    $sql = "SELECT username
            FROM q_login
            WHERE username = :username";

    $stmt = $conn -> prepare ($sql);
    $stmt -> execute( array(":username"=>$_GET['username']) );
    $record = $stmt -> fetch(PDO::FETCH_ASSOC);


    echo json_encode($record);


?>
