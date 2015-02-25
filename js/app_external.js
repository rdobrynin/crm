



requirejs.config({
    "paths": {
        "jquery": window.location.origin+"/assets/js/jquery-1.11.1.min"
    }
});



require(['jquery', 'externalJS'], function ($, externalJS) {
    $(function () {
        return externalJS.appearAvatar();
    });
    var pathArray = window.location.pathname.split('/');
//    if (pathArray[1] == 'signup') {
        $(function () {
            return externalJS.checkEmail();
        });
//    }

});