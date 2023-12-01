<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php
    // データベースへの接続があると仮定
    try {
        $pdo = new PDO($connect, USER, PASS);

        // POSTリクエストからフォームデータがあると仮定
        $id = $_SESSION['user']['id'];
        $taste = $_POST['taste'];
        $region = $_POST['region'];

        // アンケート結果をデータベースに挿入
        $stmt = $pdo->prepare('INSERT INTO fav_snack (id,taste_id,country_id) VALUES ( ?, ?, ?)');
        $stmt->execute([$id,$taste,$region]);
        header('Location: login-input.php');
        // ... 以降のコード ...
    } catch (PDOException $e) {
        echo '＊情報が重複しています＊';
        echo '<form action="snackQue.php">';
        echo '<button type="submit" class="return">アンケートに戻る</button>';
        echo '</form>';
    }
?>
