<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
    if (empty($_POST['name']) || empty($_POST['e_mail']) || empty($_POST['postcode']) || empty($_POST['address']) || empty($_POST['password'])) {
        echo '空欄の項目を埋めてください。';
    } elseif ($_POST['password'] !== $_POST['password1']) {
        echo 'パスワードとパスワード確認が一致しません。';
    } elseif (!filter_var($_POST['e_mail'], FILTER_VALIDATE_EMAIL)) {
        echo '有効なメールアドレスを入力してください。';
    } else {
    $birthday = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];

    $pdo=new PDO('mysql:host=mysql216.phy.lolipop.lan;dbname=LAA1516892-kaihatu;charset=utf8','LAA1516892','iu8yt5tghji9jhg');
    if(isset($_SESSION['user'])){
       $id=$_SESSION['user']['id'];
       $sql=$pdo->prepare('select * from user where id!=? and name=?');
       $sql->execute([$id, $_POST['name']]);
    }else{
       $sql=$pdo->prepare('select * from user where name=?');
       $sql->execute([$_POST['name']]);
    }
    if(empty($sql->fetchAll())){
        $sql=$pdo->prepare('insert into user values(null,?,?,?,?,?,?)');
        $sql->execute([
            $_POST['name'], $birthday, $_POST['e_mail'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['postcode'], $_POST['address']]);
            echo 'お客様情報を登録しました。';
            echo '<form action="frame16.php" method="post">';
            echo '<input type="submit" value="TOPページへ">';
            echo '</form>';
    }else{
        echo 'ログイン名がすでに使用されていますので、変更してください。';
    }
    }
?>