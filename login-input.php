<?php require 'header.php'; ?>

<form action="login-output.php" method="post">
ログイン名<input type="text" name="login"><br>
パスワード<input type="password" name="password"><br>
<input type="submit" value="ログイン"> アカウントがない方は
    <a href="frame22input.php">こちら</a>
</form>
<?php require 'footer.php'; ?>