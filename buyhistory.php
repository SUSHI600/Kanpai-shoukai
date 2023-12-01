<?php require 'header.php' ?>
<?php require 'db-connect.php' ?>
<h3>購入履歴</h3>
<?php
    echo '<table>';
    echo '<tr><th>商品</th><th>商品名</th><th>ジャンル</th><th>購入日</th><th>購入数</th><th>合計価格</th></tr>';
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->query('select * from histories');
    foreach($sql as $row){
        echo '<tr>';
        echo '<td>';
        echo '<a href="items.php?id=',$id,'">',,'</a>';
        echo '</td>';
        echo '<td>',$row['price'],'</td>';
        echo '</tr>';
    }
    echo '</table>';
?>