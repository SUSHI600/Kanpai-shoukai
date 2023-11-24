<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/frame5.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    $userId = 11;    // テスト用ID
    $itemId = $_GET['id'];

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $deleteSql = $pdo->prepare('delete from carts where user_id = ? and item_id = ?');
        $deleteSql->execute([$userId, $itemId]);

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
        echo '</div>';
    }

    $pdo = null;
    ?>

    <?php include './frame5_show.php'; ?>

    <script src="./js/frame5.js"></script>
    <?php include './footer.php'; ?>