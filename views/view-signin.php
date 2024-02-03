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
    <title>Sign In</title>
</head>

<body class="signin">
    <div class="imgBackground">
        <img src="../assets/image/background/background-bush-heart.jpg" alt="background">
    </div>
    <h2>Connexion</h2>
    <form class="formulaireConnexion" action="controller-signin.php" method="POST" novalidate>

        <label for="pseudo">Identifiant :</label>
        <input type="text" id="pseudo" name="pseudo"
            value="<?= isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['pseudo'])) {
                echo $errors['pseudo'];
            } ?>
        </span>
        <hr>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"
            value="<?= isset($_POST['passsword']) ? htmlspecialchars($_POST['password']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['password'])) {
                echo $errors['password'];
            } ?>
        </span>
        <hr>
        <input name="connexion" id="connexion" type="submit" value="Connexion">

        <a class="linkVersSignup" href="../controllers/controller-signup.php">
            Toujours pas de compte ?
            <br>
            Inscrivez vous dès maintenant !!
        </a>


    </form>


</body>

</html>