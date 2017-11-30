<?php
session_start(); //starts or resumes an existing session


//validates the username and password
include '../../dbconnection.php';
$conn = getConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);



$sql = "SELECT *
        FROM q_login
        WHERE username = :username
        AND   password = :password";

$namedParameters  = array();
$namedParameters[':username']  = $username;
$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);


if (empty($record)) {
    header("Location: index.php?login=false");
    exit;

} else {

    $_SESSION['userId'] = $record['userId'];
    header('Location: quiz.php');

}





?>