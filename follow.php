<?php
session_start();
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/functions/redirect.php';

$f_id= $_GET['id'];
$userId = $_SESSION['connected'];

try {
    $stmt = $pdo->prepare(
        "INSERT INTO Follow (user_id,f_id)
        VALUES (:user_id, :f_id)"
    );
    
    $Follow = $stmt->execute([
        'user_id' => $userId,
        'f_id' => $f_id
    ]);
    
    redirect('user.php?id='. $f_id);
} catch (Exception $e) {
    $statement = $pdo->prepare(
        "DELETE FROM `Follow` WHERE `Follow`.`user_id` = $userId AND `Follow`.`f_id` = $f_id"
    );
    
    $deleteFollow = $statement->execute();
    
    redirect('user.php?id='. $f_id);
}

