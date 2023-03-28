<?php

use App\MsgValidate;

function validate()
{
    if (array_key_exists('validate', $_GET)) { ?>
        <div class="alert alert-success">
            <?php echo MsgValidate::getValidateMessage(intval($_GET['validate'])); ?>
        </div>
<?php }
} 