<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="./css/PassUpdate.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <?php include './header.php'; ?>
    <?php include './db-connect.php'; ?>

    <p class="title">パスワード変更</p>

    <?php
    $nowPass = $pass = $word = '';
    echo '<form action="./passUpdateComplete.php" method="post" name="changePass">';
    echo '<table class="table">';
    echo '<tr><td class="subtitle">現在のパスワード：</td><td>';
    echo '<input type="password" class="input" name="nowPass" id="nowPass" value="', $nowPass, '">';
    echo '<span class="far fa-eye" id="buttonEye1" onclick="HidePass1()"></span>';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">変更したいパスワード：</td><td>';
    echo '<input type="password" class="input" name="pass" id="pass" value="', $pass, '">';
    echo '<span class="far fa-eye" id="buttonEye2" onclick="HidePass2()"></span>';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">変更したいパスワードの確認：</td><td>';
    echo '<input type="password" class="input" name="word" id="word" value="', $word, '">';
    echo '<span class="far fa-eye" id="buttonEye3" onclick="HidePass3()"></span>';
    echo '</td></tr>';
    echo '</table>';
    echo '<p id="passError1" class="error"></p>';
    echo '<p id="passError2" class="error"></p>';
    echo '<div class="button_wrap">';
    echo '<div class="button prev" onclick="prev()">戻る</div>';
    echo '<div class="button next" onclick="update()">更新</div>';
    echo '</div>';
    echo '</form>';
    ?>

    <script src="./js/passUpdate.js"></script>

    <?php include './footer.php'; ?>