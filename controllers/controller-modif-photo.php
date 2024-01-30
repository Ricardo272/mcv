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
$new_photo_name = $_SESSION['user']['ID_utilisateur'] . "_profile_photo.jpg";
$uploadDoss = "../assets/image/image-upload/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["new_profile_photo"]["error"] == 0) {
        var_dump($_FILES);
        // Si le dossier de destination existe
        if (!is_dir($uploadDoss)) {
            mkdir($uploadDoss, 0777, true);
        }

        // Déplacez le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($_FILES["new_profile_photo"]["tmp_name"], $uploadDoss . $new_photo_name)) {
            $_SESSION['user']['Photo_de_profil'] = $new_photo_name;
            Utilisateur::ModifierPDP($_SESSION['user']['ID_utilisateur'], $new_photo_name);
            // Redirigez l'utilisateur vers la page de profil après la mise à jour
            header("Location: ../controllers/controller-profil.php");
            exit();
        } else {
            // Gestion des erreurs, si le téléchargement échoue
            echo "Erreur lors du téléchargement de la photo de profil.";
        }
    } else {
        header("Location: ../controllers/controller-profil.php");
        exit();
    }
}