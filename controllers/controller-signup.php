<?php
// Config
require_once "../config.php";
// Models
require_once "../models/Utilisateur.php";
require_once "../models/Entreprise.php";

$showform = true;

$regexName = "/^[a-zA-ZÀ-ÿ\-]+$/";
$regexPseudo = "/^[a-zA-ZÀ-ÿ\_\-\d]+$/";
// Vérification des données postées depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Vérification du nom
    if (empty($_POST["nom"])) {
        $errors['nom'] = "Champs obligatoire.";
    } else if (!preg_match($regexName, $_POST["nom"])) {
        $errors['nom'] = "Le nom est invalide.";
    }

    // Vérification du prénom
    if (empty($_POST["prenom"])) {
        $errors['prenom'] = "Champs obligatoire.";
    } else if (!preg_match($regexName, $_POST["prenom"])) {
        $errors['prenom'] = "Le nom est invalide.";
    }

    // Vérification du pseudo
    if (empty($_POST["pseudo"])) {
        $errors['pseudo'] = "Champs obligatoire.";
    } else if (!preg_match($regexPseudo, $_POST["pseudo"])) {
        $errors['pseudo'] = "Le nom est invalide.";
    }

    // Vérification de l'email
    if (empty($_POST["email"])) {
        $errors['email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email est invalide.";
    }

    // Vérification de la date de naissance
    if (empty($_POST["dob"])) {
        $errors['dob'] = "La date de naissance est obligatoire.";
    }

    // Vérification du mot de passe
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    if (empty($password) || strlen($password) < 8 || $password !== $confirm_password) {
        $errors['password'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }

    // Vérification du select
    if (!isset($_POST["company"])) {
        $errors['company'] = "Selectionnez une entreprise";
    }

    // Vérification du CGU
    if (!isset($_POST["cgu"])) {
        $errors['cgu'] = "Veuillez valider les CGU";
    }


    // si il n'y a pas d'erreurs 


    // Affichage des erreurs
    // Si aucune erreur détectée

    if (empty($errors)) {

        $pseudo = $_POST["pseudo"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $mdpUtilisateur = $_POST["password"];
        $validateUser = 1;
        $idEntreprise = $_POST["company"];

        Utilisateur::create(
            $pseudo,
            $nom,
            $prenom,
            $dob,
            $email,
            $mdpUtilisateur,
            $validateUser,
            $idEntreprise
        );

        $showform = false;

    }
}
?>
<?php
include_once('../views/view-signup.php');
?>