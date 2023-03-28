<?php
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/functions/redirect.php';
require_once __DIR__ . '/classes/MsgValidate.php';

$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$pass = $_POST['mdp'];
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

if (!empty($pseudo || $mail || $pass)) {
    $stmt = $pdo->prepare(
        "INSERT INTO users (pseudo,mail ,mdp)
        VALUES (:pseudo, :mail, :pass)"
    );

    $results = $stmt->execute([
        'pseudo' => $pseudo,
        'mail' => $mail,
        'pass' => $hashed_password
    ]);

    redirect('login.php?validate='. MsgValidate::CREATE_USER);
    exit();
} else {
    redirect('login.php');
    exit();
}
