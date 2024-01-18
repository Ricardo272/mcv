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
    <div class="sideBar">
        <img src="../assets/image/imageParDefaut/<?= $_SESSION["user"]["Photo_de_profil"]; ?> "
            alt="Photo de profil par defaut">
    </div>

    <div class="page">
        <h2>PAGE HOME </h2>
        <p>Aujourd'hui, nous sommes le
            <?= $dateDuJour; ?>
        </p>

        <p>Bienvenue,
            <?= $_SESSION["user"]["Pseudo"]; ?>


        </p>
    </div>

</body>

</html>