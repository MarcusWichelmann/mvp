<?php
    include '_templates/sitewide.php';
    $page['title'] = 'Developer Chat';
    include $template['header'];
?>
            <script>
                jQl.loadjQdep('scripts/jQuery.leanModal2.js');
                jQl.loadjQdep('scripts/web-chat.js');
            </script>

            <div class="row">
                <h1>Developer Chat</h1>
                <h4>Ask the elementary-developers your questions</h4>
            </div>

            <div class="row chat-history"></div>

            <div class="row">
                <input class="chat-input" type="text" />
                <button class="chat-submit suggested-action">Send</button>
            </div>
<?php
    include $template['footer'];
?>
