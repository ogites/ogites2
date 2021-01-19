<?php
    //Connexion à la base de donnée
    function bd_connect() {
            try 
        {
            $bdd = new PDO('mysql:host=localhost;dbname=ogites2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd;
        } 
        catch(Exeption $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    $pdo = bd_connect();

    //Récupérer les gîtes en fonction de la ville
    function getGitesByVille($ville) {
        global $pdo;
        $query = "SELECT * FROM gites WHERE localisation = '$ville'";

        return $query;
    }

    //Récupérer tous les gîtes
    function getAllGites() {
        global $pdo;
        $query = 'SELECT * FROM gites';
        return $query;
    }
?>

