console.log('userId: ', userId);
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('16429a142ef081fe865a', {
    cluster: 'eu'
});

var userIds = [];

var channel = pusher.subscribe('notification');
channel.bind('form-submitted', function(data) { // App\Events\MessageNotification // alert(JSON.stringify(data));


    var messageDirectionClass = (userId === data.userId) ? 'chat-message-right' : 'chat-message-left';
    var userName = (userId === data.userId) ? (data.userName + ' (Вы)')  : data.userName;

    $("#chat-section .position-relative .chat-messages").append('<div class="'+messageDirectionClass+' mb-4"><div>' +
        '<img src="' + data.userAvatar + '" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40"> ' +
        '<div class="text-muted small text-nowrap mt-2">' + data.dateNow + '</div> </div> ' +
        '<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3"> <div class="font-weight-bold mb-1">' + userName +
        '</div>' + data.message + '</div></div>');

    if($.inArray( data.userId, userIds ) === -1)
    {
        userIds.push(data.userId);
        $(".border-right #chat-participants").append('<a attr-user="'+data.userId+'" href="#" class="list-group-item list-group-item-action border-0">\n' +
            '                            <div class="d-flex align-items-start">\n' +
            '                                <img src="' + data.userAvatar + '" class="rounded-circle mr-1" alt="William Harris" width="40" height="40">\n' +
            '                                <div class="flex-grow-1 ml-3">\n' + userName +
            '                                    <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                        </a>');
    }
});
