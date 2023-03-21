<?php 
    require_once __DIR__.'/bdd/pdo.php';

    $tabs = array();
    $stmt = $pdo->query("SELECT * FROM Publication INNER JOIN users ON Publication.user_id = users.id ORDER BY Publication.date_publication DESC" );
    if (!empty($_SESSION)) {
        foreach ($stmt as $user) {
            echo '<div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">'.'<div class="ms-3 d-flex align-items-end gap-2"><img src="'.$user['img'] .'" alt="" width="40px" height="40px" class="rounded-4"> '.'</img>'. '<div><p class=" fw-semibold m-0">' .$user['pseudo'].'</p><p class="m-0">'.$user['mail'].'</p></div></div>'.'<p class="p-4">'.$user['content'].'</p>'.'<p class="text-end pe-4">'.$user['date_publication'].'</p>'.'</div>';
        }
    } else {
        require_once __DIR__.'/login.php';
    }

?>