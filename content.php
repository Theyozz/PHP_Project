<?php 
    require_once __DIR__.'/bdd/pdo.php';

    $tabs = array();
    $stmt = $pdo->query("SELECT * FROM publication INNER JOIN users ON Publication.user_id = users.id " );
    if (!empty($_SESSION)) {
        foreach ($stmt as $key => $value) {  
            $tabs[] = $value;
        }
        $reverse = array_reverse($tabs);
        foreach ($reverse as $post) {
            echo '<div class="m-5" style="border-bottom: 1px solid black;">'. '<p class="ps-4">' .$post['pseudo'].'</p>'.'<p class="p-4">'.$post['content'].'</p>'.'<p class="text-end pe-4">'.$post['date_publication'].'</p>'.'</div>';
        }
    } else {
        require_once __DIR__.'/login.php';
    }

?>