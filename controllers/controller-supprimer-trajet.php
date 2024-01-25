<?php
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";
require_once "../models/Trajet.php";

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnSupprimerTrajet"])) {
    // Récupérez l'ID du trajet à supprimer
    $idTrajet = $_POST["idTrajet"];

    // Utilisez la classe Trajet pour supprimer le trajet
    $result = Trajet::supprimerTrajet($idTrajet);

    if ($result) {
        // Reussite = redirection vers controller-historique-des-trajets
        header("Location: controller-historique-des-trajets.php");

        echo "Le trajet a été supprimé avec succès.";

        exit();

    } else {
        // En cas d'echec, redirection vers controller-historique-des-trajets

        header("Location: controller-historique-des-trajets.php");

        echo "Erreur lors de la suppression du trajet.";

        exit();

    }
}





