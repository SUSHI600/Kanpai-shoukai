<?php session_start(); ?>
<link rel="stylesheet" href="css/mypage.css">
<?php
    if(isset($_SESSION['user'])){
        echo '<!DOCTYPE html>';
        echo '<html lang="ja">';
        include 'header.php';
        include 'db-connect.php';
        echo '<h2>マイページ</h2>';
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('select * from user where id=?');
        $sql->execute([$_SESSION['user']['id']]);
        foreach($sql as $row){
            echo '<h6>ユーザーネーム</h6>';
            echo '<h3>',$row['name'],'</h3>';
            echo '<h6>メールアドレス</h6>';
            echo '<h3>',$row['e_mail'],'</h3>';
            echo '<h6>生年月日</h6>';
            echo '<h3>',$row['birthday'],'</h3>';
            echo '<form action="mpupdate.php">';
            echo '<input type="submit" value="更新">';
            echo '</form>';
        }
    }else{
        header('Location: ./login-input.php');
        exit();
    }
?>