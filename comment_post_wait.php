<?php
require_once __DIR__ .'/bdd/pdo.php';
require_once __DIR__ .'/layout/header.php';

$postId = $_POST['idPublication'];
$comment = $_POST['comment'];
$userId = $_SESSION['connected'];

if (!empty($comment)) {
    $stmt = $pdo->prepare(
        "INSERT INTO comment (c_content,publication_id,user_id)
        VALUES (:comment,:p_id,:u_id)");
    
    $results = $stmt->execute([
        'comment' => $comment,
        'p_id' => $postId,
        'u_id' => $userId
    ]);
    header('location:post.php?id='.$postId);
} else {
    header('location:post.php?id='.$postId);
}



