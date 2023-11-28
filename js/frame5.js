function delCart(el) {
    var flg = confirm("カートから削除しますか？");

    if (flg) {
        location.href = "./frame5_delete.php?id=" + el;
    }
}

function liquorBuy(age) {
    var flg = false;

    if (age >= 20) {
        flg = confirm("現在の内容で購入します。\nよろしいですか？");
    } else {
        alert("20歳未満はお酒の購入ができません");
    }

    if (flg) {
        location.href = "./frame7.php";
    }
}

function buy() {
    var flg = confirm("現在の内容で購入します。\nよろしいですか？");

    if (flg) {
        location.href = "./frame7.php";
    }
}

function prev() {
    window.history.back();
}