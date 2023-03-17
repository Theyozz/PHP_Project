<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter Like</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="index.php">Twouiteur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light fw-light" aria-current="page" href="">Explorer</a>
        </li>
        <?php if (!empty($_SESSION)) {
          ?>  <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="../profil.php">Profil</a>
              </li>
        <?php } ?>
      </ul>
      <div class="text-end">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (!empty($_SESSION)) {
              ?>  
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="../logout.php">Log out</a>
                  </li>
            <?php } else {
            ?>    <li class="nav-item d-flex">
                    <a class="nav-link active text-light" aria-current="page" href="../login.php">Login</a>
                    <span class="text-light d-flex align-items-center">/</span>
                    <a class="nav-link active text-light" aria-current="page" href="../signup.php">Sign up</a>
                  </li>
            <?php } ?>
          </ul>
      </div>
    </div>
  </div>
</nav>