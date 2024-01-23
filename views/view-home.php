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

<body>

    <div class="page">
        <!-- Affichage du message de succès -->
        <?php

        if (isset($_SESSION['message'])) {
            echo '<div class="success-message">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
        ?>

        <h2>PAGE HOME </h2>
        <p>Aujourd'hui, nous sommes le
            <?= $dateDuJour; ?>
        </p>

        <p>Bienvenue,
            <?= $_SESSION["user"]["Pseudo"]; ?>
            <img src="../assets/image/imageParDefaut/<?= $_SESSION["user"]["Photo_de_profil"]; ?> "
                alt="Photo de profil par defaut">
        </p>

        <a href="../controllers/controller-trajet.php"><button>Ajouter un trajet</button></a>
        <a href="../controllers/controller-historique-des-trajets.php"><button>Historique des trajets</button></a>


    </div>

</body>

</html>