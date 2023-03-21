<?php
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php'; 

$pseudo = $_POST['pseudo'];
$pass = $_POST['mdp'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");

$results = $stmt->execute([
    'pseudo' => $pseudo,
]);

$user = $stmt->fetch();

if ($user && password_verify($pass, $user['mdp'])) {
    
    $_SESSION['connected']=$user['id'];
    header("location:index.php");
    exit();
} else {
    header("location:erreur.html");
    exit();
}

?>