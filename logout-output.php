<?php session_start () ; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/logout-input.css">
    <?php require 'header.php'; ?>

    <?php
    if (isset ($_SESSION['user'])) {
    unset ($_SESSION['user']);
    echo'<p>ログアウトしました。</p>';
    } else {
    echo'<p>すでにログアウトしています。</p>';
    }
    ?>
    <?php require 'footer.php'; ?>