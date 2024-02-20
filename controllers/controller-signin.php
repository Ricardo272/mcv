<?php

// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Récupération des données du formulaire
    $pseudo = $_POST['pseudo'];
    $mdpUtilisateur = $_POST['password'];


    if (isset($_POST["connexion"])) {
        $recaptcha_secret = CAPTCHA;
        $captcha_response = $_POST["g-recaptcha-response"];
        $responseData = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$captcha_response");

        $dataRow = json_decode($responseData, true);

        if (!$dataRow["success"] == true) {
            $errors["captcha"] = "reCaptcha obligatoire";
        }
    }


    // Continuer avec la vérification du mot de passe si aucune erreur avec le pseudo
    if (empty($errors)) {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            // Définir le mode d'erreur sur exception
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Utilisation de requêtes préparées pour éviter les injections SQL
            $sqlMdpUtilisateur = "SELECT * FROM utilisateur WHERE Pseudo = ?";
            $query = $db->prepare($sqlMdpUtilisateur);

            // Liaison des paramètres et exécution de la requête
            $query->bindParam(1, $pseudo, PDO::PARAM_STR);
            $query->execute();

            // Récupération du résultat de la requête
            $resultat = $query->fetch(PDO::FETCH_ASSOC);


            if ($resultat["Utilisateur_valide"] == 1) {

                // Vérification du mot de passe à l'aide de password_verify
                if ($resultat) {
                    // Récupération du mot de passe haché depuis la base de données
                    $mot_de_passe_bdd = $resultat['Mot_de_passe_utilisateur'];

                    // Vérification du mot de passe à l'aide de password_verify
                    if (password_verify($mdpUtilisateur, $mot_de_passe_bdd)) {

                        $_SESSION["user"] = $resultat;
                        unset($_SESSION["user"]["Mot_de_passe_utilisateur"]);

                        // Rediriger vers la page d'accueil
                        header("Location: ../controllers/controller-home.php");
                        exit();

                    } else {
                        // Mot de passe incorrect
                        if (empty($_POST["password"])) {
                            $errors['password'] = "Champs obligatoire.";

                        } else if ($_POST["password"]) {
                            $errors['password'] = "Mot de passe incorrect.";
                        }

                    }
                } else {
                    // Aucun utilisateur trouvé avec ce pseudo
                    if (empty($_POST["pseudo"])) {
                        $errors['pseudo'] = "Champs obligatoire.";

                    } else if ($_POST["pseudo"]) {
                        $errors['pseudo'] = "Le nom est invalide.";
                    }
                }
            } else {
                $errors["ban"] = "votre compte a été banni";
            }




            // Fermeture de la requête préparée
            $query->closeCursor();

        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            $errors[] = "Erreur de connexion à la base de données : " . $e->getMessage();

        } finally {
            // Fermeture de la connexion à la base de données
            $db = null;
        }
    }


}

include_once('../views/view-signin.php');
