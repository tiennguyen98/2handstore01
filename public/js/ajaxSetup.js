$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
    }
});

$(document).on('input', '#header-search', function () {
    var search = $(this).val();
    url = $(this).attr('data-url');
    let element = $(this);
    $.ajax({
        url: url,
        data: {search: search},
        method: 'Get',
        success: function (result) {
            $('#result').html(result);
        }
    })
});

$('body').click(function (event) {
    console.log(event.target.id);
    if(event.target.id !== 'result') {
        $('#result').html('');
    }
});
