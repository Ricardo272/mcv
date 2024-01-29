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
    <title>Home</title>
</head>

<body class="home">
    <div class="imgBackground">
        <img src="../assets/image/background/background-leaves.jpg" alt="background">
    </div>

    <div class="navbar">

        <a href="../controllers/controller-profil.php">
            <i class="bi bi-person-circle"></i> Profil
        </a>

        <a href="../controllers/controller-historique-des-trajets.php">
            <i class="bi bi-clock-history"></i> Historique des trajets
        </a>

        <a href="../controllers/controller-signout.php">
            <i class="bi bi-door-closed-fill"></i> Déconnexion
        </a>
    </div>



    <!-- Affichage du message de succès -->
    <?php

    if (isset($_SESSION['message'])) {
        echo '<div class="success-message">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>
    <div class="sidebar">
        <h2><i class="bi bi-house-fill"></i> HOME </h2>

        <h2>
            <?= $dateDuJour; ?>
        </h2>
    </div>

    <div class="padHome">

        <h2>
            <i class="bi bi-lightning-charge-fill"></i> Bienvenue
            <?= $_SESSION["user"]["Pseudo"]; ?> <i class="bi bi-lightning-charge-fill"></i>
        </h2>
        <div class="menuHome">

            <a href="../controllers/controller-trajet.php">
                <i class="bi bi-signpost-split-fill"></i>
                Ajouter un trajet
            </a>

            <a href="#">
                <i class="bi bi-signpost-split-fill"></i>
                A suivre..
            </a>
        </div>
        <div class="menuHome">

            <a href="#">
                <i class="bi bi-signpost-split-fill"></i>
                A suivre..
            </a>

            <a href="#">
                <i class="bi bi-signpost-split-fill"></i>
                A suivre..
            </a>
        </div>





    </div>
    <div class="blockPDP">
        <img src="../assets/image/image-upload/<?php echo $_SESSION["user"]["Photo_de_profil"] == "img-profil-defaut.png" ? "img-profil-defaut.png" : $_SESSION["user"]["ID_utilisateur"] . "_profile_photo.jpg"; ?>"
            alt="Photo de profil par defaut">
    </div>






</body>

</html>