function destroy(url, target) {
    target = target || '.content';
    $.ajax({
        url: url,
        method: 'post',
        data: {_method: 'delete'},
        success: function (result) {
            $(target).html(result);
        }
    })
}
