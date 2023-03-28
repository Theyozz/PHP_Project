<?php

use App\Session;

require_once __DIR__.'/vendor/autoload.php'; 
require_once __DIR__.'/functions/functions.php';

$session = new Session;
$session->logOut();
