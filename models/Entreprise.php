<?php
/**
 * 
 * Methode permettant de récupérer toutes les entreprises 
 * 
 */
class entreprise
{
    public static function allEntreprise()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "SELECT * FROM `entreprise` ";

            $query = $db->prepare($sql);


            // on execute la requête
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // Convertir en JSON
            $json_result = json_encode($result);

            return $json_result;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
