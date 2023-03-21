<?php
$title = "Profil";
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/bdd/pdo.php';

$userId = $_SESSION['connected'];
$stmt = $pdo->query("SELECT * FROM users WHERE users.id = $userId");
$user = $stmt->fetch();
?>

<div class="w-75 mx-auto d-flex align-items-end gap-4 justify-content-around mt-5 mb-5 p-4 border-bottom">
    <div class="d-flex gap-4 align-items-end text-light">
        <img src="<?php echo $user['img'] ?>" class="rounded-5" width="100px" height="100px">
        <div>
            <h1><?php echo $user['pseudo'] ?></h1>
            <p class="m-0 "><?php echo $user['mail'] ?></p>
        </div>
    </div>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#profilModal">Edit profil
    </button>
    <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="change_profil_wait.php" method="post" class="text-center">
                        <div class="mt-3 ">
                            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                        </div>
                        <div class="mt-3 ">
                            <input type="text" class="form-control" name="mail" placeholder="Mail">
                        </div>
                        <div class="mt-3">
                            <input type="submit" class="btn btn-danger w-50 shadow-sm" value="Change">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <?php 
        $statement = $pdo->query("SELECT * FROM Publication INNER JOIN users ON Publication.user_id = users.id WHERE users.id = '$userId' AND publication.user_id = '$userId' ORDER BY Publication.date_publication DESC ");

        foreach ($statement as $tweet) {
            echo '<div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">'.'<div class="ms-3 d-flex align-items-end gap-2"><img src="'.$tweet['img'] .'" alt="" width="40px" height="40px" class="rounded-4"> '.'</img>'. '<div><p class=" fw-semibold m-0">' .$tweet['pseudo'].'</p><p class="m-0">'.$tweet['mail'].'</p></div></div>'.'<p class="p-4">'.$tweet['content'].'</p>'.'<p class="text-end pe-4">'.$tweet['date_publication'].'</p>'.'</div>';
        }
    ?>
</div>




<?php
require_once __DIR__ . '/layout/footer.php';
?>