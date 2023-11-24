var postError = document.getElementById("postError");
var post = document.getElementById("post");

post.addEventListener('input', function () {
    var inputValue = this.value.replace(/[^0-9]/g, '');

    if (inputValue.length > 3) {
        inputValue = inputValue.slice(0, 3);
    } else if (inputValue.length < 3) {
        postError.innerText = "郵便番号が不正です";
    } else {
        postError.innerText = "";
    }

    this.value = inputValue;
});

var code = document.getElementById("code");

code.addEventListener('input', function () {
    var inputValue = this.value.replace(/[^0-9]/g, '');

    if (inputValue.length > 4) {
        inputValue = inputValue.slice(0, 4);
    } else if (inputValue.length < 4) {
        postError.innerText = "郵便番号が不正です";
    } else {
        postError.innerText = "";
    }

    this.value = inputValue;
});

var pass = document.getElementById("password");
var passError = document.getElementById("passError");
var word = document.getElementById("word");

pass.addEventListener('input', function () {
    if (this.value === word.value || this.value.length == 0) {
        passError.innerText = "";
    } else {
        passError.innerText = "パスワードが一致しません。";
    }
});

var mail = document.getElementById("mail");
var mailError = document.getElementById("mailError");

mail.addEventListener('input', function () {
    var email = mail.value;
    var regex = /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;

    if (regex.test(email) || this.value.length == 0) {
        mailError.innerText = "";
    } else {
        mailError.innerText = "無効なメールアドレスです。";
    }
});

function send() {
    var input = document.getElementsByClassName("input");
    var bool = false;
    var flg = false;

    for (i = 0; i < input.length; i++) {
        if (input[i].value.length == 0) {
            bool = true;
        }
    }

    if (!bool) {
        flg = confirm("現在の内容で登録します。\nよろしいですか？");
    } else {
        alert("未入力の項目があります");
    }

    if (flg) {
        document.form22.submit();
    }
}