<!DOCTYPE html>
<html lang="ja">
<head>
<?php include 'header.php'; ?>
<?php session_start(); ?>
<?php include 'db-connect.php'; ?>
<h2>マイページ</h2>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from user where id=?');
    $sql->execute(8);
    echo '<h2>ユーザーネーム</h2>';
    echo $sql['name'];
    echo '<h2>メールアドレス</h2>';
    echo $sql['e_mail'];
    echo '<h2>生年月日</h2>';
    echo $sql['birthday'];
?>
<form action="mpupdate.php">
    <input type="submit" value="更新">
</form>