<?php
session_start();
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__.'/functions/functions.php';

$publicationId = $_GET['id'];
$userId = $_SESSION['connected'];

try {
    $stmt = $pdo->prepare(
        "INSERT INTO Share (user_id,publication_id)
        VALUES (:user_id, :publication_id)"
    );
    
    $creationRetweet = $stmt->execute([
        'user_id' => $userId,
        'publication_id' => $publicationId
    ]);
    
    redirect('index.php');
} catch (Exception $e) {
    $statement = $pdo->prepare(
        "DELETE FROM `Share` WHERE `Share`.`user_id` = $userId AND `Share`.`publication_id` = $publicationId"
    );
    
    $deleteRetweet = $statement->execute();
    
    redirect('index.php');
}

