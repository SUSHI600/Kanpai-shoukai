<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php require 'header.php' ?>
    <?php require 'db-connect.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        if(isset($_POST['keyword'])){
            $sql=$pdo->prepare('select * from Items where name like ?');
            $sql->execute(['%'.$_POST['keyword'].'%']);
        }else{
            $sql=$pdo->query('select * from Items');
        }
    ?>
</body>
</html>
