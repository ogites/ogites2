<!-- 
    Script d'envoi d'un message à un autre utilisateur
-->
<?php
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 

    // Récupération de l'expéditeur
    if (isset($_REQUEST["expediteur"]))
    {
        $expediteur = $_REQUEST["expediteur"];
    }

    // Récupération du destinataire
    if (isset($_REQUEST["destinataire"]))
    {
        $destinataire = $_REQUEST["destinataire"];
    }

    // Récupératio du contenu du message
    if (isset($_POST["newMessage"]))
    {
        $contenu = $_POST["newMessage"];
    }

    // Envoi du message
    sendMessage($expediteur, $destinataire, $contenu);
    //echo 1;
    // Retour vers la page d'origine
    header("Location: convers.php?expediteur=$destinataire&destinataire=$expediteur");
?>