<?php 
    require_once __DIR__.'/bdd/pdo.php';

    $tabs = array();
    $stmt = $pdo->query("SELECT * FROM publication ");
    foreach ($stmt as $post) {
        $tabs[] = $post;
}

    $reverse = array_reverse($tabs);

    foreach ($reverse as $key => $value) {
        $posts = $value['content'];
        $date = $value['date_publication'];
        echo '<div class="m-5" style="border: 2px solid black;">'. '<p class="p-4">'.$posts.'</p>'.'<p class="text-end pe-4">'.$date.'</p>'.'</div>';
    }

?>