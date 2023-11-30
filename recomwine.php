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
            font-size: 50px; 
        }
    </style>
    <p>おすすめ</p>
    
    <div class="wine"style="text-align: center;">
    <button class="beer" onclick="location.href='recombeer.php'" value="ビール" style="margin-right: 80px;">ビール</button>
    <button class="wine" onclick="location.href='recomwine.php'" value="ワイン" style="background-color:#d3d3d3;">ワイン</button>
    <button class="recomliquor" onclick="location.href='recomliquor.php'" value="リキュール" style="margin-left: 80px;">リキュール<br></button>
    </div>
    <?php include './db-connect.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from items where id in (select id from liquors where liquor_id = 2)');
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="items.php?id=',$id,'">',"<img class='liquorlist' src=",$row['image'],">",'</a>';
        }
    ?>
</head>
<body>
</body>
</html>
