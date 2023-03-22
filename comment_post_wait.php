<?php 
session_start();
require_once __DIR__.'/bdd/pdo.php';

$comment = $GET['comment'];
var_dump($_GET);

if (!empty($comment)) {
    $stmt = $pdo->prepare(
        "UPDATE Publication
        SET comment = :comment
        WHERE Publication.id = "
    );

    $results = $stmt->execute([
        'comment' => $comment
    ]);
    // header('location:profil.php');
} else {
    // header('location:profil.php');
}