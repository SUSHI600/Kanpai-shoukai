var pass = document.getElementById("pass");
var passError1 = document.getElementById("passError1");
var word = document.getElementById("word");
var passError2 = document.getElementById("passError2");

pass.addEventListener('blur', function () {
    var password = this.value;
    var regex = /^[0-9a-zA-Z]*$/;

    if (regex.test(password) || this.length == 0) {
        passError1.innerText = "";
    } else {
        passError1.innerText = "不正なパスワードです。";
    }
});

word.addEventListener('blur', function () {
    if (this.value === pass.value || this.value.length == 0) {
        passError2.innerText = "";
    } else {
        passError2.innerText = "パスワードが一致しません。";
    }
});

function update() {
    var input = document.getElementsByClassName("input");
    var inputFlg = false;
    var flg = true;

    for (i = 0; i < input.length; i++) {
        if (input[i].value.length == 0) {
            inputFlg = true;
        }
    }

    if (inputFlg) {
        alert("未入力の項目があります");
        flg = false;
    }

    if (flg) {
        document.changePass.submit();
    }
}

function HidePass1() {
    var pass = document.getElementById("nowPass");
    var eye = document.getElementById("buttonEye1");

    if (pass.type === "text") {
        pass.type = "password";
        eye.className = "far fa-eye";
    } else {
        pass.type = "text";
        eye.className = "far fa-eye-slash";
    }
}

function HidePass2() {
    var pass = document.getElementById("pass");
    var eye = document.getElementById("buttonEye2");

    if (pass.type === "text") {
        pass.type = "password";
        eye.className = "far fa-eye";
    } else {
        pass.type = "text";
        eye.className = "far fa-eye-slash";
    }
}

function HidePass3() {
    var pass = document.getElementById("word");
    var eye = document.getElementById("buttonEye3");

    if (pass.type === "text") {
        pass.type = "password";
        eye.className = "far fa-eye";
    } else {
        pass.type = "text";
        eye.className = "far fa-eye-slash";
    }
}

function prev() {
    location.href = "./mypage.php";
}