<?php 
require_once __DIR__ . '/classes/Session.php';
require_once __DIR__ . '/functions/redirect.php';

$session = new Session ;
$session->logOut();
