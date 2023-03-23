<?php 
require_once __DIR__ .'/layout/header.php';
require_once __DIR__ . '/bdd/pdo.php';

$userId = $_GET['id'];


if ($userId == $_SESSION['connected']) {
    header('location:profil.php');
}else {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE users.id = $userId");
    $results = $stmt->execute();

    $user = $stmt->fetch();

    ?>

    <div class="w-100 mx-auto d-flex align-items-end gap-4 bg-black bg-opacity-25 justify-content-around mb-5 p-4 ">
        <div class="d-flex gap-4 align-items-end text-light">
            <img src="<?php echo $user['img'] ?>" class="rounded-circle" width="150px" height="150px">
            <div>
                <h1><?php echo $user['pseudo']?></h1>
                <p class="m-0 fw-light"><?php echo $user['mail'] ?></p>
            </div>
        </div>
        <button type="button" class="btn btn-primary fw-light">Follow
        </button>
    </div>


<?php

$statement = $pdo->prepare("SELECT * FROM Publication INNER JOIN users ON Publication.user_id = users.id WHERE users.id = '$userId' AND publication.user_id = '$userId' ORDER BY Publication.date_publication DESC ");
$userTweets = $statement->execute();


foreach ($statement as $tweet) {
    echo '<div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">' . '<div class="ms-3 d-flex align-items-end gap-2"><img src="' . $tweet['img'] . '" alt="" width="45px" height="45px" class="rounded-circle"> ' . '</img>' . '<div><p class=" fw-semibold m-0">' . $tweet['pseudo'] . '</p><p class="m-0">' . $tweet['mail'] . '</p></div></div>' . '<p class="p-4">' . $tweet['content'] . '</p>' . '<div class="d-flex justify-content-between ms-3"><div class="d-flex gap-2"><img src="img/commenter.png" width="20px" height="20px"><img src="img/retweet.png" width="20px" height="20px"></div><p class="text-end pe-4">' . $tweet['date_publication'] . '</p></div>' . '</div>';
}
}
?>

