<?php

// Config
require_once "../config.php";

// Models
require_once "../models/Utilisateur.php";

$showform = true;

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
    $showform = false;
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
    <link rel="stylesheet" href="../assets/style/mediaQuery.css">

    <title>Profil</title>
</head>

<body class="profil">

    <div class="imgBackground">
        <img src="../assets/image/background/background-forest.jpg" alt="background">
    </div>

    <?php
    include '../templates/navBar/profil.php'
        ?>

    <div class="sidebar">

        <h2><i class="bi bi-person-circle"></i> Profil</h2>

        <h2>
            <?= $dateDuJour; ?>
        </h2>
    </div>



    <div class="informationPerso">

        <h2>Vos informations</h2>

        <div class="block">

            <div class="infoActuel">

                <label class="nom" for="nom">

                    <h3>Nom</h3>
                    <p>
                        <?= $_SESSION["user"]["Nom"]; ?>
                    </p>
                </label>

                <label class="prenom" for="prenom">

                    <h3>Prénom</h3>
                    <p>
                        <?= $_SESSION["user"]["Prenom"]; ?>
                    </p>
                </label>

                <label class="dob" for="dob">

                    <h3>Date de <br>
                        naissance</h3>
                    <p>
                        <?= $_SESSION["user"]["Date_de_naissance"]; ?>
                    </p>
                </label>

                <label class="email" for="email">

                    <h3>Email</h3>
                    <p>
                        <?= $_SESSION["user"]["Email"]; ?>
                    </p>
                </label>

            </div>


            <form class="profileForm" method="POST" action="../controllers/controller-profil.php">

                <div class="nouveau">

                    <label for="nouveau">Nouveau nom </label>

                    <input type="text" id="nouveauNom" name="nouveauNom">

                    <input type="hidden" name="id_utilisateur_nom"
                        value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

                </div>


                <div class="nouveau">

                    <label for="nouveauPrenom">Nouveau prénom </label>

                    <input type="text" name="nouveauPrenom">

                    <input type="hidden" name="id_utilisateur_prenom"
                        value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

                </div>

                <div class="nouveau">

                    <label for="nouveauDob">Nouvelle date de naissance </label>

                    <input type="date" name="nouveauDob">

                    <input type="hidden" name="id_utilisateur_dob"
                        value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

                </div>



                <div class="nouveau">

                    <label for="nouvelEmail">Nouvel Email </label>

                    <input type="email" name="nouvelEmail">

                    <input type="hidden" name="id_utilisateur_email"
                        value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">

                </div>



                <input type="submit" class="modifInfo" id="modifInfo" value="Enregistrer les informations">
            </form>

        </div>



        <div class="labelDescription">

            <label class="description" for="description">

                <h2>A propos de vous..</h2>

                <p>
                    <?= $_SESSION["user"]["Description"]; ?>
                </p>

            </label>

            <form class="formBio" action="../controllers/controller-modifier-bio.php" method="POST">


                <label for="nouvelleBio">Nouvelle Bio</label>


                <input type="hidden" name="id_utilisateur_bio"
                    value="<?php echo $_SESSION["user"]['ID_utilisateur']; ?>">


                <input type="text" id="nouvelleBio" class="nouvelleBio" name="nouvelleBio"
                    placeholder="Décrivez vous en quelques mots.. ">

                <input type="submit" value="Modifier" class="modifDescription">

            </form>

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


</body>

</html>