<?php

use App\MsgError;

require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php'; 
require_once __DIR__ .'/functions/redirect.php';

$pseudo = $_POST['pseudo'];
$pass = $_POST['mdp'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");

$results = $stmt->execute([
    'pseudo' => $pseudo,
]);

$user = $stmt->fetch();

if ($user && password_verify($pass, $user['mdp'])) {

    $session->setLogIn($user['id']);
    redirect('index.php');
    exit();

} else {

    redirect('login.php?error=' . MsgError::PASS_PSEUDO_INVALID);
    exit();
    
}
