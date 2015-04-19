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
                        <h2>Web-Chat</h2>
                        <p>
                            Get qualified help by the creators of elementary OS without leaving your browser!
                            Thanks to an automatic link to our IRC and slack channels you have access to a big community of contributers.
                        </p>
                        <p>
                            Please choose an username to start the chat!
                        </p>
                    </div>
                    <div class="column half">
                        <input class="login-username" type="text" />
                        <button class="login-submit button flat suggested-action small">Login</button>
                    </div>
                </div>
            </section>
            <section id="irc-view" class="view login">
                <div class="row">
                    <div class="column half">
                        <h2>IRC-Channel</h2>
                        <p>
                            You do not want to use the web-chat?
                        </p>
                        <p>
                            No problem, just open your favourite IRC-Client
                            and connect to the server address on the right.
                        </p>
                    </div>
                    <div class="column half">
                        <tt><h3>elementary-dev.freenode.net</h3></tt>
                    </div>
                </div>
            </section>

            <section id="chat-view" class="view chat">
                <div id="messages">
                    <div class="row chat-history"></div>
                </div>
                <div id="new-message">
                    <div class="row">
                        <input class="chat-message" type="text" />
                        <button class="chat-submit suggested-action small">Send</button>
                    </div>
                </div>
            </section>

            <section id="disconnected-view" class="view disconnected">
                <div class="row">
                    <h3>Connection failed</h3>
                    <p>Connecting to server failed, please try it again later. If this problem persists please contact the elementary web-team.<br /><br />Sorry for the inconvenience!</p>
                </div>
            </section>
<?php
    include $template['footer'];
?>
