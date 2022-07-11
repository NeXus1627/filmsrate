<?php
include 'admin/includes/db_admin.php';
session_start();
if (isset($_POST['login_user'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = $link->query("SELECT * FROM users WHERE user_login = '$email_login' AND user_password = '$password_login'");
    $auth = $query->fetch_assoc();
    if ($query) {
        $_SESSION['login'] = $email_login;
        header('Location: MainPage.php');
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <title>Вхід у систему</title>
</head>
<body>
<style>
    body {
        background: url("img/background.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        -background-size: cover;
        height: 100%;
    }
</style>
<div class="header">
    <h2>Вхід</h2>
</div>
<div class = "formg">
<form method="post" action="login.php" >
    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" >
    </div>
    <div class="input-group">
        <label>Пароль</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Увійти</button>
    </div>
</form>
</div>
</body>
</html>