(function () {
    console.log('Loaded web-chat.js');

// TODO
$('.chat-history').append (create_message_html ('imagod', '42:42:13', 'Lorem ipsum ... you know it already.. ;)'));
$('.chat-history').append (create_message_html ('imyourfather', '42:42:14', 'Test entry'));

    function create_message_html (author, time, message) {
        var html = "<div class=\"message\">";

        html += "<span class=\"irc-username " + author + "\">" + author + "</span>";
        html += "<span class=\"irc-timestamp\">" + time + "</span>";
        html += "<p class=\"message-text\">" + message + "</p>";
        html += "</div>";

        return html;
    }
})();
