<?php 
session_start();
require_once __DIR__.'/bdd/pdo.php';

$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$userId = $_SESSION['connected'];

if (!empty($pseudo)) {
    $stmt = $pdo->prepare(
        "UPDATE users
        SET pseudo = :pseudo
        WHERE users.id = '$userId'"
        );
    
        $results = $stmt->execute([
            'pseudo' => $pseudo
        ]);    
        header('location:profil.php');
}else {
    header('location:profil.php');
}

if (!empty($mail)) {
    $stmt2 = $pdo->prepare(
        "UPDATE users
        SET mail = :mail
        WHERE users.id = '$userId'"
        );
    
        $results2 = $stmt2->execute([
            'mail' => $mail
        ]);    
        header('location:profil.php');
}else {
    header('location:profil.php');
}
