<?php 
    require_once __DIR__.'/bdd/pdo.php';

    $stmt = $pdo->query("SELECT * FROM publication ");
    foreach ($stmt as $post) {
        echo '<div class="m-5" style="border: 2px solid black;">'. '<p class="p-4">'.$post['content'].'</p>'.'</div>';
}?>