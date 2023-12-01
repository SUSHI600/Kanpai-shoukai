<?php session_start() ?>
<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
    if(!empty($_SESSION['user'])){
        $pdo=new PDO($connect,USER,PASS);
        $date = date('Y-m-d');
        $add_date = $date;
        $quantity = $_POST['count'];
        $item_id = $_POST['id'];
        $userid = $_SESSION['user']['id'];
        $sql=$pdo->prepare('insert into carts(add_date,quantity,item_id,user_id) values(:add_date,:quantity,:item_id,:user_id)');
        $sql->execute(array(':add_date'=>$add_date,':quantity'=>$quantity,'item_id'=>$item_id,'user_id'=>$userid));
        echo '<p>カートに商品を追加しました。</p>';
        echo '<hr>';
        require 'frame5_show.php';
    }else{
        echo 'カートに商品を追加するにはログインしてください';
    }
?>
<?php require 'footer.php'; ?>