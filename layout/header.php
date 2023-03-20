<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title>" . $title . "</title>" ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo_PHP_P.webp">
</head>
<body class= <?php if (empty($_SESSION)) {
  echo '"d-flex justify-content-center align-items-center bg-light"'?>
<?php } ?>>
  <?php if (!empty($_SESSION)) {
    ?><nav class="navbar navbar-expand-lg bg-dark navbar-fixed-top">
    <div class="container-fluid">
      <a href="../index.php">
        <img src="../img/logo_PHP_P.webp" alt="" width="40px" height="40px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light fw-light ms-4" aria-current="page" href="../index.php">Home</a>
          </li>
           <li class="nav-item">
                  <a class="nav-link active text-light fw-light" aria-current="page" href="../profil.php">Profil</a>
                </li>
                <li class="nav-item">
            <a class="nav-link active text-light fw-light" aria-current="page" href="../settings.php">Settings</a>
          </li>
        </ul>
        <div class="text-end">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active text-light" aria-current="page" href="../logout.php">Log out</a>
                    </li>
            </ul>
        </div>
      </div>
    </div>
  </nav>
 <?php } ?>
