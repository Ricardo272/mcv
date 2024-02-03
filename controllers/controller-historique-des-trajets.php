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





include("../views/view-historique-des-trajets.php");