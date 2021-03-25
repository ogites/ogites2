<!--
  Page de résultat du site
-->
<?php  
    // Titre de la page
    $title = "Résultat(s) de recherche - Ô'GÎTES";
    // Ajout du header
    require_once 'head.php';
    // Initialisation de la session
    session_start(); 
    // Navbar de la page de résultat
    header_page(1);

    if (isset($_POST["searchbar"]))
    {
        $search = $_POST["searchbar"];
    }
    else
    {
        $search = "";
    }
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <div class="container">
            <center>
                <!-- Barre de recherche -->
                <form action="view_gites.php?query=search" method="POST">
                    <div class="input-group mb-2 border rounded-pill p-1 w-50">
                        <input type="search" placeholder="Chercher un lieu" aria-describedby="button-addon3"
                            name="searchbar" class="form-control bg-none border-0" value="<?php echo $search ?>">
                        <div class="input-group-append border-0">
                            <button id="button-addon3" type="submit" class="btn btn-link text-success">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Recherche</button>
                    <a href="view_gites.php?query=all" class="btn btn-warning"><span style="color:white;">Voir tout</span></a>
                </form>
            </center>
        </div>

        <!-- Affichage des gîtes -->
        <?php
        //  Liste des gîtes en fonction de la ville
        if ($_REQUEST["query"] == "search")
        {
            $SQLParam = "SELECT * FROM gites "
            . "WHERE libelle LIKE '%" . "$search" . "%' OR localisation LIKE '%" . "$search" . "%'";
        }
        else
        {
            $SQLParam = getAllGites();
        }
        
        //$pdo =bd_connect();
        //echo $SQLParam;
        $Myresult = toFetch($SQLParam);
        $nb_result = toCount($SQLParam);
        if ($nb_result > 0)
        {
        ?>
        <br>
        <?php
            if ($search == "")
            {
            ?>
        <h1><strong>LISTE DE TOUS LES GÎTES.</strong></h1>
        <?php
            }
            else
            {
            ?>
        <h1><strong><?php echo $nb_result  ?> RÉSULTAT(S) POUR <?php echo strtoupper($search) ?>.</strong></h1>
        <?php
            }
            ?>
        <br>
        <div class="container">
            <div class="row justify-content-start">
                <div class="card-deck">
                    <?php
                        while($Allresponse = $Myresult->fetch())
                        {
                        ?>
                    <div class="col-6" style="width:590px;">
                        <div class="col-12">
                            <div class="card shadow-sm p-3 mb-5 bg-white rounded h-100" style="width: 500px;">
                                <?php
                                $id_gites = $Allresponse["id_gites"];
                                // Requête permettant d'obtenir une image de miniature pour un gîte
                                $SQLParam2 = "SELECT * FROM images_gites WHERE id_gites = $id_gites LIMIT 1";
                                $Myresult2 = $pdo->query($SQLParam2);
                                $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                                $images_gites = $Myresult2->fetch();
                                $nb_images = $Myresult2->rowCount();
                                if ($images_gites)
                                {
                                    $images_link = $images_gites["link_url"];
                                }
                                ?>
                                <!-- Miniature du gîtes -->
                                <?php
                                    if ($nb_images > 0)
                                    {
                                    ?>
                                <img src="<?php echo $images_link; ?>" class="card-img-top" alt="image-gite"
                                    style="height:300px;">
                                <?php
                                    }
                                    else
                                    {
                                    ?>
                                <h3 align="center">Aucune image.</h3>
                                <?php
                                    }
                                    ?>
                                <div class="card-body">
                                    <!-- Titre du gîte -->
                                    <h5 class="card-title"><?php echo $Allresponse["libelle"] ?></h5>
                                    <!-- Ville du gîte du gîte -->
                                    <small>
                                        <p class="card-text"><i class="fa fa-map-marker"></i> <?php echo $Allresponse["localisation"] ?></p>
                                    </small>
                                    <!-- Description du gîte -->
                                    <strong>
                                        <p class="card-text"><?php echo $Allresponse["description"] ?></p>
                                    </strong>
                                    <br>
                                    <?php 
                                        // Savoir si le gîte est disponible
                                        $SQLParam3 = "SELECT * FROM reservation WHERE id_gites = $id_gites";
                                        $info_reserv = requete($SQLParam3);

                                        // Possibilité de réserver uniquement si l'on est connecté
                                        if(isset($_SESSION["id_users"]))
                                        {
                                        ?>
                                    <a href="info_gites2.php?id_gites=<?php echo $id_gites ?>"
                                        class="btn btn-success">Réserver</a>
                                    <?php
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        ?>
                </div>
            </div>
        </div>
        <?php
        }
        else
        {
            echo "<h2>Aucun gîtes trouvés.</h2>";
        }
        ?>
    </div>
</main>

<?php
	// Ajout de script Javascript
	require_once 'javascripts.php';
	// Ajout du footer
	require_once 'footer.php';
?>