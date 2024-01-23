<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Historique des trajets</title>
</head>

<body>
    <div></div>
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


                    echo "<p class=`date`>" . "Date : " . $trajet['Date_du_trajet'] . "</p>" . "<br>";
                    echo "<p class=`duree`>" . "Durée : " . $trajet['Duree_du_trajet'] . "</p>" . "<br>";
                    echo "<p class=`distance`>" . "Distance : " . $trajet['Distance_parcourue'] . "</p>" . "<br>";
                    echo "" ?>
                    <img class=`imgTrajetDefaut` src="../assets/image/imageParDefaut/<?= $trajet["Image_trajet"]; ?> "
                        alt="Image de trajet par defaut"><br>
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



</body>

</html>