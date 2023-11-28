<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/frame7.css">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <?php
    unset($_SESSION['user']);
    $mail = $_POST['e-mail'];
    $pass = $_POST['password'];
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $sql = $pdo->prepare("select * from user where e_mail = ?");
        $sql->execute([$mail]);

        foreach ($sql as $row) {
            if (password_verify($pass, $row['password'])) {
                $_SESSION['user'] = [
                    'id' => $row['id'], 'name' => $row['name'], 'birthday' => $row['birthday'],
                    'e_mail' => $row['e_mail'], 'password' => $row['password'], 'postcode' => $row['postcode'],
                    'address' => $row['address']
                ];
            }
        }

        if (isset($_SESSION['user'])) {
            echo '<div class="div7 container-fluid">';
            echo '<p class="row justify-content-center">ログインしました。</p>';
            echo '<a href="./toppage.php">';
            echo 'TOPページへ';
            echo '</a></div>';
        } else {
            echo '<div class="div7 container-fluid">';
            echo '<p class="row justify-content-center">メールアドレスまたはパスワードが違います。</p>';
            echo '<a href="./login-input.php">';
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