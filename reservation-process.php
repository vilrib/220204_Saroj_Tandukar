<?php
$is_invalid = false;
session_start();
$mysqli = require __DIR__ . "/database.php";

if (!isset($_SESSION["user_id"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phonenum = $_POST["phonenum"];
    $guests = $_POST["guests"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];
}

if (isset($_SESSION["user_id"])) {
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    $name = $user["name"];
    $email = $user["email"];
    $phonenum = $user["phonenum"];
    $guests = $_POST["guests"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];
}

$sql = "INSERT INTO reservations (name, email, phonenum, guests, date, time, message)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ssiisss",
                $name,
                $email,
                $phonenum,
                $guests,
                $date,
                $time,
                $message);
              
    if ($stmt->execute()) {
    header("Location: index.php");
    exit;

    }

    $is_invalid = true;
?>









