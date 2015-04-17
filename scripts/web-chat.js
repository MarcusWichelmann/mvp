(function () {

    // Configuration

    var server = 'ws://elementary.io';


    // Variables

    var socket;

    var connected = false;
    var logged_in = false;


    // Initialization

    console.log ('Loaded web-chat.js');

    connect (server);


    // Events

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

        console.log ('Connection closed.');

        set_view ('network-failure');
    };

    $('.login-submit').click (function () {
        login ($('.login-username').val ());
    });

    $('.chat-submit').click (function () {
        send_message ($('.chat-message').val ());
    });


    // Functions

    function connect (host) {
        if (!connected) {
            set_view ('connecting');

            socket = new WebSocket (host, 'web-chat');
        } else {
            console.warn ('Already connected');
        }
    }

    function login (username) {
        if (connected && !logged_in) {
            // TODO: Login

            set_view ('chat');
        } else {
            console.warn ('Login not allowed');
        }
    }

    function logout () {
        if (connected && logged_in) {
            // TODO: Logout

            set_view ('login');
        } else {
            console.warn ('Not logged in');
        }
    }

    function send_message (message) {
        if (connected && logged_in) {
            // TODO: Send message
        } else {
            console.warn ('Not logged in');
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
        $('.view.connecting').hide ();
        $('.view.login').hide ();
        $('.view.chat').hide ();
        $('.view.network-failure').hide ();

        $('.view.' + view).show ();
    }

})();
