<!DOCTYPE html>
<html long="ja">

<head>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <?php require 'db-connect.php'; ?>
    <?php require 'header.php'; ?>

    <p class="title">ログイン</p>
    <?php
    $mail = $password = '';
    echo '<form action="./login-output.php" method="post" name="loginForm">';
    echo '<table class="table">';
    echo '<tr><td class="subtitle">メールアドレス：</td><td>';
    echo '<input type="email" class="input" name="e-mail" id="name" value="', $mail, '">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">パスワード：</td><td>';
    echo '<input type="password" class="input" name="password" id="word" value="', $password, '">';
    echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
    echo '</td></tr>';
    echo '</table>';
    echo '<div class="submit" onclick="send()">ログイン</div>';
    echo '</form>';
    ?>
    <p class="info">
        アカウントがない方は
        <a href="./alcoholQue.php">こちら</a>
    </p>

    <script src="./js/login.js"></script>

    <?php include './footer.php'; ?>