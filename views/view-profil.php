<?php

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";


// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enregistrer"])) {
    // Récupérer les données du formulaire
    $nouveauNom = $_POST["nouveauNom"];
    $id_utilisateur = $_POST["id_utilisateur"];

    // Appeler la méthode pour modifier le nom de l'utilisateur
    Utilisateur::ModifierNom($nouveauNom, $id_utilisateur);

    $_SESSION["user"]["Nom"] = $nouveauNom;

}
if (!isset($_SESSION['user'])) {
    header("Location: controller-signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Profil</title>
</head>

<body class="profil">

    <div class="imgBackground">
        <img src="../assets/image/background/background-forest.jpg" alt="background">
    </div>

    <div class="navbar">

        <a href='../controllers/controller-home.php'>
            <i class="bi bi-house-fill"></i> Home
        </a>

        <a href="../controllers/controller-historique-des-trajets.php">
            <i class="bi bi-clock-history"></i> Historique des trajets
        </a>

        <a href="../controllers/controller-signout.php">
            <i class="bi bi-door-closed-fill"></i> Déconnexion
        </a>
    </div>

    <div class="sidebar">

        <h2><i class="bi bi-person-circle"></i> Profil</h2>

        <h2>
            <?= $dateDuJour; ?>
        </h2>
    </div>

    <div class="informationPerso">
        <h2>Vos informations</h2>
        <div class="allLabel">
            <table class="infos">
                <tr>
                    <td class="labelNom">
                        <label for="nom">
                            Nom :
                            <?= $_SESSION["user"]["Nom"]; ?>
                        </label>
                    </td>

                    <td>
                        <button class="modifNom" onclick="afficherFormulaire()">Modifier</button>

                        <form id="formulaireModification" style="display:none;" method="POST"
                            action="<?php $_SERVER; ?>">
                            <label for="nouveauNom">Nouveau Nom:</label>
                            <input type="text" name="nouveauNom" required>
                            <input type="hidden" name="id_utilisateur"
                                value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">
                            <button type="submit" name="enregistrer">Enregistrer</button>
                        </form>
                    </td>
                </tr>

                <tr>
                    <td class="labelPrenom">
                        <label for="prenom">
                            Prénom :
                            <?= $_SESSION["user"]["Prenom"]; ?>
                        </label>
                    </td>
                    <td>
                        <button type="submit" class="modifPrenom">Modifier</button>
                    </td>
                </tr>

                <tr>
                    <td class="labelDob">
                        <label for="dob">
                            Date de naissance :
                            <?= $_SESSION["user"]["Date_de_naissance"]; ?>
                        </label>
                    </td>
                    <td>
                        <button type="submit" class="modifDob">Modifier</button>
                    </td>

                </tr>

                <tr>
                    <td class="labelEmail">
                        <label for="email">
                            Email :
                            <?= $_SESSION["user"]["Email"]; ?>
                        </label>
                    </td>
                    <td>
                        <button type="submit" class="modifEmail">Modifier</button>
                    </td>
                </tr>

            </table>

            <div class="labelDescription">
                <label for="description">
                    Description :
                </label>
                <?= $_SESSION["user"]["Description"]; ?>
                <input type="text" id="description" name="descrition" value="Décrivez vous en quelques mots.. ">
                <button type="submit" class="modifDescription">Modifier</button>
            </div>
        </div>

    </div>

    <div class="blockPDP">
        <img src="../assets/image/image-upload/<?php echo $_SESSION["user"]["Photo_de_profil"] == "img-profil-defaut.png" ? "img-profil-defaut.png" : $_SESSION["user"]["ID_utilisateur"] . "_profile_photo.jpg"; ?>"
            alt="Photo de profil par defaut">

        <!-- Formulaire pour modifier la photo de profil -->
        <form action="controller-modif-photo.php" method="POST" enctype="multipart/form-data">
            <label for="modifPhoto"></label>
            <input type="file" id="modifPhoto" name="new_profile_photo" accept="image/*">
            <button type="submit" name="modifPDP">Modifier la photo de profil</button>
        </form>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>