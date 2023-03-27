<?php
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/modal/comment_modal.php';
require_once __DIR__ . '/functions/redirect.php';
require_once __DIR__ . '/layout/header.php';

$stmt = $pdo->prepare(
    "SELECT p.*, u.id as user_id, u.img, u.pseudo, u.mail FROM Publication p INNER JOIN users u
    ON p.user_id = u.id 
    ORDER BY p.date_publication DESC"
);
$results = $stmt->execute();

$session->notLogIn();

foreach ($stmt as $tweetInfo) {
?>
    <div class="m-5 rounded-4 pt-4 text-dark bg-light mx-auto shadow" style="border-bottom: 2px solid black;width:60%;border-left:1px solid black;border-right:1px solid black;">
        <div class="ms-3 d-flex align-items-start justify-content-between gap-2">
            <div class="d-flex gap-2">
                <img src="<?php echo $tweetInfo['img'] ?>" alt="" width="45px" height="45px" class="rounded-circle">
                </img>
                <div>
                    <a href="user.php?id=<?php echo $tweetInfo['user_id'] ?>" class="lien fw-semibold m-0 text-black text-decoration-none"><?php echo  $tweetInfo['pseudo'] ?></a>
                    <p class="m-0"><?php echo $tweetInfo['mail'] ?></p>
                </div>
            </div>
            <?php 
                if ($tweetInfo['user_id'] == $_SESSION['connected']) { ?>
                    <a class="text-decoration-none text-black me-4" href="delete_tweet_wait.php?id=<?php echo $tweetInfo['id'] ?>">X</a> 
            <?php } ?>
        </div>
        <p class="p-4"><?php echo $tweetInfo['content']  ?></p>
        <div class="d-flex justify-content-between ms-3">
            <div class="d-flex gap-3 align-items-end mb-3">
                <div>
                    <a class="text-decoration-none p-0" href="post.php?id=<?php echo $tweetInfo['id'] ?>">
                        <img src="img/commenter.png" width="20px" height="20px">
                    </a>
                    <span>
                        <?php
                        $tweetId = $tweetInfo['id'];
                        $statement = $pdo->prepare(
                            "SELECT COUNT(`comment`.`c_content`) NbComments FROM `comment` WHERE `comment`.`publication_id` = $tweetId"
                        );
                        $resultat = $statement->execute();
                        $NbComments = $statement->fetch();
                        echo $NbComments['NbComments'];
                        ?>
                    </span>
                </div>
                <div>
                <?php 
                        $userId = $_SESSION['connected'];
                        $selectRetweet = $pdo->prepare("SELECT * FROM `Share` WHERE user_id = $userId AND publication_id = $tweetId");
                        $resultretweet = $selectRetweet->execute();
                        $retweets = $selectRetweet->fetch();

                        if ($retweets !== false) {
                        ?>  
                            <a class="text-decoration-none p-0" href="retweet.php?id=<?php echo $tweetInfo['id'] ?>">
                                <img src="img/retweetValide.png" width="20px" height="20px">
                            </a>
                        <?php } else { ?>
                            <a class="text-decoration-none p-0" href="retweet.php?id=<?php echo $tweetInfo['id'] ?>">
                                <img src="img/retweet.png" width="20px" height="20px">
                            </a>
                        <?php  } ?>
                    <span>
                            <?php
                            $tweetId = $tweetInfo['id'];
                            $retweet = $pdo->prepare(
                                "SELECT COUNT(`Share`.`publication_id`) NbRetweet FROM `Share` WHERE `Share`.`publication_id` = $tweetId"
                            );
                            $rslt = $retweet->execute();
                            $NbRetweet = $retweet->fetch();
                            echo $NbRetweet['NbRetweet'];
                            ?>
                    </span>
                </div>
                <div>
                    <?php 
                        $statements = $pdo->prepare("SELECT * FROM `Likes` WHERE user_id = $userId AND publication_id = $tweetId");
                        $resultats = $statements->execute();
                        $likes = $statements->fetch();

                        if ($likes !== false) {
                        ?>  
                            <a class="text-decoration-none p-0" href="like.php?id=<?php echo $tweetInfo['id'] ?>">
                                <img src="img/fullHeart.png" width="20px" height="20px">
                            </a>
                        <?php } else { ?>
                            <a class="text-decoration-none p-0" href="like.php?id=<?php echo $tweetInfo['id'] ?>">
                                <img src="img/heart.png" width="20px" height="20px">
                            </a>
                        <?php  } ?>

                    <span>
                            <?php
                            $tweetId = $tweetInfo['id'];
                            $like = $pdo->prepare(
                                "SELECT COUNT(`Likes`.`publication_id`) NbLikes FROM `Likes` WHERE `Likes`.`publication_id` = $tweetId"
                            );
                            $rslt = $like->execute();
                            $NbLikes = $like->fetch();
                            echo $NbLikes['NbLikes'];
                            ?>
                    </span>
                </div>
            </div>
            <p class="text-end pe-4"><?php echo date("d/m/Y H:i",strtotime($tweetInfo['date_publication'])); ?></p>
        </div>
    </div>
<?php  }
