<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="css/gamen.css">
<?php require 'header.php' ?>
<?php
    echo '<table>';
    echo '<tr><th>商品ID</th><th>商品名</th><th>ジャンル</th><th>価格</th><th>個数</th></tr>';
        $pdo=new PDO($connect, USER, PASS);
        $pdo->query('select count(*) from carts');
        echo '<h2>現在カートに',$pdo,'件の商品が入っています。</h2>'
        foreach($pdo->query('select * from carts')as $row) {
            echo '<tr>';
            echo '<td>',$row['id'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['janru'],'</td>';
            echo '<td>',$row['price'],'</td>';
            echo '<td>',$row['number'],'</td>';
            echo '<td>';
            echo '<a href="?id=',$row['id'],'">削除</a>';
            echo '</td>';
            echo '</th>';
            echo "\n";
        }
    echo '</table>';
    echo '合計：<input type="text" name="money">円<br>';
    echo '<button type="submit">戻る</button>';
    echo '<button type="submit">購入</button>';
?>