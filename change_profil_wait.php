<?php
session_start();
require_once __DIR__ . '/bdd/pdo.php';

$img = $_FILES['img'];
$img_name = 'img/'.$img['name'];
$tmp_name = $img['tmp_name'];
$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$userId = $_SESSION['connected'];

if (!empty($img)) {

    $img_upload_path = 'img/' . $img['name'];
    move_uploaded_file($tmp_name,$img_upload_path);
    $statement = $pdo->prepare(
        "UPDATE users
        SET img = :img
        WHERE users.id = '$userId'"
        );

    $results3 = $statement->execute([
        'img' => $img_name
    ]);
   
    header('location:profil.php');
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
    header('location:profil.php');
} else {
    header('location:profil.php');
}

if (!empty($mail)) {
    $stmt2 = $pdo->prepare(
        "UPDATE users
        SET mail = :mail
        WHERE users.id = '$userId'"
    );

    $results2 = $stmt2->execute([
        'mail' => $mail
    ]);
    header('location:profil.php');
} else {
    header('location:profil.php');
}
