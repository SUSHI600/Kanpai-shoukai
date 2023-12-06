<?php require 'header.php' ?>
<?php require 'db-connect.php' ?>
<link rel="stylesheet" href="./css/search.css">
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
                or id in (select id from liquors where liquor_id = 1)');
                break;
            case 'ワイン':
                $sql=$pdo->query('select * from items where name like "ワイン" 
                or id in (select id from liquors where liquor_id = 2)');
                break;
            case 'リキュール':
                $sql=$pdo->query('select * from items where name like "リキュール" 
                or id in (select id from liquors where liquor_id = 3)');
                break;
            case 'お酒':
                $sql=$pdo->query('select * from items where name like "酒" 
                or category_id = 1');
                break;
            case 'おつまみ':
                $sql=$pdo->query('select * from items where name like "つまみ" 
                or category_id = 2');
                break;
            case '晩酌セット':
                $sql=$pdo->query('select * from items where name like "つまみ" 
                or category_id = 3');
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
        echo '<a href="items.php?id=',$id,'">','<img class="liquorlist listmargin" src="',$row['image'],'">','</a>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">',$row['name'],'</h5>';
        echo '<p class="card-text">',$row['price'],'</p>';
        echo '</div>';
    }
?>

