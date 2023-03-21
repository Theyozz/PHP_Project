<?php
require_once __DIR__ . '/bdd/pdo.php';

$stmt = $pdo->prepare(
    "SELECT * FROM Publication INNER JOIN users 
    ON Publication.user_id = users.id 
    ORDER BY Publication.date_publication DESC");
$results = $stmt->execute();

if (!empty($_SESSION)) {
    foreach ($stmt as $tweetInfo) {
        echo '<div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">' . '<div class="ms-3 d-flex align-items-end gap-2"><img src="' . $tweetInfo['img'] . '" alt="" width="40px" height="40px" class="rounded-4"> ' . '</img>' . '<div><p class=" fw-semibold m-0">' . $tweetInfo['pseudo'] . '</p><p class="m-0">' . $tweetInfo['mail'] . '</p></div></div>' . '<p class="p-4">' . $tweetInfo['content'] . '</p>' . '<p class="text-end pe-4">' . $tweetInfo['date_publication'] . '</p>' . '</div>';
    }
} else {
    header('location:login.php');
}
