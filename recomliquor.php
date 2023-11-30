<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="css/recommend.css">
<?php include './header.php' ?>
<style>
        body {
            font-size: 16px; 
        }
        p {
            font-size: 30px; 
        }
        button {
            font-size: 35px; 
        }
    </style>
    <p>おすすめ</p>
    <div class="wine"style="text-align: center;">
    <button onclick="location.href='recombeer.php'" value="ビール" style="margin-right: 200px;">ビール</button>
    <button onclick="location.href='recomwine.php'" value="ワイン">ワイン</button>
    <button onclick="location.href='recomliquor.php'" value="リキュール" style="background-color: #d3d3d3;margin-left: 200px;">リキュール<br></button>
</div>
    <?php include './db-connect.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from items where id in (select id from liquors where liquor_id = 3)');
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">',"<img class='liquorlist' src=",$row['image'],">",'</a>';
        }
    ?>