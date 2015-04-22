<?php
    include '_templates/sitewide.php';
    $page['title'] = 'Developer Chat';
    $page['scripts'] .= '<link rel="stylesheet" type="text/css" media="all" href="styles/web-chat.css">';
    include $template['header'];
?>
            <script>
                jQl.loadjQdep('scripts/web-chat.js');
            </script>

            <div class="row hero">
                <h1>Developer Chat</h1>
                <h4>Ask the elementary-developers your questions</h4>
            </div>

            <section id="connecting-view" class="view connecting">
                <div class="row">
                    <img class="spinner" src="images/web-chat/spinner.gif" alt="spinner" />
                </div>
                <div class="row">
                    Connecting to server...
                </div>
            </section>

            <section id="login-view" class="view login">
                <div class="row">
                    <div class="column half">
                        <h2>Web Chat</h2>
                        <p>
                            Use the web chat to contact elementary contributers that are in our virtual office, Slack.
                        </p>
                        <input class="login-username flat" type="text" />
                        <button class="login-submit flat">Login</button>
                    </div>
                    <div class="column half">
                        <h2>IRC</h2>
                        <p>
                            Would you rather use your own IRC client? Use the address <span class="irc-address">elementary-dev.freenode.net</span>
                            to connect to our irc chatroom.
                        </p>
                    </div>
                </div>
            </section>

            <section id="chat-view" class="view chat">
                <div id="messages">
                    <div class="row chat-history"></div>
                </div>
            </section>

            <section id="new-message-bar" class="view chat">
                <div class="row">
                    <input class="chat-message flat" type="text" />
                    <button class="chat-submit flat">Send</button>
                </div>
            </section>

            <section id="disconnected-view" class="view disconnected">
                <div class="row alert warning">
                    <div class="column alert">
                        <div class="icon">
                            <i class="warning fa fa-warning"></i>
                        </div>
                        <div class="icon-text">
                            <h3>Connection failed</h3>
                            <p>
                                Connecting to server failed, please try it again later. If this problem persists please contact the elementary web-team.<br /><br />Sorry for the inconvenience!
                            </p>
                        </div>
                    </div>
                </div>
            </section>
<?php
    include $template['footer'];
?>
