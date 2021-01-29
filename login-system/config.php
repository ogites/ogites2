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
                        
                        <?php 
                        if ($_SESSION['id_categorie'] == 1)
                        {
                        ?>  
                            <li class="nav-item" >
                                <a class="nav-link" href="/ogites2/admin/index.php">Espace Admin</a>
                            </li>
                        <?php
                        } 
                        ?>
                        <li class="nav-item">
                            <a href="/ogites2/all_reservation.php" class="nav-link">Mes réservations</a>
                        </li>
                        <li class="nav-item">
    	    				<a class="nav-link" href="/ogites2/login-system/param.php">Mon compte</a>
                		</li>
                		<li class="nav-item">
    	    				<a class="nav-link" href="/ogites2/login-system/deconnexion.php"><i class="fa fa-sign-out"></i></a>
                		</li>
                		<?php
                		}
                		else
                		{
                		?>
                		<li class="nav-item">
                		  	<a class="nav-link btn btn-success" href="/ogites2/login-system/connexion.php"><i class="fa fa-sign-in" style="color:white;"></i> <span style="color:white;">Connexion</span></a>
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

    /**
    * Fonction de conversion de date du format am�ricain (AAAA-MM-JJ) ver le format fran�ais (JJ/MM/AAAA).
    * @param string $date Date au format am�ricain (AAAA-MM-JJ)
    * @return string Date au format fran�ais (JJ/MM/AAAA)
    */
    function dateFR($date)
    {
      $date = explode('-', $date);
      $date = array_reverse($date);
      $date = implode('/', $date);
      return $date;
    }

    /**
    * Fonction de conversion de date du format fran�ais (JJ/MM/AAAA) ver le format am�ricain (AAAA-MM-JJ).
    * @param string $date Date au format fran�ais (JJ/MM/AAAA)
    * @return string Date au format am�ricain (AAAA-MM-JJ)
    */
    function dateUS($date)
    {
      $date = explode('/', $date);
      $date = array_reverse($date);
      $date = implode('-', $date);
    
      return $date;
    }

    function get_date($date)
     {
        $TableJour = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $TableMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre','Novembre', 'Décembre');
		$tdate=array(0,0,0,0);
		//v�rification de la date et formattage en fran�ais 
		if (!empty($date))
		{
		//format français jj/mm/aaaa
		if (substr($date, 8 , 2 )=="/")
		{
		$j= substr($date, 0 , 2 );
		$m= substr($date, 3 , 2 );
		$a= substr($date, 5 , 4 );
		
		}
		if (substr($date, 8 , 2 )!="/")
			{
				//formattage en anglais aaaa-mm-jj
			$j     = substr($date, 8 , 2 );
			$m     = substr($date, 5 , 2 );
			$a    = substr($date, 0 , 4 );
				
			}
		
		$i=$j;
		if ($j=="1"){$j="1er";}
		$var=$TableJour[date("w", mktime(0,0,0,$m,$i,$a))]." ".$j." ".$TableMois[$m-1]." ".$a;
		
		}
		else
		{
		 	$j=date('j');
			if ($j=="1"){$j="1er";}
			$var=$TableJour[date('w')].' '.$j.' '.$TableMois[date('n')-1]." ".date('Y');
		}
	    $var=convert_html($var);
        return ($var);
    }

        function convert_html($text)
    {
    	$special_chars=array("�");
    
    
    	$special_chars = array( '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '�', '/', '&#039;',"'");
    
    	$normal_chars  = array( 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i', 'O', 'O', 'O', 'O', 'O', 'O', 'o', 'o', 'o', 'o', 'o', 'o', 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'B', 'C', 'c', 'D', 'd', 'N', 'n', 'P', 'p', 'Y', '-', '-',"-");
    
    		$text = stripslashes($text);
    	$text = str_replace("�", "&eacute;", $text);
    	$text = str_replace("é","e", $text);
    	$text = str_replace("�", "&Eacute;", $text);
    	$text = str_replace("�", "&egrave;", $text);
    	$text = str_replace("�", "&agrave;", $text);
    	$text = str_replace("�", "&ugrave;", $text);
    	$text = str_replace("�", "&ecirc;", $text);
    	$text = str_replace("�", "&acirc;", $text);
    	$text = str_replace("�", "&ucirc;", $text);
    	$text = str_replace("�", "&ocirc;", $text);
    	$text = str_replace("�", "&icirc;", $text);
    	$text = str_replace("�", "&euml;", $text);
    	$text = str_replace("�", "&ccedil;", $text);
    	$text = str_replace("�", "&rsquo;", $text);
    	$text = str_replace("'", "&rsquo;", $text);
    	$text = str_replace("�", "&euro;", $text);
    	$text = str_replace("�", "&iuml;", $text);
    	return $text;
    }
?>

