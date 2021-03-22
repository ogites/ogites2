<!--
    Script de validation d'une réservation par un propriétaire
-->
<?php
    // Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
    // Initialisation de la session
    session_start(); 

    // Récupération de l'id_users
    if (isset($_REQUEST["id_reserv"]))
    {
        $id_reserv = $_REQUEST["id_reserv"];
    }

    // Validation de la réservation
    valideReserv($id_reserv);

    // Retour à la page d'origine
    header("Location: gerer_reserv.php");
?>