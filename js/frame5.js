function delCart(el) {
    var flg = confirm("カートから削除しますか？");

    if (flg) {
        location.href = "./frame5_delete.php?id=" + el;
    }
}

function buy() {
    var flg = confirm("現在の内容で購入します。\nよろしいですか？");

    if (flg) {
        location.href = "./frame7.php";
    }
}