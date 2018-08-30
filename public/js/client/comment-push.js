$(document).ready(function () {
    var channel = $('channel').text();

    Pusher.logToConsole = true;

    var comment = new Pusher('350836dd3d57ea3538c6', {
        cluster: 'ap1',
        encrypted: true
    });

    var comment_channel = comment.subscribe('comment-channel' + channel);
    comment_channel.bind('App\\Events\\CommentEvent', function (data) {
        var element = `<a class="notify_link" href="${data['link']}">${data['message']}</a>`;
        $('.notify').append(element);
        setTimeout(function () {
            $('.notify_link').remove();
        }, 20000);
    });
});
