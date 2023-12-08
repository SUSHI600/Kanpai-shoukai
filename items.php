<?php include 'header.php'; ?>
<?php include 'db-connect.php'; ?>
<link rel="stylesheet" href="css/item.css">
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from items where id=?');
    $sql->execute([$_GET['id']]);
    ?>
    <div class="card">
    <div class="row g-0">
        <div class="col-5 col-sm-4">
        
       <?php
       foreach($sql as $row){
       echo '<p><img alt="image" class="img-fluid w-100 item-image" src="',$row['image'],'"></p>';
       ?>
        </div>
        <div class="col-7 col-sm-8">
        <div class="card-body">
            <?php    
            echo '<form action="cart-insert.php" method="post">';
            echo '<h5 class="card-title">',$row['name'],'</h5>';
            echo '<p class="card-text">',$row['info'],'</p>';
            echo '<p class="card-text">価格：',$row['price'],'円</p>';
            echo '<p> 購入数：<select name="count">';

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
        </div>
        </div>
    </div>
    </div>
<?php include 'footer.php'; ?>