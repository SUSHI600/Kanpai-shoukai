<!DOCTYPE html>
<html long="ja">
    <head>
    <meta charset="UTF-8">
</head>
<body>
<?php require 'db-connect.php'; ?>
    <h1>新規登録</h1>
    <h3>全て必須項目です</h3>
<?php
    $name=$password=$password1=$e_mail=$postcode=$address='';
    echo '<form action="frame22output.php" method="post">';
    echo '<table>';
    echo '<tr><td>ユーザーネーム：</td><td>';
    echo '<input type="text" name="name" value="', $name, '">';
    echo '</td></tr>';
    echo '<tr><td>パスワード:</td><td>';
    echo '<input type="password" name="password" value="', $password, '">';
    echo '</td></tr>';
    echo '<tr><td>パスワード確認:</td><td>';
    echo '<input type="password" name="password1" value="', $password1, '">';
    echo '</td></tr>';
    echo '<tr><td>メールアドレス:</td><td>';
    echo '<input type="text" name="e_mail" value="', $e_mail, '">';
    echo '</td></tr>';
    echo '<tr><td>生年月日:</td><td>';
    echo '<select name="year">';
        for($i=1930;$i<2004;$i++){
            echo '<option value="',$i,'">',$i,'</option>';
        }
    echo '</select>';
    echo '年';
    echo '<select name="month">';
        for($i=1;$i<13;$i++){
            echo '<option value="',$i,'">',$i,'</option>';
        }
    echo '</select>';
    echo '月';
    echo '<select name="day">';
        for($i=1;$i<32;$i++){
            echo '<option value="',$i,'">',$i,'</option>';
        }
    echo '</select>';
    echo '日';
    echo '</td></tr>';
    echo '<tr><td>郵便番号:</td><td>';
    echo '<input type="text" name="postcode" value="', $postcode, '">';
    echo '</td></tr>';
    echo '<tr><td>住所:</td><td>';
    echo '<input type="text" name="address" value="', $address, '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit" value="登録">';
    echo '</form>';
?>
</body>
</html>
