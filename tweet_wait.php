<?php 
session_start();
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/functions/functions.php';

$content = $_POST['content'];

if (!empty($content)) {
    $stmt = $pdo->prepare(
        "INSERT INTO Publication (content,user_id)
        VALUES (:content,:user_id)"
        );
    
        $results = $stmt->execute([
            'content' => $content,
            'user_id' => $_SESSION['connected']
        ]);    
        redirect('index.php');
}else {
    redirect('login.php');
}

