<?php 
$title = "Log in";
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<body class="d-flex align-items-center bg-light">
    <div class="col d-flex align-items-center justify-content-center gap-5">
        <div class="me-5">
            <h1 class="text-primary display-3 fw-semibold">Twouitteur</h1>
            <p>Connect with your friend and post your life</p>
        </div>
        <div class="bg-white p-4 col-3 rounded-4 shadow">
            <form action="login_wait.php" class="text-center mt-5 " method="post">
                <div class="mt-3 ">
                    <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
                </div>
                <div class="mt-3 ">
                    <input type="password" class="form-control" name="mdp" placeholder="Password" required>
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-primary w-50" value="Log in">
                </div>
            </form>
            <hr style="width: 320px; color:grey;">
            <div class="text-center mt-3">
                <input type="submit" class="btn btn-success w-50" value="Create account" data-bs-target="#exampleModal">
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="signup_wait.php" class="text-center col-12 d-flex flex-column justify-content-center align-items-center mt-5" method="post">
    <div class="m-3 col-4">
        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
    </div>
    <div class="m-3 col-4">
        <input type="email" class="form-control" name="mail" placeholder="Email" required>
    </div>
    <div class="m-3 col-4">
        <input type="password" class="form-control" name="mdp" placeholder="Password" required>
    </div>
    <div class="m-3 col-4">
        <input type="submit" class="btn btn-primary" value="Valider">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Sign Up</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
</body>

<?php 
require_once __DIR__.'/layout/footer.php';
?>