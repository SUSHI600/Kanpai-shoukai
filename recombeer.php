<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/recommend.css">
<?php include './header.php' ?>
    <p>おすすめ</p>
    
    <button onclick="location.href='recombeer.php'" value="ビール" style="backgrownd:grey">ビール</button>
    <button onclick="location.href='recomwine.php'" value="ワイン" style="">ワイン</button>
    <button onclick="location.href='recomliquor.php'" value="リキュール">リキュール<br></button>
    <?php include './db-connect.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from items where id in (select id from liquors where liquor_id = 1)');
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">',"<img class='liquorlist' src=",$row['image'],">",'</a>';
        }
    ?>