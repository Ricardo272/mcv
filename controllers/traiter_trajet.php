<?php
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $dateTrajet = $_POST["dateTrajet"];
    $distanceParcourue = $_POST["distanceParcourue"];
    $dureeTrajet = $_POST["dureeTrajet"];
    // Vérifier si une image a été téléchargée
    $imageTrajet = isset($_FILES["imageTrajet"]) ? $_FILES["imageTrajet"]["name"] : null;

    // Utilisation d'une session pour stocker le message
    $_SESSION['message'] = "Le trajet a été enregistré avec succès.";

    // Redirection après traitement
    header("Location: ../controllers/controller-home.php");
    exit();
}
