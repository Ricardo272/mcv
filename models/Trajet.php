<?php

class Trajet
{ /** 
  * Methode permettant d'ajouter un trajet a la BDD 
  * @param string $dateTrajet Date du trajet de l'utilisateur  
  * @param string $distanceParcourue Distance parcourue par l'utilisateur 
  * @param string $dureeTrajet Durée du trajet de l'utilisateur 
  * @param string $imageTrajet Image du trajet de l'utilisateur ( optionnnel )
  * @param int $idVehicule Identifiant du vehicule selectionné
  * @param int $idUtilisateur identifiant de l'utilisateur   
  * 
  * @return void 
  */

    public static function ajouterTrajet
    (
        string $dateTrajet,
        string $distanceParcourue,
        string $dureeTrajet,
        string $imageTrajet,
        string $idVehicule,
        string $idUtilisateur
    ) {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "INSERT INTO `trajets_de_l_utilisateur`(`Date_du_trajet`, `Distance_parcourue`, `Duree_du_trajet`, `Image_trajet`, `ID_vehicule`, `ID_utilisateur`) VALUES (:Date_du_trajet,:Distance_parcourue,:Duree_du_trajet,:Image_trajet,:ID_vehicule,:ID_utilisateur);";

            $query = $db->prepare($sql);

            $query->bindValue(":Date_du_trajet", $dateTrajet, PDO::PARAM_STR);
            $query->bindValue(":Distance_parcourue", $distanceParcourue, PDO::PARAM_STR);
            $query->bindValue(":Duree_du_trajet", $dureeTrajet, PDO::PARAM_STR);
            $query->bindValue(":Image_trajet", "image_trajet_par_defaut.jpg", PDO::PARAM_STR);
            $query->bindValue(":ID_vehicule", $idVehicule, PDO::PARAM_INT);
            $query->bindValue(":ID_utilisateur", $idUtilisateur, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();


        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }

    }
}
