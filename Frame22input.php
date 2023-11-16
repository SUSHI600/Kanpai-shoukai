<!DOCTYPE html>
<html1 long="ja">
    <head>
    <meta charset="UTF-8">
</head>
<body>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
    <h1>新規登録</h1>

<?php
    $name=$password=$password1=$mail='';
    echo '<form action="Frame22output.php" method="post">';
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
    echo '<input type="text" name="e-mail" value="', $mail, '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit" value="登録">';
    echo '</form>';
?>

生年月日:<select name="year">
    <?php
    for($i=1930;$i<2004;$i++){
        echo '<option value="',$i,'">',$i,'</option>';
    }
    ?>
</select>
年
<select name="month">
    <?php
    for($i=1;$i<13;$i++){
        echo '<option value="',$i,'">',$i,'</option>';
        
    }
    ?>
</select>
月
<select name="day">
    <?php
    for($i=1;$i<32;$i++){
        echo '<option value="',$i,'">',$i,'</option>';
    }
    ?>
</select>
日
</body>
</html>
