<link rel="stylesheet" href="css/cart.show.css">
<?php
if(isset($_SESSION['user'])){
    $userID = $_SESSION['user']['id'];
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();
    
        $cartCountSql = $pdo->prepare("select count(id) as count from carts where user_id = ?");
        $cartCountSql->execute([$userID]);
        $cartCount = $cartCountSql->fetch(PDO::FETCH_ASSOC);
    
        if ($cartCount['count'] == 0) {
            echo '<p class="count">現在カートに商品は入っていません</p>';
        } else {
            echo '<p class="count">現在カートに', $cartCount['count'], '件の商品が入っています</p>';
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
    
            $displaySql = $pdo->prepare("select items.id as id, items.name as name, items.category_id as category_id, items.price as price, carts.quantity as quantity from items join carts on items.id = carts.item_id where carts.user_id = ?");
            $displaySql->execute([$userID]);
            $display = $displaySql->fetchAll();    // 連想配列として取得
            $totalPrice = 0;
            $liquorFlg = false;
    
            foreach ($display as $displayCart) {
                $category = "";
                $subtotal = $displayCart['price'] * $displayCart['quantity'];
                $totalPrice += $subtotal;
    
                if ($displayCart['category_id'] == 1) {
                    $category = "お酒";
                    $liquorFlg = true;
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
            $today = date("Y-m-d");
            $birthday = $address['birthday'];
            $diff = date_diff(date_create($birthday), date_create($today));
            $age = $diff->format('%y');
    
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
            echo '<select name="pay" class="pay" id="pay">';
            echo '<option hidden value="">選択してください</option>';
            echo '<option value="1">クレジットカード払い</option>';
            echo '<option value="2">コンビニ払い</option>';
            echo '</select>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
    
            echo '<div class="button_wrap">';
            echo '<div class="button prev" onclick="prev()">TOPに戻る</div>';
            if ($liquorFlg) {
                echo '<div class="button next" onclick="liquorBuy(', $age, ')">購入</div>';
            } else {
                echo '<div class="button next" onclick="buy()">購入</div>';
            }
            echo '</div>';
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
}else{
    echo '<p class="message">ログインしてください</p>';
}
