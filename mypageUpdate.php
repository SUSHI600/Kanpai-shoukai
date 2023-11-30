<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/frame7.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    $userId = $_SESSION['user']['id'];
    $name = $_POST['name'];
    $birthday = $_POST['year']. '-'. $_POST['month']. '-'. $_POST['day'];
    $email = $_POST['email'];
    $postcode = $_POST['post'] . '-' . $_POST['code'];
    $address = $_POST['address'];

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $sql = $pdo->prepare("update user set name = ?, birthday = ?, e_mail = ?, postcode = ?, address = ? where id = ?");
        $sql->execute([$name, $birthday, $email, $postcode, $address, $userId]);

        $pdo->commit();

        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">更新しました。</p>';
        echo '<a href="./mypage.php">';
        echo 'マイページへ';
        echo '</a></div>';
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
        echo '</div>';
    }
    ?>

    <?php include './footer.php'; ?>