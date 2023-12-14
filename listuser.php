<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/listuser.css">
    <?php require 'db-connect.php' ?>
    <?php require 'header2.php' ?>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from user');
        echo '<h2>ユーザー一覧</h2>';
        echo '<div class="div">';
        echo '<table class="table table-bordered">';
        echo '<thead class="table-light">';
        echo '<tr>';
        echo '<th scope="col" class="th">ユーザーID</th>';
        echo '<th scope="col" class="th">ユーザー名</th>';
        echo '<th scope="col" class="th">生年月日</th>';
        echo '<th scope="col" class="th">メールアドレス</th>';
        echo '<th scope="col" class="th">郵便番号</th>';
        echo '<th scope="col" class="th">住所</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach($sql as $row){
            echo '<tr>';
            echo '<td class="td">', $row['id'], '</td>';
            echo '<td class="td">', $row['name'], '</td>';
            echo '<td class="td">', $row['birthday'], '</td>';
            echo '<td class="td">', $row['e_mail'], '</td>';
            echo '<td class="td">', $row['postcode'], '</td>';
            echo '<td class="td">', $row['address'], '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    ?>
    <?php require 'footer.php' ?>