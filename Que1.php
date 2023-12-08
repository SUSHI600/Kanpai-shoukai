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
            echo '<link rel="stylesheet" href="css/Que.css">';
            require 'header2.php';
            if(!isset($_SESSION['user']['id'])){
                echo '<div class="error">';
                echo '<h3>ログインしてください</h3>';
                echo '<a href="login-input.php"><h5>ログイン/新規登録へ</h5></a>';
                echo '</div>';
            }elseif(!isset($_POST['taste']) || !isset($_POST['kinds']) || !isset($_POST['region'])){
                echo '<div class="error">';
                echo '<h3>選択していない項目があります<br>';
                echo 'アンケートをやりなおしてください</h3>';
                echo '<a href="alcoholQue.php"><h5>アンケートに戻る</h5></a>';
                echo '</div>';
            }
        }
        // アンケート結果をデータベースに挿入
        // ... 以降のコード ...
    } catch (PDOException $e) {
        echo '<!DOCTYPE html>';
        echo '<html lang="ja">';
        echo '<head>';
        echo '<link rel="stylesheet" href="css/Que.css">';
        require 'header2.php';
        echo '<div class="error">';
        echo '<h3>＊情報が重複しています＊</h3>';
        echo '<a href="alcoholQue.php"><h5>アンケートに戻る</h5></a>';
        echo '</div>';
    }
?>
<?php require 'footer.php'; ?>
