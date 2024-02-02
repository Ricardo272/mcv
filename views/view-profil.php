<?php

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";



// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier et traiter le nouveau nom
    if (!empty($_POST["nouveauNom"])) {
        $nouveauNom = $_POST["nouveauNom"];
        $id_utilisateur_nom = $_POST["id_utilisateur_nom"];
        Utilisateur::ModifierUtilisateurNom($nouveauNom, $id_utilisateur_nom);
        $_SESSION["user"]["Nom"] = $nouveauNom;
    }

    // Vérifier et traiter le nouveau prénom
    if (!empty($_POST["nouveauPrenom"])) {
        $nouveauPrenom = $_POST["nouveauPrenom"];
        $id_utilisateur_prenom = $_POST["id_utilisateur_prenom"];
        Utilisateur::ModifierUtilisateurPrenom($nouveauPrenom, $id_utilisateur_prenom);
        $_SESSION["user"]["Prenom"] = $nouveauPrenom;
    }

    // Vérifier et traiter la nouvelle date de naissance
    if (!empty($_POST["nouveauDob"])) {
        $nouveauDob = $_POST["nouveauDob"];
        $id_utilisateur_dob = $_POST["id_utilisateur_dob"];
        Utilisateur::ModifierUtilisateurDob($nouveauDob, $id_utilisateur_dob);
        $_SESSION["user"]["Date_de_naissance"] = $nouveauDob;
    }

    // Vérifier et traiter le nouvel email
    if (!empty($_POST["nouvelEmail"])) {
        $nouvelEmail = $_POST["nouvelEmail"];
        $id_utilisateur_email = $_POST["id_utilisateur_email"];
        Utilisateur::ModifierUtilisateurEmail($nouvelEmail, $id_utilisateur_email);
        $_SESSION["user"]["Email"] = $nouvelEmail;
    }
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


        <form class="profileForm" method="POST" action="../controllers/controller-profil.php">

            <label for="nom">
                Nom :
                <?= $_SESSION["user"]["Nom"]; ?>
            </label>
            <label for="nouveauNom">Nouveau nom :</label>
            <input type="text" id="nouveauNom" name="nouveauNom" required>
            <input type="hidden" name="id_utilisateur_nom" value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

            <label for="prenom">
                Prénom :
                <?= $_SESSION["user"]["Prenom"]; ?>
            </label>
            <label for="nouveauPrenom">Nouveau Prénom :</label>
            <input type="text" name="nouveauPrenom" required>
            <input type="hidden" name="id_utilisateur_prenom"
                value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

            <label for="dob">
                Date de naissance :
                <?= $_SESSION["user"]["Date_de_naissance"]; ?>
            </label>
            <label for="nouveauDob">Nouvelle Date de naissance :</label>
            <input type="date" name="nouveauDob" required>
            <input type="hidden" name="id_utilisateur_dob" value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

            <label for="email">
                Email :
                <?= $_SESSION["user"]["Email"]; ?>
            </label>
            <label for="nouvelEmail">Nouvel Email :</label>
            <input type="email" name="nouvelEmail" required>
            <input type="hidden" name="id_utilisateur_email" value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

            <button type="submit" class="modifInfo" id="modifInfo">Enregistrer les informations</button>
        </form>


        <div class="labelDescription">
            <label for="description">
                Description :
            </label>
            <?= $_SESSION["user"]["Description"]; ?>
            <input type="text" id="description" name="descrition" value="Décrivez vous en quelques mots.. ">
            <button type="submit" class="modifDescription">Modifier</button>
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