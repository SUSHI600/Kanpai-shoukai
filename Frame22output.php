<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/frame22.css">
    <link rel="stylesheet" href="./css/frame7.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $name = $_POST['name'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $mail = $_POST['e_mail'];
        $birthday = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
        $postcode = $_POST['post'] . '-' . $_POST['code'];
        $address = $_POST['address'];

        $sql = $pdo->prepare("insert into user values(null, ?, ?, ?, ?, ?, ?)");
        $sql->execute([$name, $birthday, $mail, $pass, $postcode, $address]);

        $pdo->commit();

        echo '<div class="div7 container-fluid">';
        echo '<p class="row justify-content-center">お客様情報を登録しました。</p>';
        echo '<a href="./toppage.php">';
        echo 'TOPページへ';
        echo '</a></div>';

        $_SESSION['user'] = [
            'id' => $pdo->lastInsertId(), 'name' => $name, 'birthday' => $birthday,
            'e_mail' => $mail, 'password' => $pass, 'postcode' => $postcode,
            'address' => $address
        ];
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
        echo '</div>';
    }
    ?>

    <?php include './footer.php'; ?>