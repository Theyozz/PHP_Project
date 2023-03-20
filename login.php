<?php
$title = "Log in";
require_once __DIR__ . '/layout/header.php';
?>


<div class="col d-flex align-items-center justify-content-center gap-5">
  <div class="me-5">
    <h1 class="text-primary display-3 fw-semibold">Twouitteur</h1>
    <p>Connect with your friend and post your life</p>
  </div>
  <div class="bg-white p-4 col-3 rounded-4 shadow">
    <form action="login_wait.php" class="text-center" method="post">
      <div class="mt-3 ">
        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
      </div>
      <div class="mt-3 ">
        <input type="password" class="form-control" name="mdp" placeholder="Password" required>
      </div>
      <div class="mt-3">
        <input type="submit" class="btn btn-primary w-50 shadow-sm" value="Log in">
      </div>
    </form>
    <hr style="width: 320px; color:grey;">
    <div class="text-center mt-3">
      <button type="button" class="btn btn-success w-50 shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Create account
      </button>
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
        <form action="signup_wait.php" class="text-center col-12 d-flex flex-column justify-content-center align-items-center" method="post">
          <div class="m-3 w-75">
            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
          </div>
          <div class="m-3 w-75">
            <input type="email" class="form-control" name="mail" placeholder="Email" required>
          </div>
          <div class="m-3 w-75">
            <input type="password" class="form-control" name="mdp" placeholder="Password" required>
          </div>
          <div class="m-3 col-4">
            <input type="submit" class="btn btn-success" value="Create Account">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__ . '/layout/footer.php';
?>