<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Home</title>
</head>

<body class="home">


    <!-- Affichage du message de succès -->
    <?php

    if (isset($_SESSION['message'])) {
        echo '<div class="success-message">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>

    <h2> HOME </h2>

    <h3>Aujourd'hui, nous sommes le
        <?= $dateDuJour; ?>
    </h3>
    <div class="msgBienvenue">
        <p>Bienvenue,
            <?= $_SESSION["user"]["Pseudo"]; ?>
        </p>
        <img src="../assets/image/image-upload/<?php echo $_SESSION["user"]["ID_utilisateur"] . "_profile_photo.jpg"; ?>"
            alt="Photo de profil par defaut">
        <a href="../controllers/controller-profil.php"><button>Profil</button></a>
        <a href="../controllers/controller-trajet.php"><button>Ajouter un trajet</button></a>
        <a href="../controllers/controller-historique-des-trajets.php"><button>Historique des trajets</button></a>
        <a href="../controllers/controller-signout.php"><button>Déconnexion</button></a>
    </div>







</body>

</html>