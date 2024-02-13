<?php

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

            return $result;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
