<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/mpupdate.css">

    <?php include 'header.php'; ?>
    <?php include 'db-connect.php'; ?>

    <p class="title">プロフィール更新</p>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from user where id = ?');
    $sql->execute([$_SESSION['user']['id']]);

    foreach ($sql as $row) {
        $year = date("Y", strtotime($row['birthday']));
        $month = date("m", strtotime($row['birthday']));
        $day = date("d", strtotime($row['birthday']));
        $postcode = explode("-", $row['postcode']);
        $post = $postcode[0];
        $code = $postcode[1];

        echo '<form action="./mypageUpdate.php" name="mpForm" method="post">';
        echo '<table class="table">';
        echo '<tr><td class="subtitle">ユーザーネーム：</td><td>';
        echo '<input type="text" name="name" value="', $row['name'], '" id="name" class="input">';
        echo '</td></tr>';
        echo '<tr><td class="subtitle">メールアドレス：</td><td>';
        echo '<input type="email" name="email" value="', $row['e_mail'], '" id="mail" class="input">';
        echo '</td></tr>';
        echo '<tr><td class="subtitle">生年月日：</td><td>';
        echo '<select name="year" class="input">';
        echo '<option hidden></option>';
        for ($i = 1930; $i < 2004; $i++) {
            $selected = '';

            if ($i == $year) {
                $selected = 'selected';
            }

            echo '<option value="', $i, '" ', $selected, '>', $i, '</option>';
        }
        echo '</select>';
        echo ' 年 ';
        echo '<select name="month" class="input">';
        echo '<option hidden></option>';
        for ($i = 1; $i < 13; $i++) {
            $selected = '';

            if ($i == $month) {
                $selected = 'selected';
            }

            echo '<option value="', $i, '" ', $selected, '>', $i, '</option>';
        }
        echo '</select>';
        echo ' 月 ';
        echo '<select name="day" class="input">';
        echo '<option hidden></option>';
        for ($i = 1; $i < 32; $i++) {
            $selected = '';

            if ($i == $day) {
                $selected = 'selected';
            }

            echo '<option value="', $i, '" ', $selected, '>', $i, '</option>';
        }
        echo '</select>';
        echo ' 日 ';
        echo '</td></tr>';
        echo '<tr><td class="subtitle">郵便番号：</td><td>';
        echo '<input type="text" name="post" value="', $post, '" id="post" class="input"> - ';
        echo '<input type="text" name="code" value="', $code, '" id="code" class="input">';
        echo '</td></tr>';
        echo '<tr><td class="subtitle">住所：</td><td>';
        echo '<input type="text" name="address" value="', $row['address'], '" class="input">';
        echo '</td></tr>';
        echo '</table>';
        echo '<div class="button_wrap">';
        echo '<div class="button prev" onclick="prev()">戻る</div>';
        echo '<div class="button next" onclick="update()">更新</div>';
        echo '</div>';
        echo '<p id="passError" class="error"></p>';
        echo '<p id="mailError1" class="error"></p>';
        echo '<p id="mailError2" class="error"></p>';
        echo '<p id="postError" class="error"></p>';
        echo '</form>';
    }

    echo '<script src="./js/mpupdate.js"></script>';
    ?>

    <?php include './footer.php'; ?>