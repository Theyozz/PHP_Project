<?php

use App\MsgValidate;
use App\MsgError;


function Validate()
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



function displayFollowButton($follows, $userId):void
{
    if ($follows) { ?>
        <a class='text-decoration-none' href="follow.php?id=<?php echo $userId ?>">
            <button type="button" class="btn btn-danger fw-light">
                Unfollow
            </button>
        </a>
    <?php } else { ?>
        <a href="follow.php?id=<?php echo $userId ?>">
            <button type="button" class="btn btn-primary fw-light">
                Follow
            </button>
        </a>
    <?php  }
}

