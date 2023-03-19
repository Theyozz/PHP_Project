<?php
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php'; 

$pseudo = $_POST['u_pseudo'];
$pass = $_POST['u_mdp'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE u_pseudo = :pseudo");

$results = $stmt->execute([
    'pseudo' => $pseudo,
]);

$user = $stmt->fetch();
$verify = password_verify($pass, $user['u_mdp']);

if ($user && password_verify($pass, $user['u_mdp'])) {
    $_SESSION['connected']= true;
    header("location:index.php");
    exit();
} else {
    header("location:login.php");
    exit();
}

?>