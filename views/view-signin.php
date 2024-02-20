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
    <link rel="stylesheet" href="../assets/style/mediaQuery.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Sign In</title>
</head>

<body class="signin">
    <div class="imgBackground">
        <img src="../assets/image/background/background-bush-heart.jpg" alt="background">
    </div>
    <h2>Connexion</h2>
    <form class="formulaireConnexion" action="controller-signin.php" method="POST" novalidate>


        <h3>
            <?=
                $errors["ban"] ?? "";
            ?>
        </h3>
        <label for="pseudo">Identifiant </label>
        <input type="text" id="pseudo" name="pseudo"
            value="<?= isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['pseudo'])) {
                echo $errors['pseudo'];
            } ?>
        </span>
        <hr>
        <label for="password">Mot de passe </label>
        <input type="password" id="password" name="password"
            value="<?= isset($_POST['passsword']) ? htmlspecialchars($_POST['password']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['password'])) {
                echo $errors['password'];
            } ?>
        </span>
        <hr>
        <div class="g-recaptcha" data-sitekey="6LcGAHEpAAAAALFq-6PWdnsym_kVi29xKhLe_9HA"></div>
        <?php
        if (isset($errors["captcha"])) {
            ?>
            <span class="error">
                <?= $errors["captcha"]; ?>
            </span>
            <?php
        }
        ?>

        <hr>
        <input name="connexion" id="connexion" type="submit" value="Connexion">

        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>

        <a class="linkVersSignup" href="../controllers/controller-signup.php">
            Toujours pas de compte ?
            <br>
            Inscrivez vous dès maintenant !!
        </a>


    </form>


</body>

</html>