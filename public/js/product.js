$(document).ready(function(){
    $('.delete').click(function(){
        
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        let msg = $(this).attr('data-msg');

        if(confirm(msg) == false){
            return false;
        }

        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if(result.status == 'success'){
                    $('#product' + id).fadeOut(500, function(){
                        $(this).remove();
                    });
                }
            }
        });
    });
});

