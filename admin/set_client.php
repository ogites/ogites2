<!--
    Script permettant de définir un utilsateur
    comme client
-->
<?php
    // Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
    // Initialisation de la session
    session_start(); 

    // Récupération de l'id_users
    if (isset($_REQUEST["id_users"]))
    {
        $id_users = $_REQUEST["id_users"];
    }

    // Modification de la catégorie de l'users
    change_categ("client", $id_users);

    // Retour à la page d'origine
    header("Location: gerer_perm.php");
?>