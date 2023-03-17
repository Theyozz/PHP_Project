<?php
require_once __DIR__.'/bdd/pdo.php';
require_once __DIR__.'/layout/header.php';
require_once __DIR__.'/login.php';


$pseudo = $_POST['u_pseudo'];
$pass = $_POST['u_mdp'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE u_pseudo = :pseudo AND u_mdp = :pass");

$results = $stmt->execute([
    'pseudo' => $pseudo,
    'pass'=> $pass
]);

$user = $stmt->fetch();

if ($user === false) {
    header("location:login.php");
  }else{
    $_SESSION['connected']= true;
    header("location:index.php");
  }

?>