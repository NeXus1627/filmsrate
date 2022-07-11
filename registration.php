<?php
session_start();
include 'admin/includes/db_admin.php';

if (isset($_POST['reg_user'])) {
    $username = $_POST['email'];
    $password = $_POST['password_1'];
    $password2 = $_POST['password_2'];
    $usertype = '0';
    if (strcasecmp($password,$password2) == 0) {
        $query = $link->query("INSERT INTO users(user_login,user_password,user_rights) VALUES('$username','$password','$usertype')");
        if ($query) {
            $_SESSION['success'] = 'Зареєстровано';
            header('Location: registration.php');
        } else {
            $_SESSION['status'] = 'Не зареєстровано';
            header('Location: registration.php');
        }
    }
    else{
        $_SESSION['status'] = 'Паролі не співпадають';

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Реєстрація</title>
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
    <h2>Реєстрація</h2>
    <?php if(isset($_SESSION['status']) && $_SESSION['status']!=""): ?>
        <h3 class="text-danger text-center"><?php echo $_SESSION['status']; session_destroy(); ?></h3>
    <?php  endif;?>
</div>

<form method="post" action="registration.php">

    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" >
    </div>
    <div class="input-group">
        <label>Пароль</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Повторіть пароль</label>
        <input type="password" name="password_2">
        <input type="hidden" name="right" value="0">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Зареєструватись</button>
    </div>
</form>
</body>
</html>