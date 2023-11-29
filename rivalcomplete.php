<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/frame7.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    $userId = $_SESSION['user']['id'];

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // エラー時に例外を投げるよう設定
        $pdo->beginTransaction();

        $userSql = $pdo->prepare("select * from user where id = ?");
        $userSql->execute([$userId]);
        $user = $userSql->fetch(PDO::FETCH_ASSOC);

        $archiveSql = $pdo->prepare("insert into del_users values(?, ?, ?)");
        $archiveSql->execute([$user['id'], $user['birthday'], $user['postcode']]);

        $userArchiveId = $user['id'];

        $historySql = $pdo->prepare("select id from histories where user_id = ?");
        $historySql->execute([$userId]);
        $history = $historySql->fetch(PDO::FETCH_ASSOC);

        if ($history !== false) {
            $delHistoryDetailSql = $pdo->prepare("delete from historie_details where history_id = ?");
            $delHistoryDetailSql->execute([$history['id']]);

            $delHistorySql = $pdo->prepare("delete from histories where user_id = ?");
            $delHistorySql->execute([$userId]);
        }

        $deleteSql = $pdo->prepare("delete from user where id = ?");
        $deleteSql->execute([$userId]);

        $favLiquorSql = $pdo->prepare("select * from fav_liquors where user_id = ?");
        $favLiquorSql->execute([$userId]);
        $favLiquor = $favLiquorSql->fetch(PDO::FETCH_ASSOC);
        if ($favLiquor !== false) {
            $archiveLiquorSql = $pdo->prepare("insert into del_fav_liquor values(?, ?, ?, ?)");
            $archiveLiquorSql->execute([$userArchiveId, $favLiquor['taste_id'], $favLiquor['liquor_id'], $favLiquor['country_id']]);

            $delLiquorSql = $pdo->prepare("delete from fav_liquors where id = ?");
            $delLiquorSql->execute([$userId]);
        }

        $favSnackSql = $pdo->prepare("select * from fav_snack where id = ?");
        $favSnackSql->execute([$userId]);
        $favSnack = $favSnackSql->fetch(PDO::FETCH_ASSOC);
        if ($favSnack !== false) {
            $archiveSnackSql = $pdo->prepare("insert into del_fav_snacks values(?, ?, ?)");
            $archiveSnackSql->execute([$userArchiveId, $favSnack['taste_id'], $favSnack['country_id']]);

            $delLiquorSql = $pdo->prepare("delete from fav_snack where id = ?");
            $delLiquorSql->execute([$userId]);
        }

        $pdo->commit();

        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">退会が完了しました。</p>';
        echo '</div>';
        unset($_SESSION['user']);
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
        echo '</div>';
    }

    $pdo = null;
    ?>

    <?php include './footer.php'; ?>