<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="register.php" method="post">
        <input type="text" placeholder="first name" name="first_name">
        <input type="text" placeholder="last name" name="last_name">
        <input type="text" placeholder="middle name" name="middle_name">
        <input type="text" placeholder="login" name="login">
        <input type="text" placeholder="password" name="password">
        <input type="text" placeholder="repeat password" name="repeat_password">
        <input type="text" placeholder="email" name="email">
        <button type="submit">Регистация</button>
    </form>

    <form action="login.php" method="post">
        <input type="text" placeholder="login" name="login">
        <input type="text" placeholder="password" name="password">
        <button type="submit">Вход</button>
    </form>
</body>

</html>