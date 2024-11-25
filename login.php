<?php

require_once('db.php');

$login = $_POST["login"];
$password = $_POST["password"];

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if (empty($login) || empty($password)) {
    die("Error: All fields are required.");
} else {
    $sql = "SELECT * FROM users WHERE login = '$login'";
    $result = pg_query($conn, $sql);
    if (pg_num_rows($result) == 0) {
        die("Error: User not found.");
    }

    $row = pg_fetch_assoc($result);

    if (!password_verify($password, $row["password"])) {
        die("Error: Invalid password.");
    } else {
        header("Location: index.html");
    }
}
