<?php
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php';

$pseudo = $_POST['u_pseudo'];
$mail = $_POST['u_mail'];
$pass = $_POST['u_mdp'];
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

if (!empty($pseudo || $mail || $pass)) {
  $stmt = $pdo->prepare(
  "INSERT INTO users (u_pseudo,u_mail ,u_mdp)
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