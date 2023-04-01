<?php

use App\MsgError;
use App\User;

require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php'; 
require_once __DIR__.'/functions/functions.php';

$user = new User($_POST['pseudo'],$_POST['mdp']);
$pseudo = $user->getPseudo();
$pass = $user->getPass() ;

$stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
$results = $stmt->execute([
    'pseudo' => $pseudo,
]);

$userFound = $stmt->fetch();

if ($userFound && password_verify($pass, $userFound['mdp'])) {

    $session->setLogIn($userFound['id']);
    redirect('index.php');
    exit();

} else {

    redirect('login.php?error=' . MsgError::PASS_PSEUDO_INVALID);
    exit();
    
}
