<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);

if (isset($_SESSION['customer'])) {
    $id = $_SESSION['customer']['name'];
    $sql = $pdo->prepare('SELECT * FROM customer WHERE id != ? AND login = ?');
    $sql->execute([$id, $_POST['login']]);
} else {
    $sql = $pdo->prepare('SELECT * FROM customer WHERE login = ?');
    $sql->execute([$_POST['login']]);
}

if (empty($sql->fetchAll())) {
    if (isset($_SESSION['customer'])) {
        $sql = $pdo->prepare('UPDATE customer SET name=?, address=?, login=?, password=? WHERE id=?');
        $sql->execute([$_POST['name'], $_POST['e-mail'], $_POST['login'], $_POST['password'], $id]);
        $_SESSION['customer'] = [
            'name' => $id, 'name' => $_POST['name'],
            'password' => $_POST['password'], 'login' => $_POST['login'],
            'e-mail' => $_POST['e-mail']
        ];
        echo 'お客様情報を更新しました';
    }
}
?>
<p>会員情報</p>
<form action="mypage.php" method="post">
    <p>ユーザーネーム:<input type="text" value=""></p>
    <p>パスワード:<input type="password" value=""></p>
    <p>メールアドレス:<input type="text" value=""></p>
    <button type="submit">更新</button> 
</form>
<form action="rivalconfilm.php" method="post">
    <button>退会</button>
</form>