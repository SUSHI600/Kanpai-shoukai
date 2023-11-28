<!DOCTYPE html>
<html lang="ja">
<head>
<?php include './header.php' ?>
    <p>おすすめ</p>
    
    <span onclick="alcohol()" value="ビール">ビール</span>
    <span onclick="appetizers()" value="ワイン">ワイン</span>
    <span onclick="alcoholset()" value="リキュール">リキュール<br></span>
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