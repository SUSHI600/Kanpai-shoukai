<?php session_start(); ?>
<?php 
    echo '<!DOCTYPE html>';
    echo '<html long="ja">';

    echo '<head>';
    echo '<link rel="stylesheet" href="./css/login.css">';
    echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">';

        require 'db-connect.php';
        require 'header.php';

        echo '<p class="title">ログイン</p>';
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
        echo '<p class="info">アカウントがない方は<a href="./Frame22input.php">こちら</a></p>';

        echo '<script src="./js/login.js"></script>';
?>

        <?php include './footer.php'; ?>