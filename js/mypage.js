function withdrawal() {
    var flg = confirm("本当に退会しますか？");

    if (flg) {
        location.href = "./rivalcomplete.php";
    }
}

function update() {
    location.href = "./mpupdate.php";
}

function passUpdate() {
    location.href = "./passUpdate.php";
}