<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/frame7.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    $userId = 5;    // テスト用ID
    $today = date("Y-m-d"); //今日の日付
    $items = array();   // 商品ID
    $price = array();   // 商品単価
    $quantity = array();    // 購入数量

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // エラー時に例外を投げるよう設定
        $pdo->beginTransaction();

        $cartSql = $pdo->prepare("select * from carts where user_id = ?");
        $cartSql->execute([$userId]);    // 現在ログイン中のユーザーIDと一致しているかどうか

        // 購入履歴挿入処理
        $total = 0;
        $itemSql = $pdo->prepare("select * from items where id = ?");

        foreach ($cartSql as $cartRow) {
            $item = $cartRow['item_id'];
            $itemSql->execute([$item]);
            $itemRow = $itemSql->fetch(PDO::FETCH_ASSOC);   // 連想配列として取得

            if ($itemRow) {
                $total += $itemRow['price'];
                array_push($price, $itemRow['price']);  // 商品単価格納
                array_push($items, $item);  // 商品ID格納
                array_push($quantity, $cartRow['quantity']);    // 購入数量格納
            }
        }

        $historiesSql = $pdo->prepare("insert into histories(user_id, bought_date, total) values(?, ?, ?)");
        $historiesSql->execute([$userId, $today, $total]);

        // 購入履歴詳細挿入処理
        $hDetailId = $pdo->lastInsertId();

        for ($i = 0; $i < count($items); $i++) {
            $hDetailSql = $pdo->prepare("insert into history_details(history_id, item_id, bought_quantity, price) values(?, ?, ?, ?)");
            $hDetailSql->execute([$hDetailId, $items[$i], $quantity[$i], $price[$i]]);
        }

        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">購入が完了しました。</p>';
        echo '<p class="row justify-content-center">お買い上げありがとうございます。</p>';
        echo '<p class="row justify-content-center">またのお越しをお待ちしております。</p>';
        echo '<a href="./frame16.php">';
        echo '<div class="background"></div>';
        echo 'TOPページへ';
        echo '</a></div>';
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center error">', $e->getMessage(), '</p>';
        echo '</div>';
    }

    $pdo = null;
    ?>

    <?php include './footer.php'; ?>