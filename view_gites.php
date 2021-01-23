<!--
  Page de résultat du site
-->

<?php  
  // Ajout du header
  require_once 'head.php';
  // Lien vers les méthodes
  require_once 'inc/manager-db.php';
  // Initialisation de la session
  session_start(); 

  if (isset($_POST["searchbar"]))
  {
      $ville = $_POST["searchbar"];
  }
?>

<!-- Navbar de la page de résultat -->
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <strong><a class="navbar-brand" href="index.php">Ô'GÎTES</a></strong>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Présentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login-system/connexion.php">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

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
                                        <a target="_blank" href="<?php echo $Allresponse["link_url"] ?>" class="btn btn-outline-primary">Voir plus</a>
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