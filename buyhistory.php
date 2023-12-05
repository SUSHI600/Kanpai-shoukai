<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="stylesheet" href="css/history.css">
    <?php require 'db-connect.php'; ?>
    <?php require 'header.php'; ?>
    <?php
        if(isset($_SESSION['user'])){
            echo '<h3>購入履歴</h3>';
            echo '<div class="div">';
            echo '<table class="table table-bordered">';
            echo '<thead class="table-light">';
            echo '<tr>';
            echo '<th scope="col">商品</th>';
            echo '<th scope="col">商品名</th>';
            echo '<th scope="col">購入日</th>';
            echo '<th scope="col">単価</th>';
            echo '<th scope="col">購入数</th>';
            echo '<th scope="col">合計価格</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $items = [];
            $items_name = [];
            $buy_date = [];
            $price = [];
            $buy_quantity = [];
            $sum_price = [];
            $id = [];
            $item_id = [];
            $history_id = [];
            $user_id = intval($_SESSION['user']['id']);
            $pdo=new PDO($connect,USER,PASS);
            $sql=$pdo->prepare('select * from histories where user_id = ?');
            $sql->execute([$user_id]);
            foreach($sql as $row){
                $id[] = $row['id'];
            }
            foreach($id as $esc){
                $sql=$pdo->prepare('select * from historie_details where history_id = ?');
                $sql->execute([$esc]);
                foreach($sql as $row){
                    $history_id[] = $row['history_id'];
                    $item_id[] = $row['item_id'];
                    $buy_quantity[] = $row['bought_quantity'];
                    $sum_price[] = $row['price'] * $row['bought_quantity'];
                }
            }
            $j = 0;
            foreach($item_id as $item_esc){
                $sql = $pdo->prepare('select * from items where id = ?');
                $sql->execute([$item_esc]);
                foreach($sql as $row){
                    $items[] = $row['image'];
                    $items_name[] = $row['name'];
                    $price[] = $row['price'];
                    $j++;
                }
            }
            foreach($history_id as $id_esc){
                $sql = $pdo->prepare('select * from histories where id = ?');
                $sql->execute([$id_esc]);
                foreach($sql as $row){
                    $buy_date[] = $row['bought_date'];
                }
            }
            $count = count($items);
            for($i = 0;$i < $count;$i++){
                echo '<tr>';
                echo '<td class="img"><a href="items.php?id=',$item_id[$i],'"><img class="liquorlist" src="',$items[$i], '"></a></td>';
                echo '<td class="td"><a href="items.php?id=',$item_id[$i],'">', $items_name[$i], '</a></td>';
                echo '<td class="td">', $buy_date[$i], '</td>';
                echo '<td class="td">', $price[$i], '</td>';
                echo '<td class="td">', $buy_quantity[$i], '</td>';
                echo '<td class="td">', $sum_price[$i], '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo '購入履歴を閲覧するにはログインしてください';
        }
    ?>
    <?php require 'footer.php'; ?>