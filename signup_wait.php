<?php
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php';

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
      'mail'=> $mail,
      'pass'=> $hashed_password
  ]);
    $_SESSION['connected']= true;
    header("location:index.php");
    exit();
} else {
    header('location:signup.php');
    exit();
}

?>