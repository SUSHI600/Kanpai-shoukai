<!DOCTYPE html>
<html lang="ja">
<head>
<?php include 'header.php'; ?>
<?php include 'db-connect.php'; ?>
<h2>マイページ</h2>
<?php
    if(isset($_SESSION['user'])){
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from user where id=8');
        echo '<h2>ユーザーネーム</h2>';
        echo $sql['name'];
        echo '<h2>メールアドレス</h2>';
        echo $sql['e_mail'];
        echo '<h2>生年月日</h2>';
        echo $sql['birthday'];
        echo '<form action="mpupdate.php">';
        echo '<input type="submit" value="更新">';
        echo '</form>';
    }else{
        header('Location: ./login-input.php');
    }
?>