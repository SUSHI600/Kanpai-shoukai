function delCart(el) {
    var flg = confirm("カートから削除しますか？");

    if (flg) {
        location.href = "./cart_delete.php?id=" + el;
    }
}

function liquorBuy(age) {
    var flg = false;

    var pay = document.getElementById("pay");
    
    if(pay.value == "") {
        alert("支払い方法を選択してください");
        return;
    }
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
    var pay = document.getElementById("pay");
    
    if(pay.value == "") {
        alert("支払い方法を選択してください");
        return;
    }   var flg = confirm("現在の内容で購入します。\nよろしいですか？");

   if (flg) {
       location.href = "./frame7.php";
    }
}

function prev() {
    location.href="./toppage.php";
}