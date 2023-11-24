<?php include 'header.php'; ?>
<?php include 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select * from items where id=?');
    $sql->execute([$_GET['id']]);
    ?>
    <div class="card">
    <div class="row g-0">
        <div class="col-5 col-sm-4">
        <img src="assets/images/bs-images/img-3x4.png" class="img-fluid w-100" alt="card-horizontal-image">
        </div>
        <div class="col-7 col-sm-8">
        <div class="card-body">
            <?php
        foreach($sql as $row){
            echo '<p><img alt="image" src="',$row['image'],'"></p>';
            echo '<form action="cart-insert.php" method="post">';
            echo '<h5 class="card-title">',$row['name'],'</h5>';
            echo '<p class="card-text">',$row['info'],'</p>';
            echo '<p class="card-text">',$row['price'],'</p>';
            echo '<p> <select name="count">';

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