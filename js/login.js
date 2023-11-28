function send() {
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
        document.loginForm.submit();
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