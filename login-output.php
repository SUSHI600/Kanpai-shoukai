<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>

<?php
unset($_SESSION['user']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from user where name=?');
$sql->execute([$_POST['name']]);
foreach($sql as $row){
    if(password_verify($_POST['password'],$row['password']) == true){
    $_SESSION['user']=[
        'id'=>$row['id'], 'name'=>$row['name'], 'birthday'=>$row['birthday'],
        'e_mail'=>$row['e_mail'], 'password'=>$row['password'], 'postcode'=>$row['postcode'],
        'address'=>$row['address']];
    }
}
if (isset($_SESSION['user'])) {
    echo 'いらっしゃいませ、', $_SESSION['user']['name'],'さん。';
}else{
    echo  'ログイン名またはパスワードが違います。';
}
?>
<?php require 'footer.php'; ?>