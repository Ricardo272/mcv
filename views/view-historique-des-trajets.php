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
    <title>Historique des trajets</title>
</head>

<body class="historique">

    <div class="imgBackground">
        <img src="../assets/image/background/background-leaves.jpg" alt="background">
    </div>

    <div class="navbar">

        <a href="../controllers/controller-home.php">
            <i class="bi bi-house-fill"></i> Home
        </a>

        <a href="../controllers/controller-profil.php">
            <i class="bi bi-person-circle"></i> Profil
        </a>

        <a href="../controllers/controller-signout.php">
            <i class="bi bi-door-closed-fill"></i> Déconnexion
        </a>
    </div>

    <div class="sidebar">
        <h2><i class="bi bi-house-fill"></i> Ajoutez un trajet</h2>

        <h2>
            <?= $dateDuJour; ?>
        </h2>
    </div>

    <a href='../controllers/controller-home.php'><button>Home</button></a>
    <div class="historiqueComplet">


        <?php
        // Appel de la fonction historiqueTrajet pour récupérer l'historique des trajets
        $historiqueTrajets = Trajet::historiqueTrajet($_SESSION["user"]["ID_utilisateur"]);


        // Vérifier si des trajets ont été trouvés
        if (!empty($historiqueTrajets)) {
            foreach ($historiqueTrajets as $trajet) {
                ?>
                <div class="imgEtInfoTrajet">
                    <?php



                    echo "<p class='date'>" . "<h2>Date</h2> " . $trajet['Date_du_trajet'] . "</p>";
                    echo "<p class='duree'>" . " <h2>Durée</h2> " . $trajet['Duree_du_trajet'] . "</p>";
                    echo "<p class='distance'>" . " <h2>Distance</h2> " . $trajet['Distance_parcourue'] . "</p>";
                    echo "<img class='imgTrajetDefaut' src='../assets/image/imageParDefaut/{$trajet["Image_trajet"]}' alt='Image de trajet par defaut'>";

                    // Ajoutez un formulaire avec un bouton de suppression et l'ID du trajet comme champ caché
                    echo '<form method="post" action="controller-supprimer-trajet.php">';
                    echo '<input type="hidden" name="idTrajet" value="' . $trajet['ID_trajet'] . '">';
                    echo '<button type="submit" onClick="confirm(`Toutes suppression est definitive,Veuillez confirmer`)"
                    name="btnSupprimerTrajet" value="delete">Supprimer</button>';
                    echo '</form>';
                    ?>

                </div>

                <?php

                echo "<hr>";
            }
        } else {
            // Aucun trajet trouvé
            echo "Aucun trajet dans l'historique.";
        }
        ?>

    </div>


    <div class="blockPDP">

        <img src="../assets/image/image-upload/<?php echo $_SESSION["user"]["Photo_de_profil"] == "img-profil-defaut.png" ? "img-profil-defaut.png" : $_SESSION["user"]["ID_utilisateur"] . "_profile_photo.jpg"; ?>"
            alt="Photo de profil par defaut">

    </div>

</body>

</html>