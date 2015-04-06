define(['jquery','bootstrap_scrollbar'], function ($) {
    $(function () {
        $(".comment-jsscroll").mCustomScrollbar({
            scrollButtons: {enable: true, scrollType: "stepped"},
            theme: "rounded-dark",
            autoExpandScrollbar: true,
            snapOffset: 65
        });
    });
});