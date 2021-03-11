<?php
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    // Récupération de l'id du gite
    if (isset($_REQUEST["id_gites"]))
    {
        $id_gites = $_REQUEST["id_gites"];
    }
    // Éxécution de la requête
    // Suppréssion dans la liste des gites
    $SQLParam1 = "delete from gites where id_gites = $id_gites";
    $result1 = $pdo->exec($SQLParam1);
    // Suppréssion des images du gite
    $SQLParam2 = "delete from images_gites where id_gites = $id_gites";
    $result2 = $pdo->exec($SQLParam2);
    // Suppression des réservations du gîte
    $SQLParam3 = "delete from reservation where id_gites = $id_gites";
    $result = $pdo->exec($SQLParam3);
    // Redirection vers la liste des gites
    header("Location:liste_gite.php");
?>