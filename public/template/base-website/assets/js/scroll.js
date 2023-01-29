$(document).ready(function () {
    $(".active-navbar").click(function () {
        $(".active-navbar").removeClass("active-navbar");
        $(this).addClass("active-navbar");
    });
    $(window).scroll(function () {
        var lastScroll = 0,
            del = 4;
        var nowScroll = $(this).scrollTop();
        var x = document.getElementById("top-nav");
        if (Math.abs(lastScroll - nowScroll) >= del) {
            if (nowScroll > lastScroll) {
                x.style.background = "#21CA5A";
            }
            lastScroll = nowScroll;
        } else {
            x.style.background = "transparent";
        }
    });

    // $(window).scroll(function () {
    //     var lastScroll = 0,
    //       del = 4;
    //     var nowScroll = $(this).scrollTop();
    //     var x = document.getElementById("btn-sign");
    //     if (Math.abs(lastScroll - nowScroll) >= del) {
    //       if (nowScroll > lastScroll) {
    //         x.style.border = "1px solid #fff";
    //         x.style.color = "#fff";
    //       };
    //       lastScroll = nowScroll;
    //     };
    //   });

    $(window).scroll(function () {
        var lastScroll = 0,
            del = 4;
        var nowScroll = $(this).scrollTop();
        var x = document.getElementById("svg-action");
        if (Math.abs(lastScroll - nowScroll) >= del) {
            if (nowScroll > lastScroll) {
                x.style.border = "1px solid #fff";
                x.style.background = "#fff";
                x.style.borderRadius = "50px";
                x.style.padding = "3px";
            }
            lastScroll = nowScroll;
        } else {
            x.style.border = "none";
            x.style.background = "none";
            x.style.padding = "0px";
            x.style.borderRadius = "0px";
        }
    });
});
