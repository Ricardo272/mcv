<?php
// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";

if (!isset($_SESSION['user'])) {
    header("Location: controlllers/controller-signin.php");
    exit();
}
// Verifier si le formulaire est soumis 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Vèrifier et traiter la nouvelle bio
    if (!empty($_POST["nouvelleBio"])) {
        $nouvelleBio = $_POST["nouvelleBio"];
        $id_utilisateur_bio = $_POST["id_utilisateur_bio"];
        Utilisateur::ModifierBio($nouvelleBio, $id_utilisateur_bio);
        $_SESSION["user"]["Description"] = $nouvelleBio;
        // Redirigez l'utilisateur vers la page de profil après la mise à jour
        header("Location: ../controllers/controller-profil.php");
        exit();
    } else {
        header("Location: ../controllers/controller-profil.php");
        exit();
    }
}
include("../views/view-profil.php");