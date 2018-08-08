$('.show').click(function () {
    var id = $(this).attr('data-id');
    $.ajax({
        url: "{{ route('admin.users.show') }}",
        method: 'GET',
        data: {id: id},
        success: function (result) {
            $('#modal-body').html(result);
        }
    });
});

$('.block').click(function () {
    var id = $(this).attr('data-id');
    var option = $('.btn-warning').attr('data-option');
    $.ajax({
        url: "{{ route('admin.users.block') }}",
        method: 'POST',
        data: {id: id, option: option,  _token: "{{ csrf_token() }}"},
        success: function (result) {
            $('.table-user').html(result);
        }
    });
});

$('.show-option').click(function() {
    $('.show-option').removeClass('btn-warning');
    $(this).addClass('btn-warning');
    var option = $(this).attr('data-option');
    $.ajax({
        url: "{{ route('admin.users.option') }}",
        method: 'get',
        data: {option: option},
        success: function(result) {
            $('.table-user').html(result);
        }
    });
});
