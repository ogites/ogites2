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

    // Vérification que le gîte n'existe pas
    $SQLParam1 = "SELECT * from gites WHERE link_url = '$link_url'";
    $Myresult1 = $pdo->query($SQLParam1);
    $verif_gite = $Myresult1->rowCount();

    if ($verif_gite > 0) // Si le gîte n'existe
    {
        // Message d'erreur : Ce gîte existe déjà
        header("Location:ajout_gite.php?origin=$origin&error=true");
    }
    else // Si le gîte n'existe pas
    {
        // Insertion dans la base de données
        $SQL_insert1 = "INSERT INTO gites (libelle, description, localisation, link_url, nb_personnes_max)"
        . " VALUES ('$libelle', '$description', '$localisation', '$link_url', '$nb_personnes_max')";
        echo $SQL_insert1;
        $Myinsert1 = $pdo->exec($SQL_insert1);

        // Récupération de l'id_gites afin d'associer l'image
        $SQLParam2 = "SELECT * from gites WHERE link_url = '$link_url'";
        $Myresult2 = $pdo->query($SQLParam2);
        $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
        $gite_insere = $Myresult2->fetch();
        $id_gites = $gite_insere["id_gites"];

        // Insert de l'image du gîte
        $SQL_insert2 = "INSERT INTO images_gites (id_gites, link_url)"
        . " VALUES ('$id_gites', '$link_image')";
        $Myinsert2 = $pdo->exec($SQL_insert2);

        // Redirection vers la liste des gîtes
        header("Location:liste_gite.php");
    }
?>