<?php
require 'config.php';
require 'header.php';
if (isset($_GET['msg_login'])) {
        echo '
        <div class="alert alert-success">
            <p>You are logged in!</p>
        </div>
        ';
}
require 'footer.php';
?>