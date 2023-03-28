<?php

use App\Session;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__ .'/bdd/pdo.php';
require_once __DIR__ .'/functions/redirect.php';
$session = new Session;
$session->notLogIn();

$tweetId = $_GET['id'];

$deletingComment = $pdo->prepare(
    "DELETE FROM `comment` 
    WHERE `comment`.`publication_id` = $tweetId");

$commentDeleted = $deletingComment->execute();

$deletingShare = $pdo->prepare(
    "DELETE FROM `share` 
    WHERE `share`.`publication_id` = $tweetId");

$shareDeleted = $deletingShare->execute();

$deletingLikes = $pdo->prepare(
    "DELETE FROM `likes` 
    WHERE `likes`.`publication_id` = $tweetId");

$likeDeleted = $deletingLikes->execute();

$deletingTweet = $pdo->prepare(
    "DELETE FROM `Publication` 
    WHERE `Publication`.`id` = $tweetId"
);

$tweetDelete = $deletingTweet->execute();

redirect('index.php');