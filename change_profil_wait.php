<?php

use App\MsgError;
use App\MsgValidate;
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
    $stmt_pseudo_img = $pdo->prepare(
        "UPDATE users
        SET img = :img
        WHERE users.id = '$userId'"
    );

    $image = $stmt_pseudo_img->execute([
        'img' => $img_upload_path
    ]);
    redirect('profil.php?validate='. MsgValidate::PROFIL_CHANGE);
}

try {
    if (!empty($pseudo)) {
        $stmt_pseudo = $pdo->prepare(
            "UPDATE users
            SET pseudo = :pseudo
            WHERE users.id = '$userId'"
        );

        $results = $stmt_pseudo->execute([
            'pseudo' => $pseudo
        ]);
        redirect('profil.php?validate='. MsgValidate::PROFIL_CHANGE);
    }
} catch (Exception $e) {
    redirect('profil.php?error=' . MsgError::DUPLICATE_PSEUDO);
}

try {
    if (!empty($mail)) {
        $stmt_mail = $pdo->prepare(
            "UPDATE users
            SET mail = :mail
            WHERE users.id = '$userId'"
        );

        $mail = $stmt_mail->execute([
            'mail' => $mail
        ]);
        redirect('profil.php?validate='. MsgValidate::PROFIL_CHANGE);
    }
} catch (Exception $e) {
    redirect('profil.php?error=' . MsgError::DUPLICATE_EMAIL);
}
