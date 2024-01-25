<?php
// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";


// Vérifier si le token de session est présent dans la session
if (isset($_SESSION['user'])) {
    $dateDuJour = date('d F Y');





    // Appeler la vue
    include_once('../views/view-profil.php');
} else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../controllers/controller-signin.php");
    exit();
}