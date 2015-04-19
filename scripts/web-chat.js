(function () {

    // <<< Configuration >>>

    // Chat-Host
    var server = 'ws://localhost:8080/chat';

    // Set to true to enable debugging
    var debug = true;


    // <<< Variables >>>

    var socket;

    var connected = false;
    var logged_in = false;

    var nick_name = "";


    // <<< Initialization >>>

    console.log ('Loaded web-chat.js');

    connect (server);

/* For debugging the design
set_view ('chat');
$('.chat-history').append (create_message_html ('the dark lord', '15:47:23', 'Testmessage'));
$('.chat-history').append (create_message_html ('the choosen one', '15:48:32', 'Unus duo tre quatour quinque sex septem octo novem decem'));
$('.chat-history').append (create_message_html ('snape', '15:49:12', 'Grrrr.. ;)'));
$('.chat-history').append (create_message_html ('the dark lord', '15:47:23', 'Testmessage'));
$('.chat-history').append (create_message_html ('the choosen one', '15:48:32', 'Unus duo tre quatour quinque sex septem octo novem decem'));
$('.chat-history').append (create_message_html ('snape', '15:49:12', 'Grrrr.. ;)'));
$('.chat-history').append (create_message_html ('the dark lord', '15:47:23', 'Testmessage'));
$('.chat-history').append (create_message_html ('the choosen one', '15:48:32', 'Unus duo tre quatour quinque sex septem octo novem decem'));
$('.chat-history').append (create_message_html ('snape', '15:49:12', 'Grrrr.. ;)'));
$('.chat-history').append (create_message_html ('the dark lord', '15:47:23', 'Testmessage'));
$('.chat-history').append (create_message_html ('the choosen one', '15:48:32', 'Unus duo tre quatour quinque sex septem octo novem decem'));
$('.chat-history').append (create_message_html ('snape', '15:49:12', 'Grrrr.. ;)'));
*/
    // <<< Events >>>

    socket.onopen = function () {
        connected = true;

        console.log ('Connected');

        set_view ('login');
    };

    socket.onerror = function () {
        console.error ('Networking error.');
    };

    socket.onclose = function () {
        connected = false;
        logged_in = false;

        nick_name = "";

        console.log ('Connection closed.');

        set_view ('disconnected');
    };

    socket.onmessage = data_received;

    $('.login-submit').click (function () {
        nick_name = $('.login-username').val ();

        if (debug)
            console.log ('Nickname set to: ' + nick_name);

        login ();
    });

    $('.chat-submit').click (function () {
        send_message ($('.chat-message').val ());
    });


    // <<< Functions >>>

    function connect (host) {
        if (!connected) {
            set_view ('connecting');

            socket = new WebSocket (host, 'web-chat');
        } else {
            console.warn ('Already connected');
        }
    }

    function login () {
        if (connected && !logged_in) {
            send_json ({
                action: 'login',
                data: {
                    nick: nick_name
                }
            });
        } else {
            console.warn ('Login not allowed');
        }
    }

    function logout () {
        if (connected && logged_in) {
            send_json ({
                action: 'logout',
            });
        } else {
            console.warn ('Not logged in');
        }
    }

    function send_message (msg) {
        if (connected && logged_in) {
            send_json ({
                action: 'message',
                data: {
                    message: msg
                }
            });
        } else {
            console.warn ('Not logged in');
        }
    }

    function data_received (event) {
        var json = JSON.parse (event.data);

        if (debug)
            console.log ('Response: ' + json);

        switch (json.action) {
            case 'ack_login':
                if (json.ok) {
                    set_view ('chat');
                } else {
                    // TODO display error_messages[json.data.error]
                }

                break;
            case 'ack_logout':
                if (json.ok) {
                    set_view ('login');
                    nick_name = "";
                } else {
                    // TODO display error_messages[json.data.error]
                }

                break;
            case 'ack_message':
                if (json.ok) {
                    // clear entry
                } else {
                    // TODO display error_messages[json.data.error]
                }

                break;
            case 'message':
                var now = new Date ();
                var time_str = now.getHours () + ':' + now.getMinutes () + ':' + now.getSeconds ();

                $(".chat-history").append (create_message_html (json.data.sender, time_str, json.data.message));

                break;
            default:
                console.warn ('Unsupported action "' + json.action + '"');

                break;
        }
    }

    function send_json (arr) {
        if (connected) {
            var json = JSON.stringify (arr);

            if (debug)
                console.log ('Request: ' + json);

            socket.send (JSON.stringify (arr));
        } else {
            console.warn ('Not connected');
        }
    }

    function create_message_html (author, time, message) {
        var html = '<div class="message">';

        html += '<span class="irc-username ' + author + '">' + author + '</span>';
        html += '<span class="irc-timestamp">' + time + '</span>';
        html += '<p class="message-text">' + message + '</p>';
        html += '</div>';

        return html;
    }

    function set_view (view) {
        $('section.view').hide ();
        $('section.view.' + view).show ();
    }

})();
