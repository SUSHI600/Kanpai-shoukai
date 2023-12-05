<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="./css/search.css">
    <?php require 'db-connect.php' ?>
    <?php require 'header.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from items where category_id = 3');
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">','<img class="liquorlist" src="',$row['image'],'">','</a>';
        }
    ?>
    <?php require 'footer.php' ?>