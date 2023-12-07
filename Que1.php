<?php session_start();?>
<?php require 'db-connect.php'; ?>
<?php
    // データベースへの接続があると仮定
    try {
        $pdo = new PDO($connect, USER, PASS);

        // POSTリクエストからフォームデータがあると仮定
        if(isset($_SESSION['user']['id']) && isset($_POST['taste']) && isset($_POST['kinds']) && isset($_POST['region'])) {
        $id = $_SESSION['user']['id'];
        $taste = $_POST['taste'];
        $kinds = $_POST['kinds'];
        $region = $_POST['region'];

        
            $stmt = $pdo->prepare('INSERT INTO fav_liquors (id,taste_id, liquor_id, country_id) VALUES (?, ?, ?, ?)');
            $stmt->execute([$id,$taste, $kinds, $region]);
        header('Location: snackQue.php');
        }else{
            if(unset($_SESSION['user']['id'])){
                echo 'ログインしてください';
                echo '<a href="login-input.php">ログイン/新規登録へ</a>';
            }elseif(unset($_POST['taste']) || unset($_POST['kinds']) || unset($_POST['region'])){
                echo '選択していない項目があります';
                echo 'アンケートをやりなおしてください';
                echo '<button type="submit" class="return">アンケートに戻る</button>';
            }
        }
        // アンケート結果をデータベースに挿入
        // ... 以降のコード ...
    } catch (PDOException $e) {
        echo '＊情報が重複しています＊';
        echo '<form action="alcoholQue.php">';
        echo '<button type="submit" class="return">アンケートに戻る</button>';
        echo '</form>';
    }
?>
