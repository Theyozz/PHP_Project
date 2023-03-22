<?php
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ .'/modal/comment_modal.php';

$stmt = $pdo->prepare(
    "SELECT p.*, u.id as user_id, u.img, u.pseudo, u.mail FROM Publication p INNER JOIN users u
    ON p.user_id = u.id 
    ORDER BY p.date_publication DESC");
$results = $stmt->execute();

if (!empty($_SESSION)) {
    foreach ($stmt as $tweetInfo) {
        echo '<div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">' . '<div class="ms-3 d-flex align-items-end gap-2"><img src="' . $tweetInfo['img'] . '" alt="" width="45px" height="45px" class="rounded-circle"> ' . '</img>' . '<div><p class=" fw-semibold m-0">' . $tweetInfo['pseudo'] . '</p><p class="m-0">' . $tweetInfo['mail'] . '</p></div></div>' . '<p class="p-4">' . $tweetInfo['content'] . '</p>' . '<div class="d-flex justify-content-between ms-3"><div class="d-flex gap-2 align-items-end mb-3"><button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#commentModal"><img src="img/commenter.png" width="20px" height="20px"></button><img src="img/retweet.png" width="20px" height="20px"></div><p class="text-end pe-4">' . $tweetInfo['date_publication'] . '</p></div>' . '</div>';
    }
} else {
    header('location:login.php');
}
