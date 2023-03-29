<?php

use App\MsgValidate;
use App\Session;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__ .'/bdd/pdo.php';
require_once __DIR__.'/functions/functions.php';
$session = new Session;
$session->notLogIn();

$userId = $_SESSION['connected'];

$deletingComment = $pdo->prepare(
    "DELETE FROM `comment` 
    WHERE `comment`.`user_id` = $userId");

$commentDeleted = $deletingComment->execute();

$deletingShare = $pdo->prepare(
    "DELETE FROM `share` 
    WHERE `share`.`user_id` = $userId");

$shareDeleted = $deletingShare->execute();

$deletingLikes = $pdo->prepare(
    "DELETE FROM `likes` 
    WHERE `likes`.`user_id` = $userId");

$likeDeleted = $deletingLikes->execute();

$deletingTweet = $pdo->prepare(
    "DELETE FROM `Publication` 
    WHERE `Publication`.`user_id` = $userId"
);

$tweetDelete = $deletingTweet->execute();

$deletingFollow = $pdo->prepare(
    "DELETE FROM `Follow` 
    WHERE `Follow`.`user_id` = $userId OR `Follow`.`f_id` = $userId"
);

$FollowDelete = $deletingFollow->execute();

$deletingUser = $pdo->prepare(
    "DELETE FROM `users` WHERE `users`.`id` = $userId"
);

$userDelete = $deletingUser->execute();

session_destroy();
redirect('login.php?validate='. MsgValidate::DELETE_USER);