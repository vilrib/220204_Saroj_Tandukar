<?php

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (name, uname, email, phonenum, password_hash)
        VALUES (?, ?, ?,?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssis",
                    $_POST["name"],
                    $_POST["uname"],
                    $_POST["email"],
                    $_POST["phonenum"],
                    $password_hash);
                  
if ($stmt->execute()) {
    header("Location: login.php");
    exit;
    
}
?>








