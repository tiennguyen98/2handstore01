function destroy(url, target) {
    target = target || '.content';
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'post',
        data: {_method: 'delete'},
        success: function (result) {
            $(target).html(result);
        }
    })
}
