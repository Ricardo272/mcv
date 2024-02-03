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
    <title>Formulaire trajet</title>
</head>

<body class="trajet">
    <div class="imgBackground">
        <img src="../assets/image/background/background-blast.jpg" alt="background">
    </div>

    <div class="navbar">

        <a href='../controllers/controller-home.php'>
            <i class="bi bi-house-fill"></i> Home
        </a>

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

    <div class="sidebar">
        <h2><i class="bi bi-house-fill"></i> Ajoutez un trajet</h2>

        <h2>
            <?= $dateDuJour; ?>
        </h2>
    </div>

    <div id="divFormTrajet" class="divFormTrajet">
        <form class="formTrajet" action="../controllers/controller-trajet.php" method="POST"
            enctype="multipart/form-data">

            <div class="date">

                <label for="dateTrajet">Date du trajet</label>
                <input type="datetime-local" id="dateTrajet" name="dateTrajet" required>

            </div>

            <div class="distanceParcourue">

                <label for="distanceParcourue">Distance parcourue (en km)</label>
                <input type="number" step="0.10" id="distanceParcourue" name="distanceParcourue" required>

            </div>

            <div class="duree">

                <label for="dureeTrajet">Durée du trajet</label>
                <input type="time" id="dureeTrajet" name="dureeTrajet" required>

            </div>

            <div class="vehicule">

                <label for="idVehicule">Vehicule</label>

                <select id="idVehicule" name="idVehicule" required>

                    <option value="" disabled selected>Veuillez sélectionner une entreprise</option>

                    <option value="1" <?php if (!empty($idVehicule) && $idVehicule == "Velo") {
                        echo "Velo";
                    } ?>> Vélo
                    </option>

                    <option value="2" <?php if (!empty($idVehicule) && $idVehicule == "Trottinette ") {
                        echo "Trottinette";

                    } ?>>Trottinette</option>
                    <option value="3" <?php if (!empty($idVehicule) && $idVehicule == "Marche") {
                        echo "Marche";

                    } ?>>Marche</option>
                    <option value="4" <?php if (!empty($idVehicule) && $idVehicule == "Rollers ") {
                        echo "Rollers";

                    } ?>>Rollers</option>
                    <option value="5" <?php if (!empty($idVehicule) && $idVehicule == "Skate ") {
                        echo "Skate";

                    } ?>>Skate</option>

                </select>

            </div>
            <span class="error">
                <?php if (isset($errors['idVehicule'])) {
                    echo $errors['idVehicule'];
                } ?>
            </span>

            <div class="imageLabelTrajet">

                <label for="imageTrajet">Image du trajet (optionnel)</label><br>
                <input class="imageTrajet" type="file" id="imageTrajet" name="imageTrajet" accept="image/*">

            </div>

            <button type="submit">Ajouter</button>

        </form>

    </div>

    <div class="blockPDP">

        <img src="../assets/image/image-upload/<?php echo $_SESSION["user"]["Photo_de_profil"] == "img-profil-defaut.png" ? "img-profil-defaut.png" : $_SESSION["user"]["ID_utilisateur"] . "_profile_photo.jpg"; ?>"
            alt="Photo de profil par defaut">

    </div>

</body>

</html>