<?php 
require_once __DIR__ .'/bdd/pdo.php';
require_once __DIR__ .'/functions/redirect.php';

$tweetId = $_GET['id'];

$deletingComment = $pdo->prepare(
    "DELETE FROM `comment` 
    WHERE `comment`.`publication_id` = $tweetId");

$commentDeleted = $deletingComment->execute();

$deletingShare = $pdo->prepare(
    "DELETE FROM `share` 
    WHERE `share`.`publication_id` = $tweetId");

$shareDeleted = $deletingShare->execute();

$deletingTweet = $pdo->prepare(
    "DELETE FROM `Publication` 
    WHERE `Publication`.`id` = $tweetId"
);

$tweetDelete = $deletingTweet->execute();

redirect('index.php');