<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Formulaire trajet</title>
</head>

<body>
    <div id="popupForm" class="popup-form">
        <form class="formTrajet" action="../controllers/controller-trajet.php" method="post"
            enctype="multipart/form-data">
            <label for="dateTrajet">Date du trajet:</label>
            <input type="datetime-local" id="dateTrajet" name="dateTrajet" required>

            <label for="distanceParcourue">Distance parcourue (en km):</label>
            <input type="number" step="0.10" id="distanceParcourue" name="distanceParcourue" required>

            <label for="dureeTrajet">Durée du trajet:</label>
            <input type="time" id="dureeTrajet" name="dureeTrajet" required>

            <label for="imageTrajet">Image du trajet (optionnel):</label>
            <input type="file" id="imageTrajet" name="imageTrajet" accept="image/*">

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>

</html>