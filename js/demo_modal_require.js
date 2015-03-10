define(function () {
    $('#qm-link-file-btn, #edit-project-table, #delete-project-table').click(function () {
        $('#demo_modal').modal('show');
    });


    $('#btn-del-company, #btn-edit-company').click(function () {
        $('#demo_modal').modal('show');
        return false;
    });

    $('#edit-btn-user').click(function () {
        $('#demo_modal').modal('show');
        return false;
    });
});