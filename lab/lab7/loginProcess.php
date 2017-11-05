<?php
session_start(); //starts or resumes an existing session


//validates the username and password
include '../../dbconnection.php';
$conn = getConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);



$sql = "SELECT *
        FROM q_admin
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

    $_SESSION['userName'] = $record['userName'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    header('Location: admin.php'); //redirects users to admin page

}





?>