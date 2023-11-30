<!DOCTYPE html>
<html long="ja">

<head>
    <link rel="stylesheet" href="./css/frame22.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <?php require 'db-connect.php'; ?>
    <?php require 'header.php'; ?>

    <p class="title">新規登録</p>
    <p class="info">※すべて必須項目です</p>
    <?php
    $name = $password = $e_mail1 = $e_mail = $postcode = $address = '';
    echo '<form action="Frame22output.php" method="post" name="form22">';
    echo '<table class="table">';
    echo '<tr><td class="subtitle">ユーザーネーム：</td><td>';
    echo '<input type="text" class="input" name="name" id="name" placeholder="10文字以内" value="', $name, '">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">パスワード：</td><td>';
    echo '<input type="password" class="input" name="password" id="word" placeholder="半角英数字のみ" value="', $password, '">';
    echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">メールアドレス：</td><td>';
    echo '<input type="email" class="input" name="e_mail" id="mail" value="', $e_mail, '">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">メールアドレス確認：</td><td>';
    echo '<input type="email" class="input" name="e-mail1" id="e-mail" value="', $e_mail1, '">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">生年月日：</td><td>';
    echo '<select name="year" class="input">';
    echo '<option hidden></option>';
    for ($i = 1930; $i < 2004; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }
    echo '</select>';
    echo ' 年 ';
    echo '<select name="month" class="input">';
    echo '<option hidden></option>';
    for ($i = 1; $i < 13; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }
    echo '</select>';
    echo ' 月 ';
    echo '<select name="day" class="input">';
    echo '<option hidden></option>';
    for ($i = 1; $i < 32; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }
    echo '</select>';
    echo ' 日 ';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">郵便番号：</td><td>';
    echo '<input type="text" name="post" value="" id="post" class="input"> - ';
    echo '<input type="text" name="code" value="" id="code" class="input">';
    echo '</td></tr>';
    echo '<tr><td class="subtitle">住所：</td><td>';
    echo '<input type="text" class="input" name="address" value="', $address, '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<p id="passError" class="error"></p>';
    echo '<p id="mailError1" class="error"></p>';
    echo '<p id="mailError2" class="error"></p>';
    echo '<p id="postError" class="error"></p>';
    echo '<div class="submit" onclick="send()">登録</div>';
    echo '</form>';
    ?>

    <script src="./js/frame22.js"></script>

    <?php include './footer.php'; ?>