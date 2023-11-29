<?php session_start(); ?>
<?php
if (isset($_SESSION['user'])) {
    echo '<!DOCTYPE html>';
    echo '<html lang="ja">';
    echo '<link rel="stylesheet" href="css/mypage.css">';
    include 'header.php';
    include 'db-connect.php';
    echo '<p class="title">マイページ</p>';
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from user where id = ?');
    $sql->execute([$_SESSION['user']['id']]);
    foreach ($sql as $row) {
        echo '<table class="table">';
        echo '<tr><td class="subtitle">ユーザーネーム：</td><td>';
        echo $row['name'];
        echo '</td></tr>';
        echo '<tr><td class="subtitle">メールアドレス：</td><td>';
        echo $row['e_mail'];
        echo '<tr><td class="subtitle">生年月日：</td><td>';
        echo $row['birthday'];
        echo '<tr><td class="subtitle">住所：</td><td>';
        echo '<div class="wrap">';
        echo '〒', $row['postcode'], '<br>';
        echo $row['address'];
        echo '</div>';
        echo '<span class="far fa-eye" id="buttonEye" onclick="HidePass()"></span>';
        echo '</td></tr>';
        echo '</table>';

        echo '<div class="button_wrap">';
        echo '<div class="button prev" onclick="withdrawal()">退会</div>';
        echo '<div class="button next" onclick="update()">更新</div>';
        echo '</div>';
    }

    echo '<script src="./js/mypage.js"></script>';

    include './footer.php';
} else {
    header('Location: ' . './login-input.php', true, 301);
    exit();
}
?>