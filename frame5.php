<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="css/gamen.css">
            <title></title>
        </head>
        <body>
            <h2>現在カートに～件の商品が入っています。</h2>
            <table>
                <tr><th>商品ID</th><th>商品名</th><th>ジャンル</th><th>価格</th><th>個数</th></tr>
                <?php
                    $pdo=new PDO($connect, USER, PASS);
                    foreach($pdo->query('select * from cart')as $row) {
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
                ?>
            </table>
            合計：<input type="text" name="money">円<br>
            <button type="submit">戻る</button>
            <button type="submit">購入</button>
        </body>
    </html>
