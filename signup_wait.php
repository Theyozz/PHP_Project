<?php

use App\MsgError;
use App\MsgValidate;
use App\User;

require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__.'/functions/functions.php';

$user = new User(
    $_POST['pseudo'], 
    $_POST['mdp'],
    $_POST['mail'],
    $_POST['confirmmdp']
);

$pseudo = $user->getPseudo();
$pass = $user->getPass();
$confirmPass = $user->getConfirmPass();
$mail = $user->getMail();
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

if ($pass !== $confirmPass) {
    redirect('login.php?error='. MsgError::PASS_DOESNT_MATCH);
}else {
    if (!empty($pseudo || $pass || $mail)) {
        $stmt = $pdo->prepare(
            "INSERT INTO users (pseudo,mail ,mdp)
            VALUES (:pseudo, :mail, :pass)"
        );
    
        try {
            $results = $stmt->execute([
                'pseudo' => $pseudo,
                'mail' => $mail,
                'pass' => $hashed_password
            ]);
        
            redirect('login.php?validate='. MsgValidate::CREATE_USER);
            exit();
        } catch (Exception $e) {
            redirect('login.php?error='. MsgError::ACCOUNT_CREATION_IMPOSSIBLE);
            exit();
        }
    }
}
