<?php
require_once __DIR__ . '/layout/header.php';
require_once __DIR__ . '/bdd/pdo.php';

$postId = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM Publication INNER JOIN users ON Publication.user_id = users.id WHERE Publication.id = $postId ");
$results = $stmt->execute();

$post = $stmt->fetch();
?>
<div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto shadow" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">
    <div class="ms-3 d-flex align-items-end gap-2">
        <img src="<?php echo $post['img'] ?>" alt="" width="45px" height="45px" class="rounded-circle">
        </img>
        <div>
            <a href="user.php?id=<?php echo $post['user_id'] ?>" class="lien fw-semibold m-0 text-black text-decoration-none"><?php echo $post['pseudo'] ?></a>
            <p class="m-0"><?php echo $post['mail'] ?></p>
        </div>
    </div>
    <p class="p-4"><?php echo $post['content']  ?></p>
    <div class="d-flex justify-content-between ms-3 border-bottom mb-4">
        <div class="d-flex gap-2 align-items-end mb-3">
            <a class=" p-0" href="">
                <img src="img/commenter.png" width="20px" height="20px">
            </a>
            <img src="img/retweet.png" width="20px" height="20px">
        </div>
        <p class="text-end pe-4"><?php echo $post['date_publication'] ?></p>
    </div>
    <?php
    $statement = $pdo->prepare("SELECT `comment`.`c_content`,`comment`.`creation_date`,`comment`.`user_id`,users.pseudo FROM comment INNER JOIN users ON `comment`.`user_id`=users.id WHERE `comment`.`publication_id` = $postId");
    $result = $statement->execute();
    $comments = $statement->fetchAll();
    foreach ($comments as $comment) {
    ?> 
        <div class="d-flex justify-content-between mx-5 my-5 border-bottom">
            <p><?php echo $comment['c_content'] ;?></p>
            <div class="d-flex gap-1 fw-light fs-6">
                <p><?php echo " by ". $comment['pseudo'] ;?></p>
                <p class="fs-small"><?php echo " at ". $comment['creation_date']."<br />" ?></p>
            </div>
        </div>

    <?php } ?>
    <form class="d-flex flex-column mt-4 mb-4" method="post" action="comment_post_wait.php">
        <textarea name="comment" class="form-control"></textarea>
        <input type="hidden" name="idPublication" value="<?php echo $postId ?>">
        <button class="btn btn-primary w-25 mx-auto mt-1">Respond</button>
    </form>
</div>