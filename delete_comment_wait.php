<?php

use App\Session;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__ .'/bdd/pdo.php';
require_once __DIR__.'/functions/functions.php';
$session = new Session;
$session->notLogIn();

$commentId = $_GET['id'];

$deletingComment = $pdo->prepare(
    "DELETE FROM `comment` 
    WHERE `comment`.`id` = $commentId");

$commentDeleted = $deletingComment->execute();


redirect('index.php');