define(function () {
    $(function () {
//      Autocomplete names
        $.ajax({
            url: '/ajax/getUserNames',
            type: 'GET',
            dataType: 'json',
            success: function (msg) {
                names = msg.users_names;

                var full_names = [];
                var full_names_id = [];
                $.each(names, function (index, value) {
                    full_names.push(value);
                    full_names_id.push(index);
                });
                $('#qm-autocomplete').autocomplete(full_names, {
                    autoFill: true,
                    selectFirst: true,
                    width: '240px'
                });

            }
        });
    });
});

