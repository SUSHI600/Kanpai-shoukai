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
        if(isset($_POST['search'])){
            switch($_POST['search']){
                case 'アジア':
                    $sql=$pdo->prepare('select * from items where name like ? or country_id = 1');
                    break;
                case 'アメリカ':
                    $sql=$pdo->prepare('select * from items where name like ? or country_id = 2');
                    break;
                case 'ヨーロッパ':
                    $sql=$pdo->prepare('select * from items where name like ? or country_id = 3');
                    break;
                case 'アフリカ':
                    $sql=$pdo->prepare('select * from items where name like ? or country_id = 4');
                    break;
                case 'ビール':
                    $sql=$pdo->prepare('select * from items where name like ? 
                    or id = (select id from liquors where liquor_id = 1)');
                    break;
                case 'ワイン':
                    $sql=$pdo->prepare('select * from items where name like ? 
                    or id = (select id from liquors where liquor_id = 2)');
                    break;
                case 'リキュール':
                    $sql=$pdo->prepare('select * from items where name like ? 
                    or id = (select id from liquors where liquor_id = 3)');
                    break;
                default:
                $sql=$pdo->prepare('select * from items where name like ?');
            }
            $sql->execute(['%'.$_POST['search'].'%']);
        }else{
            $sql=$pdo->query('select * from items');
        }
        foreach($sql as $row){
            $id = $row['id'];
            echo '<a href="frame9.php?id=',$id,'">',"<img src=",$row['image'],">",'</a>';
        }
    ?>
</body>
</html>
