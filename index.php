<?php
require 'config.php';
require 'header.php';
//alert for successfull login
if (isset($_GET['msg_login'])) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            You logged in!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ';
}
require 'footer.php';

//create alert messages for other successfull outputs i.e. signed up etc
?>
