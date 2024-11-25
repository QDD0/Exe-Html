<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <script src="script2.js"></script>
</head>

<body>
    <div class="form-container">
        <form id="loginForm" action="login.php" method="post">
            <h2 class="title">Вход</h2>
            <input type="text" placeholder="login" name="login">
            <input type="password" placeholder="password" name="password">
            <button type="submit">Вход</button>
            <p class="reg">Не зарегистрированы? <a href="#" onclick="toggleForms()">Регистрация</a></p>
        </form>

        <form id="registerForm" action="register.php" method="post" style="display: none;">
            <h2 class="reg-title">Регистрация</h2>
            <input type="text" placeholder="first name" name="first_name">
            <input type="text" placeholder="last name" name="last_name">
            <input type="text" placeholder="middle name" name="middle_name">
            <input type="text" placeholder="login" name="login">
            <input type="password" placeholder="password" name="password">
            <input type="password" placeholder="repeat password" name="repeat_password">
            <input type="text" placeholder="email" name="email">
            <button type="submit">Регистация</button>
            <p class="into">Уже зарегистрированы? <a href="#" onclick="toggleForms()">Вход</a></p>
        </form>
    </div>
</body>

</html>