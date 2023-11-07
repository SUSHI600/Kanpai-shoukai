$(function(){
    // マウスオーバー
    $(".mod_dropnavi ul li img").mouseover(function() {
        // ここに何もコードを書かないか、空の関数を使います
    }).mouseout(function(){
        $(this).attr("src", $(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/, "$1$2"));
    }).each(function(){
        $("<img>").attr("src", $(this).attr("src").replace(/^(.+)(\.[a-z]+)$/, "$1_on$2"));
    });

    // ドロップダウン表示
    $(".mod_dropnavi ul.topmenu li.slidebtn>a").addClass("close");
    $(".mod_dropnavi ul.submenu").addClass("close");

    $(".mod_dropnavi ul.topmenu li.slidebtn>a").each(function(){
        var allsubmenu = $(".mod_dropnavi ul.submenu");
        var btn = $(this);
        var submenu = $(this).next();
        btn.click(function(){
            if($(this).hasClass("open")){
                $(this).removeClass("open").addClass("close");
                $(submenu).slideUp("fast");
            } else {
                $(allsubmenu).slideUp("fast");
                $(".mod_dropnavi ul.topmenu li.slidebtn>a").removeClass("open").addClass("close");
                $(submenu).slideDown("fast");
                $(btn).removeClass("close").addClass("open");
            }
            return false;
        });
    });
});