<?php

function loginError()
{
    if (array_key_exists('error', $_GET)) { ?>
        <div class="alert alert-danger">
            <?php echo MsgError::getErrorMessage(intval($_GET['error'])); ?>
        </div>
<?php }
} 