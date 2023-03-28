<?php

use App\MsgValidate;
use App\MsgError;

function validate()
{
    if (array_key_exists('validate', $_GET)) { ?>
        <div class="alert alert-success">
            <?php echo MsgValidate::getValidateMessage(intval($_GET['validate'])); ?>
        </div>
    <?php }
}

function loginError()
{
    if (array_key_exists('error', $_GET)) { ?>
        <div class="alert alert-danger">
            <?php echo MsgError::getErrorMessage(intval($_GET['error'])); ?>
        </div>
<?php }
}

/**
 * Redirects to given location and exits
 *
 * @param string $location URL, can include params
 * @return void
 */
function redirect(string $location): void
{
    header('Location: ' . $location);
    exit;
}
