<!--
  Page de résultat du site
-->
<?php  
  // Ajout du header
  require_once 'head.php';
  // Initialisation de la session
  session_start(); 
  // Navbar de la page de résultat
  header_page(0);

  if (isset($_POST["searchbar"]))
  {
      $ville = $_POST["searchbar"];
  }
?>

<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
        <div class="container">
            <center>
              <!-- Barre de recherche -->
                <form action="view_gites.php" method="POST">
                    <div class="input-group mb-2 border rounded-pill p-1 w-50">
                        <input type="search" placeholder="Chercher un lieu" aria-describedby="button-addon3"
                            name="searchbar" class="form-control bg-none border-0"
                            value="<?php echo $ville ?>">
                        <div class="input-group-append border-0">
                            <button id="button-addon3" type="submit" class="btn btn-link text-success">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Recherche</button>
                </form>
            </center>
        </div>
        
        <!-- Affichage des gîtes -->
        <?php
        //  Liste des gîtes en fonction de la ville
        $SQLParam = getGitesByVille($ville);
        $pdo =bd_connect();
        $Myresult = $pdo->query($SQLParam);
        $Myresult->setFetchMode(PDO::FETCH_ASSOC);
        $nb_result = $Myresult->rowCount();
        if ($nb_result > 0)
        {
        ?>
            <h2>Résultat(s) pour <?php echo $ville ?></h2>
            <br>
            <div class="container">
                <div class="row justify-content-start">
                    <div class="card-deck">
                        <?php
                        while($Allresponse = $Myresult->fetch())
                        {
                        ?>
                        <div class="col-6">
                            <div class="col-12">
                                <div class="card shadow-sm p-3 mb-5 bg-white rounded h-100">
                                <?php
                                $id_gites = $Allresponse["id_gites"];
                                // Requête permettant d'obtenir une image de miniature pour un gîte
                                $SQLParam2 = "SELECT * FROM images_gites WHERE id_gites = $id_gites LIMIT 1";
                                $Myresult2 = $pdo->query($SQLParam2);
                                $Myresult2->setFetchMode(PDO::FETCH_ASSOC);
                                $images_gites = $Myresult2->fetch();
                                $images_link = $images_gites["link_url"];
                                ?>
                                    <!-- Miniature du gîtes -->
                                    <img src="<?php echo $images_link; ?>" class="card-img-top" alt="image-gite" style="height:300px;">
                                    <div class="card-body">
                                        <!-- Titre du gîte -->
                                        <h5 class="card-title"><?php echo $Allresponse["libelle"] ?></h5>
                                        <!-- Ville du gîte du gîte -->
                                        <small><p class="card-text"><?php echo $Allresponse["localisation"] ?></p></small>
                                        <!-- Description du gîte -->
                                        <strong><p class="card-text"><?php echo $Allresponse["description"] ?></p></strong>
                                        <br>
                                        <!-- Lien vers le site d'origine du gîte -->
                                        <a target="_blank" href="<?php echo $Allresponse["link_url"] ?>" class="btn btn-warning" style="color: white;">Voir plus</a>
                                        <a href="info_gites.php" class="btn btn-success">Réserver</a>
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