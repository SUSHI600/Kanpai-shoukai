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
            echo '<!DOCTYPE html>';
            echo '<html lang="ja">';
            echo '<head>';
            require 'header2.php';
            if(!isset($_SESSION['user']['id'])){
                echo 'ログインしてください';
                echo '<a href="login-input.php">ログイン/新規登録へ</a>';
            }elseif(!isset($_POST['taste']) || !isset($_POST['kinds']) || !isset($_POST['region'])){
                echo '<p>選択していない項目があります</p>';
                echo '<p>アンケートをやりなおしてください</p>';
                echo '<a href="alcoholQue.php">アンケートに戻る</a>';
            }
        }
        // アンケート結果をデータベースに挿入
        // ... 以降のコード ...
    } catch (PDOException $e) {
        require 'header2.php';
        echo '＊情報が重複しています＊';
        echo '<a href="alcoholQue.php">アンケートに戻る</a>';
    }
?>
<?php require 'footer.php'; ?>
