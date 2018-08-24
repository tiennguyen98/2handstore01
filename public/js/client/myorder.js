$(document).ready(function () {
    $('.discard').click(function () {
        if (confirm($(this).attr('data-msg')) == false) {
            return false;
        }
    });
});
