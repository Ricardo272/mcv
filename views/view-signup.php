<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <header>
        <!-- Votre code pour l'en-tête -->
    </header>

    <h2>Inscription</h2>

    <form action="controller-signup.php" method="POST">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom">
        <span class="error">
            <?php if (isset($errors['nom'])) {
                echo $errors['nom'];
            } ?>
        </span><br><br>

        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom">
        <span class="error">
            <?php if (isset($errors['prenom'])) {
                echo $errors['prenom'];
            } ?>
        </span><br><br>

        <label for="email">Courriel:</label><br>
        <input type="email" id="email" name="email">
        <span class="error">
            <?php if (isset($errors['email'])) {
                echo $errors['email'];
            } ?>
        </span><br><br>

        <label for="dob">Date de naissance:</label><br>
        <input type="date" id="dob" name="dob">
        <span class="error">
            <?php if (isset($errors['dob'])) {
                echo $errors['dob'];
            } ?>
        </span><br><br>

        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password">
        <span class="error">
            <?php if (isset($errors['password'])) {
                echo $errors['password'];
            } ?>
        </span><br><br>

        <label for="confirm_password">Confirmer le mot de passe:</label><br>
        <input type="password" id="confirm_password" name="confirm_password">
        <span class="error">
            <?php if (isset($errors['confirm_password'])) {
                echo $errors['confirm_password'];
            } ?>
        </span><br><br>

        <input type="submit" value="S'enregistrer">
    </form>

    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>



</body>

</html>