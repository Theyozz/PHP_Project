<?php
session_start();
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/functions/redirect.php';

$publicationId = $_GET['id'];
$userId = $_SESSION['connected'];

try {
    $stmt = $pdo->prepare(
        "INSERT INTO Likes (user_id,publication_id)
        VALUES (:user_id, :publication_id)"
    );
    
    $creationLikes = $stmt->execute([
        'user_id' => $userId,
        'publication_id' => $publicationId
    ]);
    
    redirect('index.php');
} catch (Exception $e) {
    $statement = $pdo->prepare(
        "DELETE FROM `Likes` WHERE `Likes`.`user_id` = $userId AND `Likes`.`publication_id` = $publicationId"
    );
    
    $deleteLikes = $statement->execute();
    
    redirect('index.php');
}