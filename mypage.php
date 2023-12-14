<?php session_start(); ?>
<?php
if (isset($_SESSION['user'])) {
    echo '<!DOCTYPE html>';
    echo '<html lang="ja">';
    echo '<head>';
    echo '<link rel="stylesheet" href="css/mypage.css">';
    include 'header.php';
    include 'db-connect.php';
    echo '<p class="title">マイページ</p>';
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from user where id = ?');
    $sql->execute([$_SESSION['user']['id']]);
    foreach ($sql as $row) {
        $year = date("Y", strtotime($row['birthday']));
        $month = date("m", strtotime($row['birthday']));
        $day = date("d", strtotime($row['birthday']));

        echo '<table class="table">';
        echo '<tr><td class="subtitle">ユーザーネーム：</td><td class="data">';
        echo $row['name'];
        echo '</td></tr>';
        echo '<tr><td class="subtitle">メールアドレス：</td><td class="data">';
        echo $row['e_mail'];
        echo '</td></tr>';
        echo '<tr><td class="subtitle">生年月日：</td><td class="data">';
        echo $year, '年', $month, '月', $day, '日';
        echo '</td></tr>';
        echo '<tr><td class="subtitle">郵便番号：</td><td class="data">';
        echo '〒', $row['postcode'];
        echo '</td></tr>';
        echo '<tr><td class="subtitle">住所：</td><td class="data">';
        echo $row['address'];
        echo '</td></tr>';
        echo '</table>';

        echo '<div class="button_wrap">';
        echo '<div class="button prev" onclick="update()">プロフィール更新</div>';
        echo '<div class="button next" onclick="passUpdate()">パスワード変更</div>';
        echo '</div>';

        echo '<div class="submit_wrap">';
        echo '<button class="submit" onclick="withdrawal()">退会</button>';
        echo '</div>';
    }

    echo '<script src="./js/mypage.js"></script>';

    include './footer.php';
} else {
    header('Location: ' . './login-input.php', true, 301);
    exit();
}
?>