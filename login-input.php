<?php require 'header.php'; ?>

<form action="login-output.php" method="post">
ログイン名<input type="text" name="name"><br>
パスワード<input type="password" name="password"><br>
<input type="submit" value="ログイン">
<p>アカウントがない方は<a href="frame22input.php">こちら</a></p>
</form>
<?php require 'footer.php'; ?>