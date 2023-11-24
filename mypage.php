<?php session_start(); ?>
<?php
    if(isset($_SESSION['user'])){
        echo '<!DOCTYPE html>';
        echo '<html lang="ja">';
        include 'header.php';
        include 'db-connect.php';
        echo '<h2>マイページ</h2>';
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from user where id=?');
        $sql->execute([$_SESSION['user']]);
        $row = $sql;
        echo '<h2>ユーザーネーム</h2>';
        echo $row['name'];
        echo '<h2>メールアドレス</h2>';
        echo $row['e_mail'];
        echo '<h2>生年月日</h2>';
        echo $row['birthday'];
        echo '<form action="mpupdate.php">';
        echo '<input type="submit" value="更新">';
        echo '</form>';
    }else{
        header('Location: ./login-input.php');
        exit();
    }
?>