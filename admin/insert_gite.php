<!--
    Script d'ajout de gîte dans la base de données
-->
<?php  
	// Ajout du header
    require_once 'head.php';
    require_once 'config_admin.php';
	// Initialisation de la session
    session_start(); 

    // Récupération de l'origine
    if (isset($_REQUEST["origin"]))
    {
        $origin = $_REQUEST["origin"];
    }
    // Récupération de l'id_users du createur
    if (isset($_REQUEST["createur"]))
    {
        $createur = $_REQUEST["createur"];
    }

    // Récupération des données du formulaire
    if(isset($_POST["libelle"]))
    {
        $libelle = $_POST["libelle"];
    }
    if (isset($_POST["nb_personnes_max"]))
    {
        $nb_personnes_max = $_POST["nb_personnes_max"];
    }
    if(isset($_POST["localisation"]))
    {
        $localisation = $_POST["localisation"];
    }
    if(isset($_POST["description"]))
    {
        $description = $_POST["description"];
    }
    if(isset($_POST["link_url"]))
    {
        $link_url = $_POST["link_url"];
    }
    if(isset($_POST["link_image"]))
    {
        $link_image = $_POST["link_image"];
    }
    if(isset($_POST["prix_nuit"]))
    {
        $prix_nuit = $_POST["prix_nuit"];
    }

    // Vérification que le gîte n'existe pas
    $SQLParam1 = "SELECT * from gites WHERE link_url = '$link_url'";
    $verif_gite = toCount($SQLParam1);

    if ($verif_gite > 0) // Si le gîte existe
    {
        // Message d'erreur : Ce gîte existe déjà
        header("Location:ajout_gite.php?origin=$origin&error=true");
    }
    else // Si le gîte n'existe pas
    {
        // Insertion dans la base de données
        $SQL_insert1 = "INSERT INTO gites (createur, libelle, description, localisation, link_url, nb_personnes_max, prix_nuit)"
        . " VALUES ('$createur', '$libelle', '$description', '$localisation', '$link_url', '$nb_personnes_max', '$prix_nuit')";
        $Myinsert1 = requete($SQL_insert1);

        // Récupération de l'id_gites afin d'associer l'image
        $SQLParam2 = "SELECT * from gites WHERE link_url = '$link_url'";
        $gite_insere = requete($SQLParam2);
        $id_gites = $gite_insere["id_gites"];

        // Insert de l'image du gîte
        $SQL_insert2 = "INSERT INTO images_gites (id_gites, link_url)"
        . " VALUES ('$id_gites', '$link_image')";
        $Myinsert2 = requete($SQL_insert2);

        // Redirection vers la liste des gîtes
        header("Location:liste_gite.php");
    }
?>