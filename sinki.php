<!DOCTYPE html>
<html1 long="ja">
    <head>
    <meta charset="UTF-8">
</head>
<body>
    <p>新規登録</p>
    <p>ユーザーネーム:<input type="txet" value=""></p>
    <p>パスワード:<input type="password" value=""></p>
    <p>パスワード確認:<input type="password" value=""></p>
    <p>メールアドレス:<input type="txet" value=""></p>

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
<form action="home.php" method="post">
<p><button type="submit">登録</button></p>
</form>
</body>
</html>
