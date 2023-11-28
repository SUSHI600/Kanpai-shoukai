<!DOCTYPE html>
<html lang="ja">
<head>
<?php include './header.php' ?>
    <p>おすすめ</p>
    
    <span onclick="location.href='recombeer.php'" value="ビール">ビール</span>
    <span onclick="location.href='recomwine.php'" value="ワイン">ワイン</span>
    <span onclick="location.href='recomliquor.php'" value="リキュール">リキュール<br></span>
    <?php include './db-connect.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from items where id in (select id from liquors where liquor_id = 2)');
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">',"<img class='liquorlist' src=",$row['image'],">",'</a>';
        }
    ?>
    <script src="recommend.js"></script>