<!DOCTYPE html>
<html lang="ja">
<head>
<?php include 'header.php'; ?>
<p>会員情報</p>
<form action="mypage.php" method="post">
    <?php
        echo '<p>ユーザーネーム:<input type="text" name="username" value="',$_SESSION['user']['name'],'"></p>';
        echo '<p>パスワード:<input type="password" name="password" value="',$_SESSION['user']['password'],'"></p>';
        echo '<p>メールアドレス:<input type="text" name="mailaddress" value="',$_SESSION['user']['e_mail'],'"></p>';
    ?>
    <button type="submit">更新</button> 
</form>
<form action="rivalconfilm.php" method="post">
    <button>退会</button>
</form>
<?php include 'footer.php'; ?>