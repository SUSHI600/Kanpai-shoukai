<?php
$userID = 5;    // テスト用ID

try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction();

    $cartCountSql = $pdo->prepare("select count(id) from carts where user_id = ?");
    $cartCountSql->execute([$userID]);
    $cartCount = $cartCountSql->fetchColumn();

    if ($cartCount !== false) {
        echo '<p class="count">現在カートに', $cartCount, '件の商品が入っています</p>';
        echo '<div class="div">';
        echo '<table class="table table-bordered">';
        echo '<thead class="table-light">';
        echo '<tr>';
        echo '<th scope="col">商品名</th>';
        echo '<th scope="col">ジャンル</th>';
        echo '<th scope="col">価格</th>';
        echo '<th scope="col">個数</th>';
        echo '<th scope="col">小計</th>';
        echo '<th scope="col"></th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $displaySql = $pdo->prepare("select items.id as id, items.name as name, items.category_id as category_id, items.price as price, carts.quantity as quantity from items join carts on item.id = carts.item_id where carts.user_id = ?");
        $displaySql->execute([$userID]);
        $display = $displaySql->fetch(PDO::FETCH_ASSOC);    // 連想配列として取得
        $totalPrice = 0;

        foreach ($display as $displayCart) {
            $category = "";
            $subtotal = $displayCart['price'] * $displayCart['quantity'];
            $totalPrice += $subtotal;

            if ($displayCart['category_id'] == 1) {
                $category = "お酒";
            } else {
                $category = "おつまみ";
            }

            echo '<tr>';
            echo '<td class="td">', $displayCart['name'], '</td>';
            echo '<td class="td">', $category, '</td>';
            echo '<td class="td">', $displayCart['price'], '円</td>';
            echo '<td class="td">', $displayCart['quantity'], '</td>';
            echo '<td class="td">', $subtotal, '円</td>';
            echo '<td class="delete"><div onclick="delCart(', $displayCart['id'], ')"><div class="background"></div>-</div></td>';  //削除ボタン
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<p class="total">合計: ', $totalPrice, '円</p>';
        echo '</div>';

        $addressSql = $pdo->prepare('select * from user where id = ?');
        $addressSql->execute([$userID]);
        $address = $addressSql->fetch(PDO::FETCH_ASSOC);

        echo '<div class="container-fluid div">';
        echo '<div class="info_wrap">';
        echo '<p class="info">配送先</p>';
        echo '<div class="address">';
        echo '<p class="address_num>〒', $address['postcode'], '</p>';
        echo '<p class="address_detail">', $address['address'], '</p>';
        echo '</div>';
        echo '<a href="./mypage.php" class="change_address">配送先変更 ></a>';
        echo '</div>';
        echo '</div>';

        echo '<div class="container-fluid div">';
        echo '<div class="info_wrap">';
        echo '<p class="info">支払い方法</p>';
        echo '<div class="pay_wrap">';
        echo '<select name="pay" class="pay">';
        echo '<option hidden>選択してください</option>';
        echo '<option value="1">クレジットカード払い</option>';
        echo '<option value="2">コンビニ払い</option>';
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="button_wrap>';
        echo '<a href="#" class="button prev">戻る</a>';
        echo '<div class="button next" onclick="buy()">購入</div>';
        echo '</div>';
    } else {
        echo '<p class="count">現在カートに商品は入っていません</p>';
    }

    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    echo '<div class="container-fluid">';
    echo '<p class="row justify-content-center">エラーが発生しました。</p>';
    echo '<p class="row justify-content-center">', $e->getMessage(), '</p>';
    echo '</div>';
}

$pdo = null;
