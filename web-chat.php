<?php
    include '_templates/sitewide.php';
    $page['title'] = 'Developer Chat';
    $page['scripts'] .= '<link rel="stylesheet" type="text/css" media="all" href="styles/web-chat.css">';
    include $template['header'];
?>
            <script>
                jQl.loadjQdep('scripts/web-chat.js');
            </script>

            <div class="row">
                <h1>Developer Chat</h1>
                <h4>Ask the elementary-developers your questions</h4>
            </div>

            <section id="connecting-view">
                <div class="row">
                    Connecting...
                </div>
            </section>

            <section id="login-view">
                <div class="row">
                    <input class="login-username" type="text" />
                    <button class="login-submit suggested-action">Login</button>
                </div>
            </section>

            <section id="chat-view">
                <div class="row chat-history"></div>

                <div class="row">
                    <input class="chat-message" type="text" />
                    <button class="chat-submit suggested-action">Send</button>
                </div>
            </section>

            <section id="disconnected-view">
                <div class="row">
                    <h3>Connection failed</h3>
                    <p>Connecting to server failed, please try it again later. If this problem persists please contact the elementary web-team.<br /><br />Sorry for the inconvenience!</p>
                </div>
            </section>
<?php
    include $template['footer'];
?>
