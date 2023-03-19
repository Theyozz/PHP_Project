<?php 
$title = "Sign up";
require_once __DIR__.'/layout/header.php';
?>

<form action="signup_wait.php" class="text-center col-12 d-flex flex-column justify-content-center align-items-center mt-5" method="post">
    <div class="m-3 col-4">
        <input type="text" class="form-control" name="u_pseudo" placeholder="Pseudo" required>
    </div>
    <div class="m-3 col-4">
        <input type="email" class="form-control" name="u_mail" placeholder="Email" required>
    </div>
    <div class="m-3 col-4">
        <input type="password" class="form-control" name="u_mdp" placeholder="Password" required>
    </div>
    <div class="m-3 col-4">
        <input type="submit" class="btn btn-primary" value="Valider">
    </div>
</form>

<?php 
require_once __DIR__.'/layout/footer.php';
?>