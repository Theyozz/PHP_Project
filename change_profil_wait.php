<?php
session_start();
require_once __DIR__ . '/bdd/pdo.php';
require_once __DIR__ . '/functions/redirect.php';

$img = $_FILES['img'];
$tmp_name = $img['tmp_name'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$userId = $_SESSION['connected'];
$img_upload_path = './img/' . $img['name'];

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
