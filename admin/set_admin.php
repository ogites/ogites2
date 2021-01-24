<!--
    Script permettant de définir un utilsateur
    comme administrateur
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
    $SQLParam = "UPDATE users set id_categorie = 1"
    . " WHERE id_users = '$id_users'";
    $Myresult = $pdo->exec($SQLParam);

    // Redirection vers la page d'origine
    header("Location:gerer_perm.php");
?>