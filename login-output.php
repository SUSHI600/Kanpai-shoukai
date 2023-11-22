<?php session_start(); ?>
<?php require 'header.php'; ?>

<?php
unset($_SESSION['user']);
$pdo=new PDO('mysql;host=localhost;dbname=kaihatu;charset=utf8',
'staff', 'password');
$sql=$pdo->prepare('select * from user where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
    $_SESSION['user']=[
        'id'=>$row['id'], 'name'=>$row['name'],
        'address'=>$row['address'], 'login'=>$row['login'],
        'password'=>$row['password']];
}
if (isset($_SESSION['user'])) {
    echo 'いらっしゃいませ、', $_SESSION['user']['name'],'さん。';
}else{
    echo  'ログイン名またはパスワードが違います。';
}
?>
<?php require 'footer.php'; ?>