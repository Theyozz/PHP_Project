<?php 
session_start();
require_once __DIR__.'/bdd/pdo.php';

$content = $_POST['content'];
var_dump($_POST);

if (!empty($content)) {
    $stmt = $pdo->prepare(
        "INSERT INTO publication (content,user_id)
        VALUES (:content,:user_id)"
        );
    
        $results = $stmt->execute([
            'content' => $content,
            'user_id' => $_SESSION['connected']
        ]);    
        header('location:index.php');
}

