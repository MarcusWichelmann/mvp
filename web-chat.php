<?php
    include '_templates/sitewide.php';
    $page['title'] = 'Developer Chat &sdot; elementary';
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

            <div class="row chat-history">
                <div class="message">
                    <span class="irc-username someuser">someuser</span>
                    <span class="irc-timestamp">7:00 pm</span>
                    <p class="message-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
                <div class="message">
                    <span class="irc-username imyourfather">imyourfather</span>
                    <span class="irc-timestamp">7:02 pm</span>
                    <p class="message-text">At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
            </div>

            <div class="row">
                <input class="chat-input" type="text" />
                <button class="chat-submit suggested-action">Send</button>
            </div>
<?php
    include $template['footer'];
?>
