define(function () {

    $(function () {
        $('#logout').click(function () {
            localStorage.setItem("dialog", "0");
        });
    });

});