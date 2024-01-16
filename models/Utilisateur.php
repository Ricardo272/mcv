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
            $sql = "INSERT INTO `utilisateur`( `Pseudo`, `Nom`, `Prenom`, `Date_de_naissance`, `Email`, `Mot_de_passe_utilisateur`,`Utilisateur_valide`, `ID_entreprise`) VALUES (:Pseudo, :Nom, :Prenom, :Date_de_naissance, :Email, :Mot_de_passe_utilisateur, :Utilisateur_valide, :ID_Entreprise )";

            // Je prepare ma requete pour eviter les injection SQL 

            $query = $db->prepare($sql);


            $query->bindValue(":Pseudo", htmlspecialchars($pseudo), PDO::PARAM_STR);
            $query->bindValue(":Nom", htmlspecialchars($nom), PDO::PARAM_STR);
            $query->bindValue(":Prenom", htmlspecialchars($prenom), PDO::PARAM_STR);
            $query->bindValue(":Date_de_naissance", $dob, PDO::PARAM_STR);
            $query->bindValue(":Email", $email, PDO::PARAM_STR);
            $query->bindValue(":Mot_de_passe_utilisateur", password_hash($mdpUtilisateur, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(":Utilisateur_valide", $validateUser, PDO::PARAM_STR);
            $query->bindValue(":ID_Entreprise", $idEntreprise, PDO::PARAM_STR);

            $query = $query->execute();

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();

        }
    }
}

?>