<?php

class Utilisateur
{
    /**
     * Méthode permettant de créer un utilisateur 
     * @param string $pseudo Pseudo de l'utilisateur     
     * @param string $nom Nom de l'utilisateur     
     * @param string $prenom Prenom de l'utilisateur      
     * @param string $dob Date de naissance de l'utilisateur (Date of birth)     
     * @param string $email Adresse mail de l'utilisateur     
     * @param string $mdpUtilisateur Mot de passe de l'utilisateur     
     * @param int $validateUser Validation de l'utilisateur     
     * @param string $idEntreprise ID de l'entreprise  
     * 
     * @return void
     */
    public static function create(
        string $pseudo,
        string $nom,
        string $prenom,
        string $dob,
        string $email,
        string $mdpUtilisateur,
        int $validateUser,
        string $idEntreprise,

    ) {
        try {
            // Creation d'un objet $db selon la class PDO
            // Connexion a la bdd
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);


            // Stockage de ma requete dans une variable 
            $sql = "INSERT INTO `utilisateur`( `Pseudo`, `Nom`, `Prenom`, `Date_de_naissance`, `Email`, `Mot_de_passe_utilisateur`,`Utilisateur_valide`, `ID_entreprise`,`Photo_de_profil`) VALUES (:Pseudo, :Nom, :Prenom, :Date_de_naissance, :Email, :Mot_de_passe_utilisateur, :Utilisateur_valide, :ID_Entreprise, :Photo_de_profil )";

            // Je prepare ma requete pour eviter les injection SQL 

            $query = $db->prepare($sql);


            $query->bindValue(":Pseudo", htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(":Nom", htmlspecialchars($nom), PDO::PARAM_STR);
            $query->bindValue(":Prenom", htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(":Date_de_naissance", $dob, PDO::PARAM_STR);
            $query->bindValue(":Email", htmlspecialchars($email), PDO::PARAM_STR);
            $query->bindValue(":Mot_de_passe_utilisateur", password_hash($mdpUtilisateur, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(":Utilisateur_valide", $validateUser, PDO::PARAM_STR);
            $query->bindValue(":ID_Entreprise", $idEntreprise, PDO::PARAM_STR);
            $query->bindValue(":Photo_de_profil", 'img-profil-defaut.png', PDO::PARAM_STR);

            $query = $query->execute();

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();

        }
    }
    /**
     * Methode permettant de récupérer les informations d'un utilisateur avec son mail comme paramètre
     * 
     * @param string $email Adresse mail de l'utilisateur
     * 
     * @return bool
     */
    public static function checkMailExists
    (
        string $email
    ): bool {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "SELECT * FROM `utilisateur` WHERE `mail_participant` = :mail";
            // stockage de ma requete dans une variable

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':mail', $email, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    public static function ModifierPDP(
        int $id_utilisateur,
        string $photoName
    ) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE Utilisateur SET Photo_de_profil = :photoName WHERE ID_utilisateur = :id_utilisateur";

            $query = $db->prepare($sql);

            $query->bindValue(':photoName', $photoName, PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
    public static function ModifierUtilisateurNom(string $nouveauNom, int $id_utilisateur)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE `utilisateur` SET `Nom`= :Nom WHERE `ID_utilisateur` = :id_utilisateur";
            $query = $db->prepare($sql);

            $query->bindValue(':Nom', htmlspecialchars($nouveauNom), PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function ModifierUtilisateurPrenom(string $nouveauPrenom, int $id_utilisateur)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE `utilisateur` SET `Prenom`= :Prenom WHERE `ID_utilisateur` = :id_utilisateur";
            $query = $db->prepare($sql);

            $query->bindValue(':Prenom', htmlspecialchars($nouveauPrenom), PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function ModifierUtilisateurDob(string $nouveauDob, int $id_utilisateur)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);


            $sql = "UPDATE `utilisateur` SET `Date_de_naissance`= :dob WHERE `ID_utilisateur` = :id_utilisateur";
            $query = $db->prepare($sql);

            $query->bindValue(':dob', $nouveauDob, PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function ModifierUtilisateurEmail(string $nouvelEmail, int $id_utilisateur)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);


            $sql = "UPDATE `utilisateur` SET `Email` = :nouvelEmail WHERE `ID_utilisateur` = :id_utilisateur";

            $query = $db->prepare($sql);

            $query->bindValue(':nouvelEmail', $nouvelEmail, PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function ModifierBio(
        string $nouvelleBio,
        int $id_utilisateur
    ): bool {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE `utilisateur` SET `Description`= :nouvelleBio WHERE `ID_utilisateur` = :id_utilisateur";
            $query = $db->prepare($sql);

            $query->bindValue(':nouvelleBio', $nouvelleBio, PDO::PARAM_STR);
            $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

            $result = $query->fetch(PDO::FETCH_ASSOC);

            $query->execute();

            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }


    public static function DesactiverCompte(
        int $id_utilisateur
    ) {
        $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

        $sql = "DELETE FROM `utilisateur` WHERE `ID_utilisateur` = :id_utilisateur";
        $query = $db->prepare($sql);

        $query->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

        return $query->execute();
    }
}