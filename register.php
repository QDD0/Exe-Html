<?php

require_once('db.php');

$f_name = $_POST["first_name"];
$l_name = $_POST["last_name"];
$m_name = $_POST["middle_name"];
$login = $_POST["login"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat_password"];
$email = $_POST["email"];

if ($password !== $repeat_password) {
    die("Error: Passwords do not match.");
}

if (empty($f_name) || empty($l_name) || empty($m_name) || empty($login) || empty($password) || empty($email)) {
    die("Error: All fields are required.");
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$f_name = pg_escape_string($conn, $f_name);
$l_name = pg_escape_string($conn, $l_name);
$m_name = pg_escape_string($conn, $m_name);
$login = pg_escape_string($conn, $login);
$email = pg_escape_string($conn, $email);

$sql = "INSERT INTO users (first_name, last_name, middle_name, login, password, email) 
        VALUES ('$f_name', '$l_name', '$m_name', '$login', '$hashed_password', '$email')";

$result = pg_query($conn, $sql);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
} else {
    echo "User registered successfully!";
}

pg_close($conn);
