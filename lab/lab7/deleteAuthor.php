<?php
session_start();

if (!isset($_SESSION['userName'])) { //checks whether admin has already logged in

    header("Location: index.php");
    exit;

}

include '../../dbconnection.php';
$conn = getConnection();

$sql = "DELETE FROM q_author WHERE authorId = " . $_GET['authorId'];

$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: admin.php');


?>