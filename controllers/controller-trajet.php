<?php
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";
require_once "../models/Trajet.php";

if (isset($_SESSION['user'])) {
    $dateDuJour = date('d F Y');
}
if (!isset($_SESSION['user'])) {

    header("Location: controller-signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    // Récupérer les données du formulaire
    $dateTrajet = $_POST["dateTrajet"];
    $distanceParcourue = $_POST["distanceParcourue"];
    $dureeTrajet = $_POST["dureeTrajet"];
    $idVehicule = $_POST["idVehicule"];
    $idUtilisateur = $_SESSION["user"]["ID_utilisateur"];
    // Vérifier si une image a été téléchargée
    $imageTrajet = isset($_FILES["trajet_de_l_utilisateur"]) ? $_FILES["trajet_de_l_utilisateur"]["name"] : "image.jpg";


    Trajet::ajouterTrajet(
        $dateTrajet,
        $distanceParcourue,
        $dureeTrajet,
        $imageTrajet,
        $idVehicule,
        $idUtilisateur
    );

    // Utilisation d'une session pour stocker le message
    $_SESSION['message'] = "Le trajet a été enregistré avec succès.";

    // Redirection après traitement
    header("Location: ../controllers/controller-historique-des-trajets.php");
    exit();
}

include("../views/view-trajet.php");