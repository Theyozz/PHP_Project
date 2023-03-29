<?php
$title = "List of users";
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/functions/functions.php';
$session->notLogIn();

$stmt = $pdo->prepare("SELECT * FROM users ORDER BY users.id ASC");
$results = $stmt->execute();
?>

<section class="container">
    <?php foreach ($stmt as $user) { ?>
        <a class="text-decoration-none text-dark" href="user.php?id=<?php echo $user['id'] ?>">
            <div class="bg-light mb-5 p-2 rounded-3">
                <div class="d-flex gap-3">
                    <img width="65px" height="65px" class="rounded-circle" src="<?php echo $user['img'] ?>">
                    <div>

                        <p><?php echo $user['pseudo'] ?></p>

                        <p class="fw-light"><?php echo $user['mail'] ?></p>
                    </div>
                </div>
            </div>
        </a>
    <?php } ?>
</section>