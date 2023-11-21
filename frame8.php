<?php require 'header.php' ?>
<?php require 'db-connect.php' ?>
<?php
    $pdo=new PDO($connect,USER,PASS);
    if(isset($_POST['search'])){
        switch($_POST['search']){
            case 'アジア':
                $sql=$pdo->query('select * from items where name like "アジア" or country_id = 1');
                break;
            case 'アメリカ':
                $sql=$pdo->query('select * from items where name like "アメリカ" or country_id = 2');
                break;
            case 'ヨーロッパ':
                $sql=$pdo->query('select * from items where name like "ヨーロッパ" or country_id = 3');
                break;
            case 'アフリカ':
                $sql=$pdo->query('select * from items where name like "アフリカ" or country_id = 4');
                break;
            case 'ビール':
                $sql=$pdo->query('select * from items where name like "ビール" 
                or id = (select id from liquors where liquor_id = 1)');
                break;
            case 'ワイン':
                $sql=$pdo->query('select * from items where name like "ワイン" 
                or id = (select id from liquors where liquor_id = 2)');
                break;
            case 'リキュール':
                $sql=$pdo->query('select * from items where name like "リキュール" 
                or id = (select id from liquors where liquor_id = 3)');
                break;
            default:
            $sql=$pdo->prepare('select * from items where name like ?');
            $sql->execute(['%'.$_POST['search'].'%']);
        }
    }else{
        $sql=$pdo->query('select * from items');
    }
    foreach($sql as $row){
        $id = $row['id'];
        echo '<a href="frame9.php?id=',$id,'">',"<img src=",$row['image'],">",'</a>';
    }
?>
