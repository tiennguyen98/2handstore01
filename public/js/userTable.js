function show(url, id) {
    $.ajax({
        url: url,
        method: 'GET',
        data: {id: id},
        success: function (result) {
            $('#modal-body').html(result);
        }
    });
}

function block(url, id) {
    var option = $('.btn-warning').attr('data-option');
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'POST',
        data: {id: id, option: option},
        success: function (result) {
            $('.table-user').html(result);
        }
    });
}

function showOption(url, target) {
    $('.show-option').removeClass('btn-warning');
    $(target).addClass('btn-warning');
    var option = $(target).attr('data-option');
    $.ajax({
        url: url,
        method: 'get',
        data: {option: option},
        success: function(result) {
            $('.table-user').html(result);
        }
    });
}
