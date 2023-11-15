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
            switch($_POST['keyword']){
                case 'アジア':
                    break;
                case 'アメリカ':
                    break;
                case 'ヨーロッパ':
                    break;
                case 'アフリカ':
                    break;
                default:
                $sql=$pdo->prepare('select * from items where name like ?');
                $sql->execute(['%'.$esc.'%']);
            }
        }else{
            $sql=$pdo->query('select * from items');
        }
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="detail.php?id=',$id,'">',"<img src=",$row['image'],">",'</a>';
        }
    ?>
</body>
</html>
