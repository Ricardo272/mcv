<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Profil</title>
</head>

<body class="profil">
    <h2>Profil</h2>
    <a href="../controllers/controller-signout.php"><button>Déconnexion</button></a>
    <a href='../controllers/controller-home.php'><button>Home</button></a>

    <h2>
        <?= $dateDuJour; ?>
    </h2>

    <div class="informationPerso">
        <h3>Vos informations</h3>

        <img src="../assets/image/image-upload/<?php echo $_SESSION["user"]["ID_utilisateur"] . "_profile_photo.jpg"; ?>"
            alt="Photo de profil par defaut">

        <!-- Formulaire pour modifier la photo de profil -->
        <form action="controller-modif-photo.php" method="post" enctype="multipart/form-data">
            <input type="file" name="new_profile_photo" accept="image/*">
            <button type="submit">Modifier la photo de profil</button>
        </form>

        <p>
            Nom :
            <?= $_SESSION["user"]["Nom"]; ?>
        </p>
        <br>
        <hr>
        <p>
            Prenom :
            <?= $_SESSION["user"]["Prenom"]; ?>
        </p>
        <br>
        <hr>
        <p>
            Date de naissance :
            <?= $_SESSION["user"]["Date_de_naissance"]; ?>
        </p>
        <br>
        <hr>
        <p>
            Email :
            <?= $_SESSION["user"]["Email"]; ?>
        </p>
        <br>
        <hr>
        <p>
            Email :
            <?= $_SESSION["user"]["Email"]; ?>
        </p>
    </div>




</body>

</html>