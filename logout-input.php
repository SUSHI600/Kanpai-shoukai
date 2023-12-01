<?php session_start(); ?>
<link rel="stylesheet" href="css/logout-input.css">
<?php
    if(isset($_SESSION['user'])){
        require 'header.php';
        echo '<p>ログアウトしますか？</p>';
        echo '<a class="logout" href="logout-output.php">ログアウト</a>';
        require 'footer.php';
    }else{
        header('Location: ' . './login-input.php', true, 301);
        exit();
    } 
?>