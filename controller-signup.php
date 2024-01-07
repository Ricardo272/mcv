<?php
// Vérification des données postées depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Vérification du nom
    if (empty($_POST["nom"]) || !preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["nom"])) {
        $errors['nom'] = "Le nom est invalide.";
    }

    // Vérification du prénom
    if (empty($_POST["prenom"]) || !preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["prenom"])) {
        $errors['prenom'] = "Le prénom est invalide.";
    }

    // Vérification de l'email
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
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

    // Affichage des erreurs
    // Si aucune erreur détectée
    if (empty($errors)) {
        // Afficher la synthèse des informations et le message de confirmation
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];

        // Cacher le formulaire
        $formHidden = true;

        // Envoyer le mail de confirmation (simulation ici)
        $message = "Bonjour $prenom $nom, votre inscription a bien été enregistrée.";
        // Envoi du mail (à remplacer par votre code d'envoi de mail)
        // mail($email, 'Confirmation d\'inscription', $message);

        // Afficher la synthèse des informations et le message de confirmation
        include('view-summary.php');
        exit; // Arrêter l'exécution du script
    }
}
?>
<?php
// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('view-signup.php');
?>