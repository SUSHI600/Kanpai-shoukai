<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from items where id=?');
    $sql->execute([$_GET['id']]);
    foreach($sql as $row){
        echo '<p><img alt="image" src="',$row['image'],'"></p>';
        echo '<form action="cart-insert.php" method="post">';
        echo '<p>商品名:',$row['name'],'</p>';
        echo '<p>',$row['info'],'</p>';
        echo '<p>価格:',$row['price'],'</p>';
        echo '<p>購入数:<select name="count">';
        for($i=1;$i<=100;$i++){
            echo '<option value="',$i,'">',$i,'</option>';
        }
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<input type="hidden" name="name" value="',$row['name'],'">';
        echo '<input type="hidden" name="price" value="',$row['price'],'">';
        echo '<p><input type="submit" value="カートに追加"></p>';
        echo '</form>';
    }
?>
<?php require 'footer.php'; ?>
    
