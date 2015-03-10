define(function () {

    $(".help-button").click((function () {
        var i = 0;
        return function () {
            $('.help-block').animate({
                height: (++i % 2) ? 490 : 10,
                background: 'rgb(255, 144, 11)', opacity: 0.9
            }, 200);
            $('.help-content').slideToggle('fast');
        }
    })());
});

