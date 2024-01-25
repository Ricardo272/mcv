<?php
// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";

if (!isset($_SESSION['user'])) {
    header("Location: controller-signin.php");
    exit();
}

$uploadDoss = "../assets/image/image-upload/";

// Si le dossier de destination existe
if (!is_dir($uploadDoss)) {
    mkdir($uploadDoss, 0777, true);
}

$new_photo_name = $_SESSION['user']['ID_utilisateur'] . "_profile_photo.jpg";
$new_photo_path = $uploadDoss . $new_photo_name;

// Déplacez le fichier téléchargé vers le dossier de destination
if (move_uploaded_file($_FILES["new_profile_photo"]["tmp_name"], $new_photo_path)) {
    $_SESSION['user']['Photo_de_profil'] = $new_photo_name;
    // Redirigez l'utilisateur vers la page de profil après la mise à jour
    header("Location: ../controllers/controller-profil.php");
    exit();
} else {
    // Gestion des erreurs, si le téléchargement échoue
    echo "Erreur lors du téléchargement de la photo de profil.";
}
