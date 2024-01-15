<?php

require_once "../config.php";

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
        try {
            $dbName = "jeu de donnees";
            $dbUser = "Rickson";
            $dbPassword = "Ricardo27";
            // Creation d'un objet $db selon la class PDO
            // Connexion a la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            var_dump($db);

            // Stockage de ma requete dans une variable 
            $sql = "INSERT INTO `utilisateur`( `Pseudo`, `Nom`, `Prenom`, `Date_de_naissance`, `Email`, `Mot_de_passe_utilisateur`,`Utilisateur_valide`, `ID_entreprise`) VALUES (:Pseudo, :Nom, :Prenom, :Date_de_naissance, :Email, :Mot_de_passe_utilisateur, :Utilisateur_valide, :ID_Entreprise )";

            // Je prepare ma requete pour eviter les injection SQL 

            $query = $db->prepare($sql);
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $dob = $_POST["dob"];
            $email = $_POST["email"];
            $mdpUtilisateur = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $idEntreprise = $_POST["company"];


            $query->bindValue(":Pseudo", $pseudo, PDO::PARAM_STR);
            $query->bindValue(":Nom", $nom, PDO::PARAM_STR);
            $query->bindValue(":Prenom", $prenom, PDO::PARAM_STR);
            $query->bindValue(":Date_de_naissance", $dob, PDO::PARAM_STR);
            $query->bindValue(":Email", $email, PDO::PARAM_STR);
            $query->bindValue(":Mot_de_passe_utilisateur", $mdpUtilisateur, PDO::PARAM_STR);
            $query->bindValue(":Utilisateur_valide", 1, PDO::PARAM_STR);
            $query->bindValue(":ID_Entreprise", $idEntreprise, PDO::PARAM_STR);

            $query = $query->execute();

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();

        }
    }
}
?>
<?php
include_once('../views/view-signup.php');
?>