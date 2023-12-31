var userName = document.getElementById("name");

userName.addEventListener('input', function () {
    var input = this.value;

    if (input.length > 10) {
        input = input.slice(0, 10);
    }

    this.value = input;
});

var postError = document.getElementById("postError");
var post = document.getElementById("post");

post.addEventListener('input', function () {
    var inputValue = this.value.replace(/[^0-9]/g, '');

    if (inputValue.length > 3) {
        inputValue = inputValue.slice(0, 3);
    }

    this.value = inputValue;
});

var code = document.getElementById("code");

code.addEventListener('input', function () {
    var inputValue = this.value.replace(/[^0-9]/g, '');

    if (inputValue.length > 4) {
        inputValue = inputValue.slice(0, 4);
    }

    this.value = inputValue;
});

post.addEventListener('blur', function () {
    var inputPost = post.value;
    var inputCode = code.value;

    if (inputPost.length + inputCode.length == 7 || inputPost.length + inputCode.length == 0) {
        postError.innerText = "";
    } else {
        postError.innerText = "郵便番号が不正です。";
    }
});

code.addEventListener('blur', function () {
    var inputPost = post.value;
    var inputCode = code.value;

    if (inputPost.length + inputCode.length == 7 || inputPost.length + inputCode.length == 0) {
        postError.innerText = "";
    } else {
        postError.innerText = "郵便番号が不正です。";
    }
});

var pass = document.getElementById("word");
var passError1 = document.getElementById("passError");

pass.addEventListener('blur', function () {
    var password = this.value;
    var regex = /^[0-9a-zA-Z]*$/;

    if (regex.test(password) || this.length == 0) {
        passError1.innerText = "";
    } else {
        passError1.innerText = "不正なパスワードです。";
    }
});

var mail1 = document.getElementById("mail");
var mailError1 = document.getElementById("mailError1");
var mail2 = document.getElementById("e-mail");
var mailError2 = document.getElementById("mailError2");

mail1.addEventListener('blur', function () {
    var email = mail1.value;
    var regex = /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;

    if (regex.test(email) || this.value.length == 0) {
        mailError1.innerText = "";
    } else {
        mailError1.innerText = "無効なメールアドレスです。";
    }
});

mail2.addEventListener('blur', function () {
    if (this.value === mail1.value || this.value.length == 0) {
        mailError2.innerText = "";
    } else {
        mailError2.innerText = "メールアドレスが一致しません。";
    }
});

function send() {
    var input = document.getElementsByClassName("input");
    var error = document.getElementsByClassName("error");
    var errorFlg = false;
    var inputFlg = false;
    var flg = false;

    for (i = 0; i < input.length; i++) {
        if (input[i].value.length == 0) {
            inputFlg = true;
        }
    }

    for (i = 0; i < error.length; i++) {
        if (error[i].innerText.length != 0) {
            errorFlg = true;
        }
    }

    if (inputFlg) {
        alert("未入力の項目があります");
    } else if (errorFlg) {
        alert("不正な項目があります");
    } else {
        flg = confirm("現在の内容で登録します。\nよろしいですか？");
    }

    if (flg) {
        document.form22.submit();
    }
}

function HidePass() {
    var pass = document.getElementById("word");
    var eye = document.getElementById("buttonEye");

    if (pass.type === "text") {
        pass.type = "password";
        eye.className = "far fa-eye";
    } else {
        pass.type = "text";
        eye.className = "far fa-eye-slash";
    }
}