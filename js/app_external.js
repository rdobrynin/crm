require(['jquery', 'externalJS'], function ($, externalJS) {
    $(function () {
        return externalJS.appearAvatar();
    });
    var pathArray = window.location.pathname.split('/');
    if (pathArray[1] == 'signup') {
        $(function () {
            return externalJS.checkEmail();
        });
    }

});