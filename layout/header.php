<?php
// require_once __DIR__.'/../classes/Session.php';

use App\Session;

require_once 'vendor/autoload.php';
$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if (isset($title)) {
      echo  $title .' / ';
    }
    ?> 
    Twouitteur
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" href="../img/logo_PHP_P.webp">
</head>

<body style="min-height: 100vh; padding-top:100px; padding-bottom:100px" class=<?php if (empty($_SESSION)) {
      echo '"d-flex justify-content-center align-items-center bg-light"'; 
      } else {
      echo "bg-dark";
      } ?>>
  <?php 
  if (!empty($_SESSION)) {
    require_once __DIR__ . '/navbar.php';
  } 
  ?>