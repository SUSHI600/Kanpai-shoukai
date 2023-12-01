<?php session_start(); ?>
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
            font-size: 35px; 
        }
    </style>
        <div class="wine"style="text-align: center;">
        <button onclick="location.href='recombeer.php'" value="ビール" style="background-color:#d3d3d3;margin: 0px 50px;">ビール</button>
    <button onclick="location.href='recomwine.php'" value="ワイン" style="margin: 0px 50px;">ワイン</button>
    <button onclick="location.href='recomliquor.php'" value="リキュール" style="margin: 0px 50px;">リキュール<br></button>
    <button onclick="location.href='recomsnack.php'" value="おつまみ" style="margin: 0px 50px;">おつまみ</button>
    <?php include './db-connect.php' ?>
    </div>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $id = $_SESSION['user']['id'];
        $sql=$pdo->prepare('select * from fav_liquors where id = ?');
        $sql->execute([$id]);
        $data1=$sql->fetch();

        $sql=$pdo->prepare('select * from fav_snack where id = ?');
        $sql->execute([$id]);
        $data2=$sql->fetch();

        $sql=$pdo->prepare('select * from items where id in( select id from liquors where liquor_id =1) and (taste_id = ? or country_id = ?)');
        $sql->execute([$data1['taste_id'],$data1['country_id']]);
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">',"<img class='liquorlist' src=",$row['image'],">",'</a>';
        }
    ?>