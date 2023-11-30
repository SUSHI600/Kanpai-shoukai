<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/recommend.css">
<?php include './header.php' ?>
    <p>おすすめ</p>
    <style>
        body {
            font-size: 16px; 
        }
        p {
            font-size: 30px; 
        }
        button {
            font-size: 50px; 
        }
    </style>
        <div class="wine"style="text-align: center;">
        <button onclick="location.href='recombeer.php'" value="ビール" style="background-color:#d3d3d3;margin-right: 80px;">ビール</button>
    <button onclick="location.href='recomwine.php'" value="ワイン">ワイン</button>
    <button onclick="location.href='recomliquor.php'" value="リキュール" style="margin-left: 80px;">リキュール<br></button>
    <?php include './db-connect.php' ?>
    </div>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from items where id in (select id from liquors where liquor_id = 1)');
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">',"<img class='liquorlist' src=",$row['image'],">",'</a>';
        }
    ?>