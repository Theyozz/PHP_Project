<?php

use App\MsgError;
use App\Session;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__.'/functions/functions.php';
$session = new Session;
$session->notLogIn();

$userId = $_SESSION['connected'];
$img = $_FILES['img'];
$tmp_name = $img['tmp_name'];
$img_upload_path = './img/' . $img['name'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];

if (!empty($img['name'])) {

    move_uploaded_file($tmp_name, $img_upload_path);
    $statement = $pdo->prepare(
        "UPDATE users
        SET img = :img
        WHERE users.id = '$userId'"
    );

    $image = $statement->execute([
        'img' => $img_upload_path
    ]);
    redirect('profil.php');
}

try {
    if (!empty($pseudo)) {
        $stmt = $pdo->prepare(
            "UPDATE users
            SET pseudo = :pseudo
            WHERE users.id = '$userId'"
        );

        $results = $stmt->execute([
            'pseudo' => $pseudo
        ]);
        redirect('profil.php');
    }
} catch (Exception $e) {
    redirect('profil.php?error=' . MsgError::DUPLICATE_PSEUDO);
}

try {
    if (!empty($mail)) {
        $stmt2 = $pdo->prepare(
            "UPDATE users
            SET mail = :mail
            WHERE users.id = '$userId'"
        );

        $mail = $stmt2->execute([
            'mail' => $mail
        ]);
        redirect('profil.php');
    }
} catch (Exception $e) {
    redirect('profil.php?error=' . MsgError::DUPLICATE_EMAIL);
}
