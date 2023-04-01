<?php
$title = "List of users";
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/functions/functions.php';
$session->notLogIn();

$userConnected = $_SESSION['connected'];
$stmt = $pdo->query("SELECT * FROM users ORDER BY users.pseudo ASC");
$results = $stmt->execute();

$stmtCount = $pdo->query("SELECT COUNT(*) as nbUsers FROM users WHERE users.id <> $userConnected");
$nbUsers = $stmtCount->fetch();
?>

<section class="container">
    <h1 class="text-light mb-5">Users (<?php echo $nbUsers['nbUsers']  ?>)</h1>
    <?php foreach ($stmt as $user) { 
        if ($user['id'] !== $userConnected) { ?>
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
    <?php  } } ?>
</section>