<?php 
require_once __DIR__ . '/functions/redirect.php';

session_start();
session_destroy();
redirect('login.php');