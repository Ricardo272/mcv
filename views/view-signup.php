<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/js/img/style/style.css">
    <title>Sign up</title>
</head>

<body>

    <?php if ($showform == true) { ?>
        <h2>Inscription</h2>
        <form class="formulaireInscription" action="controller-signup.php" method="POST" novalidate>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom"
                value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['nom'])) {
                    echo $errors['nom'];
                } ?>
            </span>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom"
                value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['prenom'])) {
                    echo $errors['prenom'];
                } ?>
            </span>

            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo"
                value="<?= isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['pseudo'])) {
                    echo $errors['pseudo'];
                } ?>
            </span>

            <label for="company">Entreprise:</label>
            <select id="company" name="company" required>
                <option value="" disabled selected>Veuillez sélectionner une entreprise</option>
                <option value="2" <?php if (!empty($company) && $company == "SportStore") {
                    echo "selected";
                } ?>> SportStore
                </option>
                <option value="1" <?php if (!empty($company) && $company == "Nati-V") {
                    echo "selected";
                } ?>>Nati-V</option>
            </select>
            <span class="error">
                <?php if (isset($errors['company'])) {
                    echo $errors['company'];
                } ?>
            </span>

            <label for="email">Courriel:</label>
            <input type="email" id="email" name="email"
                value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['email'])) {
                    echo $errors['email'];
                } ?>
            </span>

            <label for="dob">Date de naissance:</label>
            <input type="date" id="dob" name="dob"
                value="<?= isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['dob'])) {
                    echo $errors['dob'];
                } ?>
            </span>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password"
                value="<?= isset($_POST['passsword']) ? htmlspecialchars($_POST['password']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['password'])) {
                    echo $errors['password'];
                } ?>
            </span>

            <label for="confirm_password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm_password" name="confirm_password"
                value="<?= isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : '' ?>">
            <span class="error">
                <?php if (isset($errors['confirm_password'])) {
                    echo $errors['confirm_password'];
                } ?>
            </span>


            <label for="cgu"><a href="#">Conditions général d'utilisation</a>
                <input name="cgu" type="checkbox" value="Accepter les CGU ?" required></label>
            <span class="error">
                <?php if (isset($errors['company'])) {
                    echo $errors['company'];
                } ?>
            </span>

            <input name="enregister" id="enregister" type="submit" value="S'enregistrer">


        </form>

    <?php } else { ?>

        <h2 class="felicitationConnexion">Félicitation <br> Veuillez vous connectez
            <br><a href="../controllers/controller-signin.php">Connexion</a>
        </h2>

    <?php } ?>


    <footer>

    </footer>



</body>

</html>