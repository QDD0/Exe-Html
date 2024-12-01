<?php

global $conn;
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

$avatarPath = null;
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileTmpPath = $_FILES['avatar']['tmp_name'];
    $fileName = basename($_FILES['avatar']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($fileExt, $allowedExts)) {
        $newFileName = uniqid('avatar_', true) . '.' . $fileExt;
        $destPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $avatarPath = pg_escape_string($conn, $destPath);
        } else {
            die("Error: Unable to save the uploaded file.");
        }
    } else {
        die("Error: Invalid file format. Allowed formats are jpg, jpeg, png, gif.");
    }
}

$sql = "INSERT INTO users (first_name, last_name, middle_name, login, password, email, avatar) 
        VALUES ('$f_name', '$l_name', '$m_name', '$login', '$hashed_password', '$email', '$avatarPath')";

$result = pg_query($conn, $sql);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
} else {
    header("Location: index.html");
}

pg_close($conn);
?>