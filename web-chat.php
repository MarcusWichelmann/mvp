<?php
    include '_templates/sitewide.php';
    $page['title'] = 'Developer Chat';
    include $template['header'];
?>
            <script>
                jQl.loadjQdep('scripts/web-chat.js');
            </script>

            <div class="row">
                <h1>Developer Chat</h1>
                <h4>Ask the elementary-developers your questions</h4>
            </div>

            <div class="row view connecting">
                Connecting...
            </div>

            <div class="row view login">
                <input class="login-username" type="text" />
                <button class="login-submit suggested-action">Login</button>
            </div>

            <div class="row view chat chat-history"></div>

            <div class="row view chat">
                <input class="chat-message" type="text" />
                <button class="chat-submit suggested-action">Send</button>
            </div>

            <div class="row view network-failure">
                grr
            </div>
<?php
    include $template['footer'];
?>
