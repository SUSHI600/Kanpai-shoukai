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
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $selectSql = $pdo->prepare("select * from user where id = ?");
        $selectSql->execute([$userId]);
        $select = $selectSql->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['nowPass'], $select['password'])) {
            $updateSql = $pdo->prepare("update user set password = ?");
            $updateSql->execute([password_hash($_POST['pass'], PASSWORD_DEFAULT)]);

            echo '<div class="div7 container-fluid">';
            echo '<p class="row justify-content-center">パスワードを変更しました。</p>';
            echo '<a href="./mypage.php">';
            echo 'マイページへ';
            echo '</a></div>';
        } else {
            echo '<div class="div7 container-fluid">';
            echo '<p class="row justify-content-center">現在のパスワードが正しくありません。</p>';
            echo '<a href="./passUpdate.php">';
            echo '戻る';
            echo '</a></div>';
        }

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo '<div class="container-fluid">';
        echo '<p class="row justify-content-center">エラーが発生しました。</p>';
        echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
        echo '</div>';
    }
    ?>

    <?php include './footer.php'; ?>