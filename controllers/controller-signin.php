<?php
// Config
require_once "../config.php";
// Models
require_once "../models/Utilisateur.php";
?>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Récupération des données du formulaire
    $pseudo = $_POST['pseudo'];
    $mdpUtilisateur = $_POST['password'];

    try {
        // Création d'un objet $db selon la classe PDO
        $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
        // Définir le mode d'erreur sur exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Utilisation de requêtes préparées pour éviter les injections SQL
        $sqlMdpUtilisateur = "SELECT Mot_de_passe_utilisateur FROM utilisateur WHERE Pseudo = ?";
        $query = $db->prepare($sqlMdpUtilisateur);

        // Liaison des paramètres et exécution de la requête
        $query->bindParam(1, $pseudo, PDO::PARAM_STR);
        $query->execute();

        // Récupération du résultat de la requête
        $resultat = $query->fetch(PDO::FETCH_ASSOC);

        // Vérification si la requête a retourné des résultats
        if ($resultat) {
            // Récupération du mot de passe haché depuis la base de données
            $mot_de_passe_bdd = $resultat['Mot_de_passe_utilisateur'];

            // Vérification du mot de passe à l'aide de password_verify
            if (password_verify($mdpUtilisateur, $mot_de_passe_bdd)) {
                // Mot de passe correct, l'utilisateur est authentifié
                echo "Connexion réussie!";
                // Vous pouvez rediriger l'utilisateur vers une page sécurisée ici
            } else {
                // Mot de passe incorrect
                $errors[] = "Mot de passe incorrect.";
            }
        } else {
            // Aucun utilisateur trouvé avec ce pseudo
            $errors[] = "Pseudo incorrect.";
        }

        // Fermeture de la requête préparée
        $query->closeCursor();

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion
        $errors[] = "Erreur de connexion à la base de données : " . $e->getMessage();
    } finally {
        // Fermeture de la connexion à la base de données
        $db = null;
    }
}
?>
<?php
// Inclusion de la vue
include_once('../views/view-signin.php');
?>