<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <style>
        /* Styles pour le formulaire pop-up */
        .popup-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .success-message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
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

        <!-- Bouton "Ajouter un trajet" -->
        <button onclick="afficherFormulaire()">Ajouter un trajet</button>

        <!-- Formulaire pop-up -->
        <div id="popupForm" class="popup-form">
            <form action="traiter_trajet.php" method="post" enctype="multipart/form-data">
                <label for="dateTrajet">Date du trajet:</label>
                <input type="datetime-local" id="dateTrajet" name="dateTrajet" required>

                <label for="distanceParcourue">Distance parcourue (en km):</label>
                <input type="number" step="0.01" id="distanceParcourue" name="distanceParcourue" required>

                <label for="dureeTrajet">Durée du trajet:</label>
                <input type="time" id="dureeTrajet" name="dureeTrajet" required>

                <label for="imageTrajet">Image du trajet (optionnel):</label>
                <input type="file" id="imageTrajet" name="imageTrajet" accept="image/*">

                <button type="submit">Ajouter</button>
            </form>
            <button onclick="fermerFormulaire()">Fermer</button>
        </div>

    </div>


    <script src="../assets/js/script.js"></script>
</body>

</html>