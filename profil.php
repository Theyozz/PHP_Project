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
        $stmt2 = $pdo->query("SELECT * FROM publication INNER JOIN users ON Publication.user_id = users.id WHERE users.id = '$userId' AND publication.user_id = '$userId' ");

        $userPost = $stmt->fetchAll();
        $tabs = array();
        foreach ($stmt2 as $key => $value) {  
            $tabs[] = $value;
        }
        $reverse = array_reverse($tabs);
        foreach ($reverse as $user) {
            echo '<div class="w-50 mx-auto mt-4 p-3 border-bottom bg-light rounded-4"><div class="d-flex align-items-end"><img width="40px" height="40px" class="rounded-4" src="'.$user['img'].'"><p>'. $user['pseudo'] .'</div></p><p>'.$user['content'].'</p><p class="text-end mt-5">'.$user['date_publication'].'</p></div>';
        }
    ?>
</div>




<?php
require_once __DIR__ . '/layout/footer.php';
?>