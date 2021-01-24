<?php
    //Connexion à la base de donnée
    function bd_connect() {
            try 
        {
            $bdd = new PDO('mysql:host=localhost;dbname=ogites2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $bdd;
        } 
        catch(Exeption $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Connexion à la base de données
    global $pdo;
    $pdo = bd_connect();
    
    // Chemin du dossier
    global $root;
    $root = 'localhost/ogites2';

    //Récupérer les gîtes en fonction de la ville
    function getGitesByVille($ville) {
        global $pdo;
        $query = "SELECT * FROM gites WHERE localisation = '$ville'";

        return $query;
    }

    //Récupérer tous les gîtes
    function getAllGites() {
        global $pdo;
        $query = 'SELECT * FROM gites';
        return $query;
    }

    function header_page($onglet) 
    {
        global $root;

        /*
        Fonction permettant d'ajouter le header en fonction du paramètre
        Liste des différents cas :
            0 : La page n'est pas dans le header
            1 : Page d'accueil (première page dans le header)
            2 : Page de présentation (deuixième page dans le header)
            3 : Page A propos (troisième page dans le header)
        */
    ?>
        <header>
      	    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
            	<strong><a class="navbar-brand" href="index.php">Ô'GÎTES</a></strong>
            	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
              		aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              	    <span class="navbar-toggler-icon"></span>
            	</button>
            	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
              		<ul class="navbar-nav ml-auto">
                        <?php
                        switch ($onglet)
                        {
                            // Page non dans le header
                            case 0:
                                ?>
                                <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                		        <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                            break;

                            // Accueil
                            case 1:
                                ?>
                                <li class="nav-item active">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                		        <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                            break;
                            
                            // Présentation
                            case 2:
                                ?>
                                <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                		        <li class="nav-item active">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                            break;
                            
                            // À propos
                            case 3:
                                ?>
                                <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/index.php">Accueil <span class="sr-only">(current)</span></a>
                		        </li>
                		        <li class="nav-item">
                  			        <a class="nav-link" href="/ogites2/presentation.php">Présentation</a>
                		        </li>
    	    			        <li class="nav-item active">
                		  	        <a class="nav-link" href="/ogites2/about.php">À propos</a>
                		        </li>
                                <?php
                            break;
                        }
                        // Si l'utilisateur est connecté
                		if (isset($_SESSION['id_users']) AND isset($_SESSION['pseudo']))
                		{
                		?>
                		<li class="nav-item dropdown">
                		  	<a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                		    	aria-expanded="false" name="Dropdown">Mon compte</a>
                		  	<div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="/ogites2/all_reservation.php">Mes réservations</a>
                                <?php if ($_SESSION['id_categorie'] == 1)
                                {
                                ?>
                                <a class="dropdown-item" href="/ogites2/admin/index.php">Espace Admin</a>
                                <?php
                                } 
                                ?>
                		    	<a class="dropdown-item" href="/ogites2/login-system/param.php">Paramètres</a>
                		  	</div>
                		</li>
                		<li class="nav-item">
    	    				<a class="nav-link" href="/ogites2/login-system/deconnexion.php">Déconnexion</a>
                		</li>
                		<?php
                		}
                		else
                		{
                		?>
                		<li class="nav-item">
                		  	<a class="nav-link btn btn-success" href="/ogites2/login-system/connexion.php"><span style="color:white;">Connexion</span></a>
                		</li>
                		<?php
                		}
                		?>
              		</ul>
            	</div>
      	    </nav>
    </header>
    <?php
    }
?>

