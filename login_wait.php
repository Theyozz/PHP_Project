<?php
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php'; 
require_once __DIR__ .'/classes/LoginError.php';
require_once __DIR__ .'/functions/redirect.php';

$pseudo = $_POST['pseudo'];
$pass = $_POST['mdp'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");

$results = $stmt->execute([
    'pseudo' => $pseudo,
]);

$user = $stmt->fetch();

if ($user && password_verify($pass, $user['mdp'])) {
    
    $_SESSION['connected']=$user['id'];
    redirect('index.php');
    exit();
} else {
    redirect('login.php?error=' . LoginError::PASS_PSEUDO_INVALID);
    exit();
}

?>