<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php require 'header2.php'; ?>
<?php
    // データベースへの接続があると仮定
    try {
        $pdo = new PDO($connect, USER, PASS);

        // POSTリクエストからフォームデータがあると仮定
        $id = $_SESSION['id'];
        $taste = $_POST['taste'];
        $kinds = $_POST['kinds'];
        $region = $_POST['region'];

        // アンケート結果をデータベースに挿入
        $stmt = $pdo->prepare('INSERT INTO fav_liquors (id,taste_id, liquor_id, country_id) VALUES (?, ?, ?, ?)');
        $stmt->execute([$id,$taste, $kinds, $region]);

        // ... 以降のコード ...
    } catch (PDOException $e) {
        echo '接続に失敗しました: ' . $e->getMessage();
    }
?>
<?php include 'footer.php'; ?>