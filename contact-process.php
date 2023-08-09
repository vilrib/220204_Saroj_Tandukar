<?php
$is_invalid = false;
session_start();
$mysqli = require __DIR__ . "/database.php";

if (!isset($_SESSION["user_id"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
}

if (isset($_SESSION["user_id"])) {
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    $name = $user["name"];
    $email = $user["email"];
    $message = $_POST["message"];
}

$sql = "INSERT INTO contactus (name, email, message)
VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss",
                $name,
                $email,
                $message);
              
    if ($stmt->execute()) {
    header("Location: index.php");
    exit;

    }

    $is_invalid = true;
?>









