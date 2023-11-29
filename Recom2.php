<?php require 'db-connect.php'; ?>
<?php require 'header2.php' ;?>
<div class="recommendations">
<?php
    // データベースへの接続があると仮定
    try {
        $pdo = new PDO($connect, USER, PASS);

        // POSTリクエストからフォームデータがあると仮定
        $taste_id = $_POST['taste_id'];
        $country_id = $_POST['country_id'];

        // アンケート結果に基づいてアイテムをクエリ
        $stmt = $pdo->prepare('SELECT * FROM items WHERE taste_id = ? or country_id = ?');
        $stmt->execute([$taste_id,$country_id]);

        // おすすめのアイテムを表示
        foreach ($stmt as $row) {
            $id = $row['id'];
            echo '<a href="items.php?id=', $id, '">', "<img class='recommendation' src=", $row['image'], ">", '</a>';
        }

        // ... 以降のコード ...
    } catch (PDOException $e) {
        echo '接続に失敗しました: ' . $e->getMessage();
    }
?>
</div>
<?php include 'footer.php'; ?>