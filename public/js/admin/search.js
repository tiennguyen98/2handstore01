$(document).on('keypress', '#search', function (event) {
    if(event.which == 13) {
        (event).preventDefault();
        let url = $(this).attr('action');
        let search = $('#input-search').val();
        let content = url.indexOf('admin/users') != -1 ? '.table-user' : '.content';
        $.ajax({
            url: url,
            method: 'get',
            data: {search: search},
            success: function(result) {
                $(content).html(result);
            }
        });

        return;
    }
});
