<?php session_start() ?>
<!DOCTYPE html>
<html long="ja">

<head>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
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

            $existingCartItem = $pdo->prepare('SELECT * FROM carts WHERE item_id = :item_id AND user_id = :user_id');
            $existingCartItem->execute(array(':item_id' => $item_id, ':user_id' => $userid));
            $existingItem = $existingCartItem->fetch(PDO::FETCH_ASSOC);

            if ($existingItem) {
                $newQuantity = $existingItem['quantity'] + $quantity;
                $updateCartItem = $pdo->prepare('UPDATE carts SET quantity = :quantity WHERE item_id = :item_id AND user_id = :user_id');
                $updateCartItem->execute(array(':quantity' => $newQuantity, ':item_id' => $item_id, ':user_id' => $userid));
                echo '<p>カートに商品を追加しました。</p>';
            } else {
                $sql = $pdo->prepare('INSERT INTO carts(add_date,quantity,item_id,user_id) VALUES(:add_date,:quantity,:item_id,:user_id)');
                $sql->execute(array(':add_date'=>$add_date,':quantity'=>$quantity,'item_id'=>$item_id,'user_id'=>$userid));
                echo '<p>カートに商品を追加しました。</p>';
            }
            echo '<button onclick="location.href=\'cart.php\'">カートを見る</button>';
            echo '<form action="search.php">';
            echo '<input type="submit" value="お買い物を続ける">';
            echo '</form>';
        }else{
            echo 'カートに商品を追加するにはログインしてください';
        }
    ?>
    <?php require 'footer.php'; ?>